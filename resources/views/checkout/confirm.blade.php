@extends('../layouts.master')


@section('title') Checkout @endsection

@section('css')


  <style>
    @media (min-width: 1025px) {
  .h-custom {
    height: 100vh !important;
    }
    }
  </style>


     <!-- Font-->
     <link href="{{ URL::asset('checkout/css/roboto-font.css'); }}" rel="stylesheet">

     <link href="{{ URL::asset('checkout/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css'); }}" rel="stylesheet">

     <!-- datepicker -->
     <link href="{{ URL::asset('checkout/css/jquery-ui.min.css'); }}" rel="stylesheet">

     <!-- Main Style Css -->
     <link href="{{ URL::asset('checkout/css/style.css'); }}" rel="stylesheet">


<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

@endsection




@section('stripe')
@endsection






@section('main')

<section class="h-100 h-custom" style="background-color: #eee;">


<div class="p-3 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body ">


<div class="page-content">
    <div class="wizard-v3-content">
        <div class="wizard-form">
            <div class="wizard-header">
                <h3 class="heading">Commande</h3>
            </div>
                <div id="form-total">

                    <section>
                        <div class="inner">
                            <h3>Confirm Details:</h3>
                            <div class="form-row table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr class="space-row">
                                            <th>Nom du destinataire:</th>
                                            <td id="destName_val"> {{ $order->destName}}</td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>Telephone:</th>
                                            <td id="phone_val">{{ $order->phone }}</td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>adresse de la lvraison:</th>
                                            <td id="address_val">{{ $order->address }}</td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>ville</th>
                                            <td id="ville_val">{{ $order->ville }}</td>
                                        </tr>


                                        <div class="col">
                                            <div class="card">
                                              <div class="card-body ">

                                                <div class="row">

                                                  <div class="col-lg-7">
                                                    <h5 class="mb-3"><a href="/" class="text-body"><i
                                                          class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                                                    <hr>

                                                @foreach(Cart::content() as $product)

                                                    <div class="card mb-3 mb-lg-0 mt-2" >
                                                      <div class="card-body">
                                                        <div class="d-flex justify-content-between">
                                                          <div class="d-flex flex-row align-items-center">
                                                            <div>
                                                              <img class="img-fluid rounded-3" src="{{ asset('storage/'. str_replace("public", "", $product->model->image)) }}" alt="image" style="width: 65px;">
                                                            </div>
                                                            <div class="ms-3" style="margin-left:100px;">
                                                              <h5>{{ $product->name }}</h5>
                                                            </div>
                                                          </div>
                                                          <div class="d-flex flex-row align-items-center">
                                                          <div style="margin-right:10px;">
                                                            <h5>{{ $product->qty }}</h5>


                                                            </select>
                                                          </div>
                                                            <div style="width: 170px;">
                                                              <h5 class="mb-0">{{ getPrice($product->subtotal()) }}</h5>
                                                            </div>


                                                        </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    @endforeach
                                                  </div>
                                                  <div class="col-lg-5">

                                                    <div class="card bg-primary text-white rounded-3">
                                                      <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                                          <h5 class="mb-0">Card details</h5>
                                                           </div>

                                                        <hr class="my-4">

                                                        <div class="d-flex justify-content-between">
                                                          <p class="mb-2">Subtotal</p>
                                                          <p class="mb-2">{{ getPrice(Cart::subtotal()) }}</p>
                                                        </div>

                                                        <div class="d-flex justify-content-between">
                                                          <p class="mb-2">Taxe</p>
                                                          <p class="mb-2">{{ getPrice(Cart::tax()) }}</p>
                                                        </div>

                                                        <div class="d-flex justify-content-between mb-4">
                                                          <p class="mb-2">Total(Incl. taxes)</p>
                                                          <p class="mb-2">{{ getPrice(Cart::total()) }} </p>
                                                        </div>

                                                        <button type="button" class="btn btn-info btn-block btn-lg">
                                                          <div class="d-flex justify-content-between">
                                                            <span>{{ getPrice(Cart::total()) }} </span>
                                                          </div>
                                                        </button>

                                                      </div>
                                                    </div>

                                                  </div>

                                                </div>

                                              </div>
                                            </div>
                                          </div>
                                        </div>


                                    </tbody>
                                </table>




                            </div>

                        </div>

                        @php
                            $order_id=$order->id;
                        @endphp

                        <div class="d-flex justify-content-end  p-4 ">
                           <a href="{{ route('order.annuler', $order_id) }}" > <button type="reset" class="btn btn-secondary btn-lg" style="margin-right: 15px"> Annuler la commander</button> </a>
                            <form action="{{ route('order.valide',  ['order_id' => $order_id]) }}" method="POST">
                                @csrf
                                        <button type="submit" class="btn btn-primary btn-block btn-lg">Payer la commande</button>
                                </form>
                        </div>



                       <div class="d-flex justify-content-end  p-4 ">

                       </div>


                    </section>
                </div>


        </div>
    </div>
</div>


</div>
</div>
</div>
</div>


</div>
</div>

</section>






@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


<script>


</script>





@endsection

