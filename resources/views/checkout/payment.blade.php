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






<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

@endsection

@section('stripe')
@endsection

@section('main')

@php
    $order_id = $_GET['order_id'];



@endphp

<section class="h-100 h-custom" style="background-color: #eee;">


<div class="p-3 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body ">

                   <div class="container py-4">

                    <div class="card">
                        <div class="card-body">

                            <section>
                                <div class="inner">
                                    <h3>Payment Information:</h3>


                                    <div class="row px-xl-5">
                                        <div class="col">
                                            <div class="nav nav-tabs justify-content-center border-secondary mb-4">

                                                        <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Wave</a>
                                                         <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Orange Money</a>
                                            </div>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="tab-pane-1">
                                                    <h4 class="mb-3">Paiement Avec wave</h4>


                                                   <form action="{{ route('payment.store') }}" method="POST">
                                                    @csrf
                                                    <div class="row">

                                                        <div class="col-6">
                                                            <p>Veillez effectuer le payment de <h3 style="color: green">{{ getPrice(Cart::total()) }}</h3> sur votre telephone </p>
                                                           <img src="{{ asset('checkout/images/wave.jpg') }}" alt="Wave qr" class="rounded w-50">
                                                           <input type="hidden" class="form-control" name="transaction_type" value="wave">
                                                        </div>

                                                        <div class="col-6">
                                                            <p>Puis entrer ce numero sur ce champs</p>
                                                            <input type="number" class="form-control" placeholder="Numéro de téléphone" name="transaction_number">
                                                            <input type="hidden" name="order_id" value="{{ $order_id}}">


                                                                <button type="submit" class="btn btn-primary form-control mt-4">Submit</button>
                                                        </div>

                                                    </div>

                                                </div>


                                             </form>


                                                <div class="tab-pane fade" id="tab-pane-2">


                                                </div>

                                            </div>
                                        </div>
                                    </div>



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

</section>


@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


<script>


</script>





@endsection

