<?php

namespace App\Http\Controllers\User;

use Cart;
use PDF;
use Carbon\Carbon;
use App\Model\Order;
use App\Mail\Invoice;
use App\Model\Product;
use App\Model\OrderProduct;
use Illuminate\Http\Request;
use App\Jobs\SendInvoiceEmail;
use App\Http\Requests\StoreOrder;
use App\Http\Controllers\Controller;

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
            'body' => 'You will receive your invoice in email soon, but you can also download it via this link:',
            'link' => ''
        ]
    ];

    public function index(Request $request)
    {
        $orders = Order::getByPhone($request->query('phone'));

        if (count($orders) < 1) {
            return redirect()->back()->with('error', 'No orders related to this phone number!');
        }
        
        return view('user.order.index', compact('orders'));
    }
    
    public function create()
    {
        if (Cart::isEmpty()) {
            return redirect()->route('products.index');
        }
        return view('user.order.create');
    }

    public function store(StoreOrder $request)
    {
        $parameters = $request->request->all();
        
        $order = Order::create($parameters);
        OrderProduct::createMultiple($order->id, $parameters['items']);

        $action = $request->invoice;
        $info = $this->messages[$action];
        if ($action === 'email') {
            SendInvoiceEmail::dispatchAfterResponse($order);
        }

        $info['link'] = route('orders.download', $order);

        Cart::clear();
        
        return view('user.order.show', compact('info'));
    }

    public function find()
    {
        return view('user.order.find');
    }

    public function download(Order $order)
    {
        $pdf = PDF::loadView('user.pdf.invoice', [ 'order' => $order ]);
        return $pdf->download('invoice.pdf');
    }
}
