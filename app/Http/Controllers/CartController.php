<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;


use Stripe\Stripe;
use Stripe\PaymentIntent;




class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('cart.index');
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

        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request){
            return $cartItem->id == $request->product_id;
        });

        if($duplicata->isNotEmpty()) {
            return redirect()->route('welcome')->with('success' , 'produit est dejà ajouté avec succes' );
        }

        $product = Product::find($request->product_id);
       //dd($product->image);

        if($product->stock == 0){
                $product->update(['active' => $product->active += 1]);
                return redirect()->route('welcome')->with('error' , 'ce produit n\'est plus disponible! Merci de reésayer plus tard');

        }else{

            $product->update(['active' => $product->active =0]);

            Cart::add($product->id, $product->name, 1, $product->price)
                ->associate('App\Models\Product');
            return redirect()->route('welcome')->with('success' , 'produit ajouté avec succes' );

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
    public function update(Request $request, $rowId)
    {

        $data = $request->json()->all();
        // $validator = Validator::make($request->all(), [
        //     'qty' => 'reuired|numeric|between:1,7'
        // ]);




        // if($validator->fails()){
        //     Session::flash('danger' , 'la quantité du produit ne doit pas depassée 7');

        //     return response()->json(['error' => 'le panier n`est bien mis à jour']);

        // }

        if($data['qty'] > $data['stock']){
            Session::flash('error' , 'la quantité du produit n\'est pas disponible! Merci de reésayer plus tard');

            return response()->json(['error' => 'Product qty not available']);

        }

        Cart::update($rowId, $data['qty']);

        Session::flash('success' , 'la quantité du produit est passé à ' . $data['qty']);

        return response()->json(['success' => 'le panier est bien mis à jour']);
    }

    // public function quantity(Request $request, $rowId){
    //     dd("bbbbbbbb");
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);

        // Session::flash('success', 'La quantité à changé');

        return back()->with('success', 'le produit est supprimé');
    }



}
