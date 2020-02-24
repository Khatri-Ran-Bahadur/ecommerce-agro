<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders= Order::orderBy('created_at','desc')->get();

        return view('admin.order.index',compact('orders'));
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
    public function show($id)
    {
        //
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
        $order = Order::onlyTrashed()->findOrFail($id);
        if($order->forceDelete()){
          return back()->with('message','Order Successfully Deleted!');
        }else{
          return back()->with('message','Error Deleting Order');
        }
    }

    public function trash()
    {
        $orders = Order::onlyTrashed()->paginate(5);
        return view('admin.order.index', compact('orders'));
    }

    public function recoverOrder($id)
    {
        $order = Order::onlyTrashed()->findOrFail($id);
        if($order->restore())
            return back()->with('message','Order Successfully Restored!');
        else
            return back()->with('message','Error Restoring Order');
    }


    public function remove(Order $order)
    {


        if($order->delete()){
            return back()->with('message','Order Successfully Trashed!');
        }else{
            return back()->with('message','Error Deleting Order');
        }
    }


    public function confirmOrder($id){
        $order=Order::find($id);
        $confirmorder=$order;
        $cart=$order->cart;
        $order=unserialize($order->cart);


       foreach ($order->items as $item) {
           $product=Product::find($item['item']['id']);
           $product->quantity=$product->quantity-$item['qty'];
           if($product->quantity<0){
                return back()->with('message', $product->title."'s product quantity is less than Order quantity ");
           }else{
                $product->save();
           }          
       }
       $confirmorder->confirm_order=True;
       $confirmorder->cart=$cart;
        if($confirmorder->save()){
             
            return redirect(route('admin.order.index'))->with('message', "Order Successfully Confirmed!");
        }else{
            return back()->with('message', "Error Confirmed Order");
        }
    }
}
