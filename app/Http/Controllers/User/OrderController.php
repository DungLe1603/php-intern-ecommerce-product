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

    public function create()
    {
        return view('user.order.create');
    }

    public function store(StoreOrder $request)
    {
        $order = new Order([
            'total_price' =>    $request->total,
            'customer_name' =>  $request->fullname,
            'address' =>        $request->address,
            'phone' =>          $request->phone,
            'email' =>          $request->email,
            'order_notes' =>    $request->order_notes
        ]);
        $order->save();

        foreach ($request->items as $item) {
            $product = Product::find($item->id);
            $product->quantity = $product->quantity - $item->quantity;
            $product->save();

            $orderProduct = new OrderProduct([
                'order_id' =>   $order->id,
                'product_id' => $product->id,
                'quantity' =>   $item->quantity,
                'price' =>      $item->price
            ]);

            $orderProduct->save();
        }

        $action = $request->invoice;
        $data = [
            'order' => $order,
            'items' => $request->items,
            'total' => $request->total
        ];

        $info = $this->messages[$action];
        if ($action === 'download') {
            session(['data' => $data]);
            $info['link'] = url('invoice');
        } elseif ($action === 'email') {
            SendInvoiceEmail::dispatchAfterResponse($data);
        }

        \Cart::clear();
        
        return view('user.order.show', compact('info'))->with('success', 'Thank you for your order!');
    }

    public function invoice()
    {
        $data = session('data');
        if (isset($data)) {
            $pdf = \PDF::loadView('user.pdf.invoice', $data);
            return $pdf->download('invoice.pdf');
        }

        return redirect()->back();
    }
}
