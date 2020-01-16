<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\HoldOrder;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 0)->with('buyer')->with('product')->paginate(40)->unique('remarks');
        return view('Orders.index', ['orders' => $orders]);
    }

     public function approved()
    {
        $orders = Order::where('status', 1)->with('buyer')->with('product')->paginate(40)->unique('remarks');
        return view('Orders.index', ['orders' => $orders]);
    }

     public function suspended()
    {
        $orders = Order::where('status', -1)->with('buyer')->with('product')->paginate(40)->unique('remarks');
        return view('Orders.index', ['orders' => $orders]);
    }

    public function paid()
    {
        $orders = Order::where('status', 2)->with('buyer')->with('product')->paginate(40)->unique('remarks');
        return view('Orders.index', ['orders' => $orders]);
    }

     public function dispatched()
    {
        $orders = Order::where('status', 3)->with('buyer')->with('product')->paginate(40)->unique('remarks');
        return view('Orders.index', ['orders' => $orders]);
    }

    public function showOrder($tnx)
    {
        $orders = Order::where('remarks', $tnx)->with('buyer')->with('product')->with('product.photos')->get();
        return view('Orders.show', ['orders' => $orders]);
    }


    public function verifyOrder($tnx)
    {
        $v = Order::where('remarks', $tnx)->get();
        if ($v[0]->status == -1) {
           HoldOrder::where('tnx_id', $tnx)->delete();

        }
        if(Order::where('remarks', $tnx)->update([
            'status' => 1
        ])){
            return redirect()->route('orders');
        }
    }
    public function holdOrder(Request $request)
    {
        if( Order::where('remarks', $request->tnx)->update([
            'status' => -1
        ])){
             HoldOrder::create([
                'tnx_id' => $request->tnx,
                'message' => $request->message
            ]);
             return redirect()->route('orders');
        }
    }

    public function dispatch($tnx)
    {
        if(Order::where('remarks', $tnx)->update([
            'status' => 3
        ])) {
            return redirect()->route('orders');
        }
    }
}
