<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\ProductPhoto;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
 
    public function index()
    {
        $products = Product::with('photos')->with('category')->paginate(40);
        return view('product', ['products' => $products]);
    }


    public function getProduct()
    {
        if (Auth::check()) {
          $products = Product::with('photos')->with('category')->paginate(40);
          return view('Products.index', ['products' => $products]);
        } return redirect()->route('login');
    }

    public function getProductCategory($q, Request $request)
    {
            $qr = str_replace("_", " ", $q);
            $cat = Category::where('name', $qr)->get();
            $products = Product::where('category_id', $cat[0]->id)->with('photos')->with('category')->paginate(40);
            $request->session()->put('category', $qr);
            return view('product', ['products' => $products]);
    }
    
    public function create()
    {
        if (Auth::check()) {
          $categories = Category::all();
          return view('Products.create', ['categories' => $categories]);
        } return redirect()->route('login');
    }

    public function edit(Product $product)
    {
        if (Auth::check()) {
          $categories = Category::all();
          $product = Product::find($product->id);
          $data = array();
          $data['categories'] = $categories;
          $data['product'] = $product;
          return view('Products.edit', ['data' => $data]);
        } return redirect()->route('login');
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $i = 0;
        $id =  Product::create([
            'name' => $request->productName,
            'brand_name' => $request->brandName,
            'description' => $request->description,
            'price' => $request->productPrice,
            'stock' => $request->productStock,
            'rewards' => $request->productRewards,
            'category_id' => $request->category,
        ])->id;

        foreach (array_combine($_FILES['photo']['name'], $_FILES['photo']['tmp_name']) as $photo => $tmp) {
            $ext = explode(".", $photo);
            var_dump($ext[1]);
             if(move_uploaded_file($tmp, "images/productImages/".$id."_".$i.".".$ext[1])){
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
        } return redirect()->route('login');
    }

    public function show(Product $product)
    {
       $products = Product::where('id', $product->id)->with('photos')->with('category')->get();
        return view('showProduct', ['product' => $products]);
    }


   public function update(Request $request)
    {
        if (Auth::check()) {
          $id = $request->id;
        $photos = \DB::table('product_photos')->where('id', \DB::raw("(select max(`id`) from product_photos where product_id = {$id})"))->get();
        $i = explode("_", $photos[0] ->photo);
        $i = explode(".", $i[1]);
        $j = $i[0]+1;
        if($i == null){
            $j = 0;
        }
            $update = product::where('id', '=', $id)->update([
            'name' => $request->productName,
            'brand_name' => $request->brandName,
            'description' => $request->description,
            'price' => $request->productPrice,
            'stock' => $request->productStock,
            'rewards' => $request->productRewards,
            'category_id' => $request->category,
            ]);
          if($request->hasFile('photo')){
            foreach (array_combine($_FILES['photo']['name'], $_FILES['photo']['tmp_name']) as $photo => $tmp) {
            $ext = explode(".", $photo);
             if(move_uploaded_file($tmp, "images/productImages/".$id."_".$j.".".$ext[1])){
                ProductPhoto::create([
                    'product_id' => $id,
                    'photo' => $id."_".$j.".".$ext[1]
                ]);
             } else{
            return "Error Uploading file";
            }
            $i++;
         }
          }
         return redirect()->route('product');
        } return redirect()->route('login');
    }

    public function destroy($id)
    {
        if (Auth::check()) {
            if (Product::where('id', $id)-delete()) {
               return redirect()->route('product');
             } 
        } return redirect()->route('login');
    }


     public function addToCart(Request $request)
    {
        $cart = array(
            'id' => $request->id,
            'name' => $request->name,
            'qty' => $request->qty,
            'amt' => $request->price*$request->qty,
            'price' => $request->price,
            'photo' => $request->photo,
            'rewards' => $request->reward*$request->qty,
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
          $product_id = $sessions[$id]['id'];
          $reward = product::find($product_id)->rewards;
            $sessions[$id]['qty'] = $qty;
            $sessions[$id]['amt'] = $sessions[$id]['price']*$qty;
            $sessions[$id]['rewards'] = $reward*$qty;
            $request->session()->put('cart', $sessions);
            return $request->session()->get('cart');
          // return $sessions[$id]['rewards'];
    }

    public function removeCart(Request $request, $id)
    {
        $sessions = $request->session()->get('cart');
        unset($sessions[$id]);
        $cart = array_values($sessions);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function bulkUpdate(Request $request)
    {
      if (Auth::check()) {
          $i = 0;
      while ( $request->$i != 0) {
        $name = 'name'.$i;
        $brand_name = 'brand_name'.$i;
        $price = 'price'.$i;
        $stock = 'stock'.$i;
        $prevStock = 'prevStock'.$i;
        $rewards = 'reward'.$i;
        Product::where('id', $request->$i)->update([
            'name' => $request->$name,
            'brand_name' => $request->$brand_name,
            'price' => $request->$price,
            'stock' => $request->$stock+$request->$prevStock,
            'rewards' => $request->$rewards,
        ]);
        $i++;
        }
        return redirect()->route('product');
      } return redirect()->route('login');
    }
}
