<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\Order;
use Illuminate\Http\Request;
use Auth;
use DateTime;

class BuyerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:buyer');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('status', 0)->with('product')->paginate(40)->unique('remarks');
        return view('dashboard', ['orders' => $orders]);
    }

    public function orders()
    {
        $orders = Order::where('buyer_id', Auth::guard('buyer')->user()->id)->where('status', 0)->with('product')->with('product.photos')->paginate(40)->unique('remarks');
        return view('Buyers.index', ['orders' => $orders]);
    }

     public function approvedOrders()
    {
        $orders = Order::where('buyer_id', Auth::guard('buyer')->user()->id)->where('status', 1)->with('product')->with('product.photos')->paginate(40)->unique('remarks');
        return view('Buyers.index', ['orders' => $orders]);
    }

    public function pendingOrders()
    {
        $orders = Order::where('buyer_id', Auth::guard('buyer')->user()->id)->where('status', -1)->with('product')->with('product.photos')->paginate(40)->unique('remarks');
        return view('Buyers.index', ['orders' => $orders]);
    }

    public function checkout()
    {
        if (Auth::guard('buyer')->check()) {
            return view('checkout');
        } 
        return redirect()->route('client.login');
    }

    public function makeOrder(Request $request)
    {
        if($request->ship =='Y'){
            $rName = $request->sFirstName." ".$request->sLastName;
            $rContact = $request->sContactNo;
            $rEmail = $request->sEmail;
            $sAddress = $request->sAddress;

        } else {
            $rName = Auth::guard('buyer')->user()->first_name." ".Auth::guard('buyer')->user()->last_name;
            $rContact = Auth::guard('buyer')->user()->contact_no;
            $rEmail = Auth::guard('buyer')->user()->email;
            $sAddress = Auth::guard('buyer')->user()->address;

        }
            $dt = new DateTime();
            $dt = str_replace(" ", "", $dt->format('Y-m-d H:i:s'));
            $dt = str_replace("-", "", $dt);
            $dt = str_replace(":", "", $dt);
            $tnx = Auth::guard('buyer')->user()->id.$dt;
            $sessions = $request->session()->get('cart');
            $i = 0;
            foreach ($sessions as $session) {
                $order_id[$i] = Order::create([
                        'product_id' => $session['id'],
                        'buyer_id' => Auth::guard('buyer')->user()->id,
                        'receipent_name' => $rName,
                        'receipent_contact' => $rContact,
                        'receipent_email' => $rEmail,
                        'shipping_address' => $sAddress,
                        'qty' => $session['qty'],
                        'remarks' => $tnx,
                        'total_amount' => $session['amt'],
                        'status' => 0
                ])->id;
                $i++;
            }
            $request->session()->forget('cart');
            $request->session()->put('message', '1');
            return redirect()->route('products');
            //return $this->generateInvoice($order_id);
    }

    public function view($txn)
    {
        $orders = Order::where('buyer_id', Auth::guard('buyer')->user()->id)->where('remarks', $txn)->with('product')->with('product.photos')->get();
        return view('Buyers.invoice', ['orders' => $orders]);
    }
}
