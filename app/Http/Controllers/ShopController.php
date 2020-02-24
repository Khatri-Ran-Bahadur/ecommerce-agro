<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Product;
use App\Category;
use App\Cart;
use App\Order;
use Auth;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$products=Product::where('status', true)->orderBy('created_at', 'desc')->paginate(12);
        return view('frontend.products.products',compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function categoryProduct($id){ 
        if($id==-1){
            $products=Product::where('status', true)->orderBy('created_at', 'desc')->paginate(12);
            return view('frontend.products.productsPage',['products'=>$products,'paginate'=>True]);
        }     
    	$category=Category::with('products')->where('id',$id)->orderBy('created_at', 'desc')
        ->get();
        $products;
        foreach ($category as $row) {
            $products=$row->products;
        }
        return view('frontend.products.productsPage',['products'=>$products,'paginate'=>False]);
    }

    public function singleProduct($slug){
    	$product=Product::where('slug',$slug)->first();
    	$products=Product::where('status', true)->orderBy('created_at', 'desc')->paginate(4);
        return view('frontend.products.single-product',compact('product','products'));
    }

    public function addCart(Request $request,$id){

        if ($request->ajax())
        {
            $product=Product::find($id);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            // $qty = $request->qty ? $request->qty : 1;
            $cart = new Cart($oldCart);
            $cart->add($product, $product->id);
            $request->session()->put('cart', $cart);
            $totalItemInCart=Session::has('cart') ? Session::get('cart')->totalQty:0;
            return \Response::json($totalItemInCart);
        }
    }

    public function updateQuantityOnCart(Request $request,$id){

        $product=Product::find($id);

        if($request->quantity<1 || $product->quantity<$request->quantity){
            return back()->with('message','Sorry add quantity minimum 1 more than '.$product->quantity);
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        // $qty = $request->qty ? $request->qty : 1;
        $cart = new Cart($oldCart);
        $cart->updateQuantity($product, $product->id,$request->quantity);
        $request->session()->put('cart', $cart);
        $cart = Session::get('cart');     
        $totalItemInCart=Session::has('cart') ? Session::get('cart')->totalQty:0;
        return view('frontend.carts.cartPage',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalItemInCart'=>$totalItemInCart]);

    }

    public function getCart(){
    	if(!Session::has('cart')){
        	return view('frontend.carts.cart');
	    }
        $oldCart = Session::get('cart');
        $cart=new Cart($oldCart);
        return view('frontend.carts.cart', ['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }



    public function getReduceByOne($id){
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        Session::put('cart',$cart);
        return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id){
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        Session::put('cart',$cart);
        $oldCart = Session::get('cart');
        $cart=new Cart($oldCart);
        $totalItemInCart=Session::has('cart') ? Session::get('cart')->totalQty:0;
        return view('frontend.carts.cartPage',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalItemInCart'=>$totalItemInCart]);

    }


    public function getCheckout(){
    	if(!Session::has('cart')){
        	return view('frontend.carts.cart');
	    }
	    $oldCart = Session::get('cart');
        $cart=new Cart($oldCart);
        $total=$cart->totalPrice;
        return view('frontend.carts.checkout',['total'=>$total]);
    }

    public function postCheckout(Request $request){
    	if(!Session::has('cart')){
        	return redirect()->route('product.shoppingCart');
	    }
	    $oldCart = Session::get('cart');
        $cart=new Cart($oldCart);

        $order=new Order();
        $order->cart=serialize($cart);
        $order->address=$request->address;
        $order->city=$request->city;
        $order->phone=$request->phone;
        Auth::user()->orders()->save($order);

        Session::forget('cart');
        return redirect()->route('shop.index')->with('success','Successfully Order the Products');
    }

    
}


