<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\ProductPhoto;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('photos')->with('category')->paginate(40);
        return view('product', ['products' => $products]);
    }


    public function getProduct()
    {
        $products = Product::with('photos')->with('category')->paginate(40);
        return view('Products.index', ['products' => $products]);
    }

    public function getProductCategory($q, Request $request)
    {
        $qr = str_replace("_", " ", $q);
        $cat = Category::where('name', $qr)->get();
        $products = Product::where('category_id', $cat[0]->id)->with('photos')->with('category')->paginate(40);
        $request->session()->put('category', $qr);
        return view('product', ['products' => $products]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $i = 0;
        $id =  Product::create([
            'name' => $request->productName,
            'brand_name' => $request->brandName,
            'description' => $request->description,
            'price' => $request->productPrice,
            'category_id' => $request->category,
        ])->id;

        foreach (array_combine($_FILES['photo']['name'], $_FILES['photo']['tmp_name']) as $photo => $tmp) {
            $ext = explode(".", $photo);
            var_dump($ext[1]);
             if(move_uploaded_file($tmp, "images/productImages/".$id."_".$i.".jpg")){
                ProductPhoto::create([
                    'product_id' => $id,
                    'photo' => $id."_".$i.".".$ext[1]
                ]);
             } else{
            return "Error Uploading file";
            }
            $i++;
         } 
        return redirect()->route('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = Product::find($product->id)->with('photos')->with('category')->get();
        return view('showProduct', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }


     public function addToCart(Request $request)
    {
        $cart = array(
            'id' => $request->id,
            'name' => $request->name,
            'qty' => $request->qty,
            'amt' => $request->price*$request->qty,
            'price' => $request->price,
            'photo' => $request->photo
        );
        $request->session()->push('cart', $cart);
        if(isset($_POST['buyNow'])){
            return redirect()->route('checkout');
        } else {
            return redirect()->route('products');
        } 
    }

    public function updateCart(Request $request)
    {
        $qty = $request->get('qty');
        $id = $request->get('id');
            $sessions = $request->session()->get('cart');
            $sessions[$id]['qty'] = $qty;
            $sessions[$id]['amt'] = $sessions[$id]['price']*$qty;
            $request->session()->put('cart', $sessions);
        return $request->session()->get('cart');
    }

    public function removeCart(Request $request, $id)
    {
        $sessions = $request->session()->get('cart');
        unset($sessions[$id]);
        $cart = array_values($sessions);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }
}
