<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\HoldOrder;
use DB;
use App\Reward;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $orders = Order::where('status', 0)->with('buyer')->with('product')->orderBy('orders.updated_at', 'DESC')->get()->unique('remarks');
        return view('Orders.index', ['orders' => $orders]);
    }

     public function approved()
    {
        $orders = Order::where('status', 1)->with('buyer')->with('product')->orderBy('orders.updated_at', 'DESC')->get()->unique('remarks');
        return view('Orders.index', ['orders' => $orders]);
    }

     public function suspended()
    {
        $orders = Order::where('status', -1)->with('buyer')->with('product')->orderBy('orders.updated_at', 'DESC')->get()->unique('remarks');
        return view('Orders.index', ['orders' => $orders]);
    }

    public function paid()
    {
        $orders = Order::where('status', 2)->with('buyer')->with('product')->orderBy('orders.updated_at', 'DESC')->get()->unique('remarks');
        return view('Orders.index', ['orders' => $orders]);
    }

     public function dispatched()
    {
        $orders = Order::where('status', 3)->with('buyer')->with('product')->orderBy('orders.updated_at', 'DESC')->get()->unique('remarks');
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
            $ord = Order::where('remarks', $tnx)->get();
            $buyer_id = $ord[0]->buyer_id;
            $reward = 0;
            foreach ($ord as $val) {
                 $reward += $val->rewards;
             } 
            $rewards = Reward::where('buyer_id', $buyer_id)->get();
            if (sizeof($rewards) != 0) {
                Reward::where('buyer_id', $buyer_id)->update([
                    'rewards' => $reward+$rewards[0]->rewards
                ]);
            } else {
                Reward::create([
                    'buyer_id' => $buyer_id,
                    'rewards' => $reward
                ]);
            }
            return redirect()->route('orders');
        }
    }

    public function filter(Request $request)
    {
        $status = $request->status;
        $key_type = $request->key_type;
        $key = $request->key;
        if ($status != 100) {
            if ($key_type == 'first_name' || $key_type == 'last_name' || $key_type == 'email' || $key_type == 'contact_no') {
            $orders = Order::where('status', $status)->whereHas('buyer', function($q) use($key_type, $key){
                $q->where($key_type, 'like', '%'.$key.'%');
            })->with('buyer')->with('product')->orderBy('updated_at', 'DESC')->get()->unique('remarks');
        } elseif ($key_type == 'name') {
            $orders = Order::where('status', $status)->whereHas('product', function($q) use($key_type, $key){
                $q->where($key_type, 'like', '%'.$key.'%');
            })->with('buyer')->with('product')->orderBy('updated_at', 'DESC')->get();
        } elseif ($key_type == 'remarks') {
            $orders = Order::where('status', $status)->where('remarks', $key)->with('buyer')->with('product')->orderBy('updated_at', 'DESC')->get()->unique('remarks');
        } else {
                 $orders = Order::where('status', $status)->with('buyer')->with('product')->orderBy('updated_at', 'DESC')->get()->unique('remarks');
        }
        } else {
            $orders = Order::where('created_at', '>=', $key)->where('created_at', '<=', $key_type)->with('buyer')->with('product')->orderBy('updated_at', 'DESC')->get()->unique('remarks');
        }
       return view('Orders.index', ['orders' => $orders]);
    }
}
