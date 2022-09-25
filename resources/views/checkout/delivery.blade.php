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

@php
    $option = $_GET['option'];
    echo($option);
@endphp


@section('stripe')
@endsection






@section('main')

<section class="h-100 h-custom" style="background-color: #eee;">


<div class="p-3 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body ">

@if ( $option == "inscription" )

<div class="page-content">
    <div class="wizard-v3-content">
        <div class="wizard-form">
            <div class="wizard-header">
                <h3 class="heading">Commande</h3>
            </div>
            <form class="form-register" action="{{ route('order.store') }}" method="POST">
                @csrf
                <div id="form-total">

                    <section>

                        <div class="inner">
                            <h3>Information de la livraison:</h3>
                            <div class="form-row py-3">
                                <div class="form-holder form-holder-2 py-2">
                                        <input type="text" name="destName" id="destName" class="form-control" required>
                                        <span class="label">Nom du destinataire</span>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2 py-2">
                                        <input type="text" class="form-control" id="phone" name="phone" required>
                                        <span class="label">Telephone</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2 py-2">
                                        <input type="text" name="address" id="address" class="form-control" required>
                                        <span class="label">Adresse de la livraison</span>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <select name="ville" id="ville">
                                        <option value="Dakar">Dakar</option>

                                    </select>
                                </div>
                            </div>

                    </section>

                    <input type="hidden" name="option" value=" {{ $option }}">



                </div>
                <div class="form-group mb-0">
                     <button class="btn btn-primary px-3" type="submit"> confirmer</button>
                </div>

            </form>

        </div>
    </div>
</div>

@elseif ($option == "recuperation")

<div class="page-content">
    <div class="wizard-v3-content">
        <div class="wizard-form">
            <div class="wizard-header">
                <h3 class="heading">Commande</h3>
            </div>
            <form class="form-register" action="{{ route('order.store') }}" method="POST">
                @csrf
                <div id="form-total">

                    <section>

                        <div class="inner">
                            <h3>Recuperation chez Tingene</h3>
                            <h2>Vous recevrez un mail de rendez-vous, veillez verifier votre boite mail</h2>


                    </section>
                    <input type="hidden" name="option" value=" {{ $option }}">



                </div>
                <div class="form-group mb-0">
                     <button class="btn btn-primary px-3" type="submit"> Contunuer</button>
                </div>

            </form>

        </div>
    </div>
</div>
@else

<div class="page-content">
    <div class="wizard-v3-content">
        <div class="wizard-form">
            <div class="wizard-header">
                <h3 class="heading">Commande</h3>
            </div>
            <form class="form-register" action="{{ route('order.store') }}" method="POST">
                @csrf
                <div id="form-total">

                    <section>

                        <div class="inner">
                            <h3>Information de la livraison:</h3>
                            <div class="form-row py-3">
                                <div class="form-holder form-holder-2 py-2">
                                        <input type="text" name="destName" id="destName" class="form-control" required>
                                        <span class="label">Nom du destinataire</span>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2 py-2">
                                        <input type="text" class="form-control" id="phone" name="phone" required>
                                        <span class="label">Telephone</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2 py-2">
                                        <input type="text" name="address" id="address" class="form-control" required>
                                        <span class="label">Adresse de la livraison</span>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <select name="ville" id="ville">
                                        <option value="Dakar">Dakar</option>

                                    </select>
                                </div>
                            </div>

                    </section>

                    <input type="hidden" name="option" value=" {{ $option }}">



                </div>
                <div class="form-group mb-0">
                     <button class="btn btn-primary px-3" type="submit"> confirmer</button>
                </div>

            </form>

        </div>
    </div>
</div>

@endif




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

