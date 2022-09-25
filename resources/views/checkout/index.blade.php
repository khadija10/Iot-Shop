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
                            <h3>Option de la commande:</h3>
                            <div class="row">
                                <div class="col-md-6">

                    <form action="{{ route('order.option') }}" method="POST">
                        @csrf

                        <div class="form-check" data-toggle="modal" data-target="#exampleModal">
                            <input class="form-check-input" type="radio" name="option" id="option" value="inscription">
                        <label class="form-check-label" for="inscription" >
                        Inscription
                        </label>
                        </div>





                            <div class="form-check" data-toggle="modal" data-target="#exampleModal">
                                <input class="form-check-input" type="radio" name="option" id="option"  value="recuperation">
                            <label class="form-check-label" for="recuperation" >
                            Recuperation chez Tingene
                            </label>
                            </div>
                            <p>En  choissisant cette option vous allez recuperer votre commande au bureau de Tingene</p>


                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option" id="option" value="notInscription">
                                <label class="form-check-label" for="notInscription">
                                Commande sans Inscription
                                </label>
                                </div>
                                <p>En créant un compte, vous pourrez faire vos achats plus rapidement, connaître le statut de vos commandes et garder trace de vos achats précédents</p>


                    </div>


                <div class="col-md-6">
                    <h4 class="mb-4">Compte client existant</h4>
                    <p>J’ai déjà procédé à la création d’un compte client</p>



                    <div class="form-group mb-0">
                            <a type="button" href="/login">Se connecter</a>
                    </div>

            </div>


            </div>


            <div class="form-group mb-0">
                {{-- <a href="{{ route('order.create' , ["option" => $option]) }}">  --}}
                    <button type="submit" class="btn btn-primary px-3"> Continuer</button>
                {{-- </a> --}}
            </div>

                    </form>





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

    <h1>Bonjour</h1>






@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>







@endsection

