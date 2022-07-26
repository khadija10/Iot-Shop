<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;

class DeliveryController extends Controller
{

    public function index()
    {

        return view('checkout.delivery');

    }


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

        $request->validate([
            'destName' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'villa' => 'required',
        ]);

        $delivery = Delivery::create($request->all());

        $delivery_id =  $delivery->id;

        return redirect(route('payment.create',['delivery_id' => $delivery_id]))->with('success','Delivery created successfully.');

    }
}
