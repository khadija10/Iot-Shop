<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout.commander');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('checkout.confirm');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->checkIfNotAvaible()){

            return redirect(route('cart.index'))->with('error',  'un produit dans votre panier n\'est plus disponible');

        }



        $payment_id = $request->payment_id;

        $order = new Order();


        $products = [];

        $i= 0;

        foreach(Cart::content() as $product){
            $products['product_' . $i][]=$product->model->name;
            $products['product_' . $i][]=$product->model->price;
            $products['product_' . $i][]=$product->qty;

            $i++;
        }


        $order->products = serialize($products);


        if(Auth::check()){
            $order->user_id = Auth::user()->id;
        }else{
            $order->user_id =null;
        }

        $order->payment_id = $payment_id;


        $ok = $order->save();



        if($ok){
            $this->updateStock();
            Cart::destroy();
            return redirect(url('commande/'.$order->id))->with('success', 'votre commande a ete traité avec succès');
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('checkout.commander');
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


    private function checkIfNotAvaible()
    {
        foreach(Cart::content() as $item){
            $product = Product::find($item->model->id);

            if($product->stock < $item->qty){
                return true;
            }

        }

        return false;
    }


    private function updateStock()
    {

        foreach(Cart::content() as $item){
            $product = Product::find($item->model->id);

            $product->update(['stock' => $product->stock - $item->qty]);
        }
    }
}
