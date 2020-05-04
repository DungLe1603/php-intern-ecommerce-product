<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Http\Requests\StoreOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use App\Model\Product;
use App\Model\Order;
use App\Model\OrderProduct;
use App\Mail\Invoice;
use App\Jobs\SendInvoiceEmail;

class OrderController extends Controller
{
    private $messages = [
        'download' => [
            'title' => 'Success!',
            'body' => 'Your invoice can be downloaded from this link:',
            'link' => ''
        ],
        'email' => [
            'title' => 'Success!',
            'body' => 'You will receive your invoice in email soon.',
            'link' => ''
        ]
    ];

    public function show()
    {
    }

    public function create()
    {
        return view('user.order.create');
    }

    public function store(StoreOrder $request)
    {
        if (!$this->validateQuantity()) {
            return 'Not enough products';
        }

        $newOrder = new Order([
            'total_price' => \Cart::getTotal(),
            'customer_name' => $request->fullname,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'order_notes' => $request->order_notes
        ]);
        $newOrder->save();

        foreach (\Cart::getContent() as $item) {
            $product = Product::find($item->id);
            $product->quantity = $product->quantity - $item->quantity;
            $product->save();

            $orderProduct = new OrderProduct([
                'order_id' => $newOrder->id,
                'product_id' => $product->id,
                'quantity' => $item->quantity,
                'price' => $item->price
            ]);

            $orderProduct->save();
        }

        $action = $request->input('invoice');
        $data = [
            'order' => $newOrder,
            'order_products' => \Cart::getContent(),
            'total' => \Cart::getTotal()
        ];

        $info = $this->messages[$action];
        if ($action === 'download') {
            session($data);
            $info['link'] = url('invoice');
        } elseif ($action === 'email') {
            SendInvoiceEmail::dispatchAfterResponse($data);
        }

        \Cart::clear();
        
        return view('user.order.show', compact('info'));
    }

    public function invoice()
    {
        $data = [
            'order' => session('order'),
            'order_products' => session('order_products'),
            'total' => session('total')
        ];

        if (isset($data['order']) && isset($data['order_products']) && isset($data['total'])) {
            $pdf = \PDF::loadView('user.pdf.invoice', $data);
            return $pdf->download('invoice.pdf');
        }

        return redirect()->back();
    }
    
    // Validate: there is enough product in stock
    private function validateQuantity()
    {
        foreach (\Cart::getContent() as $item) {
            $product = Product::find($item->id);
            if ($product->quantity < $item->quantity) {
                return false;
            }
        }
        
        return true;
    }
}
