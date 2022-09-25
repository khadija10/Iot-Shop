<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;

use App\Mail\MyMailer;



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
        return view('checkout.delivery');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('checkout.delivery');

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

        $option = $request->option;

        $order = new Order();


        if( $option == "inscription"){

        $order->destName = $request->destName;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->ville = $request->ville;



        $products = [];

        $i= 0;

        foreach(Cart::content() as $product){
            $products['product_' . $i][]=$product->model->name;
            $products['product_' . $i][]=$product->model->price;
            $products['product_' . $i][]=$product->qty;

            $i++;
        }


        $order->products = serialize($products);

        $order->user_id = Auth::user()->id;


        $order->save();
        $order_id = $order->id;

        return redirect(route('order.confirm', ['order_id' => $order_id]));


        }elseif($option == "recuperation"){

        $order->destName = "";
        $order->phone = "";
        $order->address = "";
        $order->ville = "";



        $products = [];

        $i= 0;

        foreach(Cart::content() as $product){
            $products['product_' . $i][]=$product->model->name;
            $products['product_' . $i][]=$product->model->price;
            $products['product_' . $i][]=$product->qty;

            $i++;
        }


        $order->products = serialize($products);

        $order->user_id = Auth::user()->id;

        $order->save();

        $email= Auth::user()->email;



        $details = [
            'subject'=>"Récuperation de la commande chez Tingene",
            'body'=>"Bojour cher client, Merci d'avoir passé une commande chez, vous pouvez passer dans notre local à liberté 6 2 voix boutique Uno pour recuperer votre commande après le paiement",
        ];

         Mail::to($email)->send(new MyMailer($details));

         $order_id = $order->id;

            return redirect(route('payment.create', ['order_id' => $order_id]));
        }else{


        $order = new Order();

        $order->destName = $request->destName;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->ville = $request->ville;


        $products = [];

        $i= 0;

        foreach(Cart::content() as $product){
            $products['product_' . $i][]=$product->model->name;
            $products['product_' . $i][]=$product->model->price;
            $products['product_' . $i][]=$product->qty;

            $i++;
        }


        $order->products = serialize($products);


        $order->user_id = NULL;


        $ok = $order->save();

        $order_id = $order->id;



            return redirect(route('order.confirm', ['order_id' => $order_id]));

        }




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($order_id)
    {
        $order = Order::find($order_id);

        return view('checkout.confirm', ['order' => $order]);
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
           $order = Order::findOrFail($id);
           $order->delete();
           return redirect(route('welcome'))->with('danger',  'vous avez annulé votre commande!!!');

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

    private function resetStock()
    {

        foreach(Cart::content() as $item){
            $product = Product::find($item->model->id);

            $product->update(['stock' => $product->stock + $item->qty]);
        }
    }

    public function valideOrder(Request $request)
    {

        $this->updateStock();
        $order_id = $request->order_id;
        return redirect(route('payment.create', ['order_id' => $order_id]));
     }


}




