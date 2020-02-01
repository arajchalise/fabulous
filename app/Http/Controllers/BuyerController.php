<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\Order;
use Illuminate\Http\Request;
use Auth;
use DateTime;
use App\Payment;
use App\product;

class BuyerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:buyer');
    }
   
    public function index()
    {
        $orders = Order::where('status', 0)->with('product')->paginate(40)->unique('remarks');
        return view('dashboard', ['orders' => $orders]);
    }

    public function orders()
    {
        $orders = Order::where('buyer_id', Auth::guard('buyer')->user()->id)->orderBy('updated_at', 'DESC')->with('product')->with('product.photos')->paginate(40)->unique('remarks');
        return view('Buyers.index', ['orders' => $orders]);
    }

     public function approvedOrders()
    {
        $orders = Order::where('buyer_id', Auth::guard('buyer')->user()->id)->where('status', 1)->with('product')->with('product.photos')->paginate(40)->unique('remarks');
        return view('Buyers.index', ['orders' => $orders]);
    }

    public function pendingOrders()
    {
        $orders = Order::where('buyer_id', Auth::guard('buyer')->user()->id)->where('status', 2)->with('product')->with('product.photos')->paginate(40)->unique('remarks');
        return view('Buyers.index', ['orders' => $orders]);
    }

     public function declinedOrders()
    {
        $orders = Order::where('buyer_id', Auth::guard('buyer')->user()->id)->where('status', -1)->with('product')->with('product.photos')->paginate(40)->unique('remarks');
        return view('Buyers.index', ['orders' => $orders]);
    }

     public function dispatchedOrders()
    {
        $orders = Order::where('buyer_id', Auth::guard('buyer')->user()->id)->where('status', 3)->with('product')->with('product.photos')->paginate(40)->unique('remarks');
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
                        'status' => 0,
                        'rewards' => $session['rewards']
                ])->id;
                $stock = product::find($session['id'])->stock;
                product::where('id', $session['id'])->update([
                    'stock' => $stock - $session['qty']
                ]);
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
        return view('Buyers.show', ['orders' => $orders]);
    }

    public function payment(Request $request)
    {
        $tnx = $request->tnx;
        $file = $request->file('photo');
        $ext = $file->getClientOriginalExtension();
         if ($file->move("images/paymentSlip", $tnx.".".$ext)){
                if( Payment::create([
                    'tnx_id' => $tnx,
                    'photo' => $tnx.".".$ext
                ])){
                    Order::where('remarks', $tnx)->update([
                        'status' => 2
                    ]);
                    return redirect()->route('client.dashboard');
                } else {
                    unlink('images/paymentSlip'.$tnx.".".$ext);
                    return "Error Storing values";
                }
            } 
    }

    public function track(Request $request)
    {
        $ref = $request->key;
        $ord = Order::where('remarks', $ref)->get();
        $order = $ord[0];
        return view('Buyers.trackOrder', ['order' => $order]);
    }

    public function profile()
    {
        return view('Buyers.profile');
    }

}
