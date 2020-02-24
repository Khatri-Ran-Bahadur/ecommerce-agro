<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Category;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('categories')->paginate(5);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('childrens')->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->checkvalidation($request,null);
        
        $path = 'product_img/no-thumbnail.jpeg';
        if($request->hasFile('thumbnail')){
           $extension = ".".$request->thumbnail->getClientOriginalExtension();
           $name = basename($request->thumbnail->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->thumbnail->move('product_img', $name, 'public');
         }
         
       $product = Product::create([
           'title'        => $request->title,
           'slug'         => $request->slug,
           'description'  => $request->description,
           'thumbnail'    => $path,
           'status'       => $request->status,
           'featured'     => ($request->featured) ? $request->featured : 0,
           'price'        => $request->price,
           'discount'     => $request->discount,
           'quantity'     => $request->quantity,
           'season'       => implode(',', (array) $request->get('season')),
       ]);
       if($product){
            $product->categories()->attach($request->category_id,['created_at'=>
                now(), 'updated_at'=>now()]);

            return redirect(route('admin.product.index'))->with('message', 'Product Successfully Added');
       }else{
            return back()->with('message', 'Error Inserting Product');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkvalidation($request,$id){
        $productId =isset($id) ? $id : null;
        $this->validate($request,[
           'title'        => "required",
           'slug'         => 'required|min:2|unique:products,slug,'.$productId.',id',
           'description'  => "required",
           'price'        => "required|numeric",
           'discount'     => "required|numeric",
           'quantity'     => "required|numeric"
        ]);
    }
    public function show(Product $product)
    {
        $categories = Category::with('childrens')->get();
        $products = Product::with('categories')->paginate(5);
        return view('products.all', compact('categories','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::with('childrens')->get();
        return view('admin.products.create',compact('product', 'categories'));
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
        $this->checkvalidation($request,$product->id);
         if($request->hasFile('thumbnail')){
            File::delete($product->thumbnail);
           $extension = ".".$request->thumbnail->getClientOriginalExtension();
           $name = basename($request->thumbnail->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->thumbnail->move('product_img', $name);
           $product->thumbnail = $path;
         }
          $product->title =$request->title;

          if($product->slug!=$request->slug){
            $product->slug = $request->slug;
          }
          $product->description = $request->description;
          $product->status = $request->status;
          $product->featured = ($request->featured) ? $request->featured : 0;
          $product->price = $request->price;
          $product->discount = $request->discount ? $request->discount : 0;
          $product->quantity= ($request->quantity) ? $request->quantity : 0;
          $product->season= implode(',', (array) $request->get('season'));

          $product->categories()->detach();
          
          if($product->save()){
              $product->categories()->attach($request->category_id, ['created_at'=>now(), 'updated_at'=>now()]);
              return redirect(route('admin.product.index'))->with('message', "Product Successfully Updated!");
          }else{
              return back()->with('message', "Error Updating Product");
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        if($product->categories()->detach() && $product->forceDelete()){
          File::delete($product->thumbnail);
          return back()->with('message','Product Successfully Deleted!');
        }else{
          return back()->with('message','Error Deleting Product');
        }
    }

    // extras

    public function extras(){
        return view('admin.partials.extras');
    }

    public function trash()
    {
        $products = Product::with('categories')->onlyTrashed()->paginate(5);
        return view('admin.products.index', compact('products'));
    }

    public function single(Product $product){
      return view('products.single', compact('product'));
    }

    public function addToCart(Product $product, Request $request){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $qty = $request->qty ? $request->qty : 1;
        $cart = new Cart($oldCart);
        $cart->addProduct($product, $qty);
        Session::put('cart', $cart);
        return back()->with('message', "Product $product->title has been successfully added to Cart");
    }

    public function cart(){

      if(!Session::has('cart')){
        return view('products.cart');
      }
      $cart = Session::get('cart');
      return view('products.cart', compact('cart'));
    }

   public function removeProduct(Product $product){
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->removeProduct($product);
      Session::put('cart', $cart);
      return back()->with('message', "Product $product->title has been successfully removed From the Cart");
   }

   public function updateProduct(Product $product, Request $request){
  
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->updateProduct($product, $request->qty );
      Session::put('cart', $cart);
      return back()->with('message', "Product $product->title has been successfully Updated in the Cart");
   }

   public function recoverProduct($id)
    {
        $product = Product::with('categories')->onlyTrashed()->findOrFail($id);
        if($product->restore())
            return back()->with('message','Product Successfully Restored!');
        else
            return back()->with('message','Error Restoring Product');
    }


    public function remove(Product $product)
    {
        if($product->delete()){
            return back()->with('message','Product Successfully Trashed!');
        }else{
            return back()->with('message','Error Deleting Product');
        }
    }
}
