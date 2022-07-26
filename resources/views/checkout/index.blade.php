@extends('../layouts.master')


@section('title') Checkout @endsection

@section('css')


<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

@endsection




@section('stripe')
@endsection






@section('main')


                    <!-- SECTION 1 -->
                    {{-- <h2>
                        <span class="step-icon"><i class="zmdi zmdi-account"></i></span>
                        <span class="step-text">About</span>
                    </h2> --}}


                   <div class="container py-4">

                    <div class="card">
                        <div class="card-body">

                            <section>
                                <div class="inner">
                                    <h3>Option de la commande:</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="mb-4">Nouveau Client</h4>


                                                <div class="form-check" data-toggle="modal" data-target="#exampleModal">
                                                    <a href="/register"> <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"></a>
                                                <label class="form-check-label" for="flexRadioDefault1" >
                                                Inscription
                                                </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                    Commande sans Inscription
                                                    </label>
                                                    </div>
                                                    <p>En créant un compte, vous pourrez faire vos achats plus rapidement, connaître le statut de vos commandes et garder trace de vos achats précédents</p>

                                                    <div class="form-group mb-0">
                                                        <a href="{{ route('delivery.create') }}"> <button class="btn btn-primary px-3"> Continuer</button> </a>
                                                    </div>
                                        </div>


                                    <div class="col-md-6">
                                            <h4 class="mb-4">Compte client existant</h4>
                                            <p>J’ai déjà procédé à la création d’un compte client</p>
                                            @auth
                                            <form>
                                                <div class="form-group">
                                                    <label for="email">Your Email *</label>
                                                    <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="name">Your Password *</label>
                                                    <input type="password" class="form-control" id="password" value="{{ Auth::user()->password }}">
                                                </div>

                                                <div class="form-group mb-0">
                                                    <input type="submit" value="Se connecter" class="btn btn-primary px-3">
                                                </div>
                                            </form>

                                            @else

                                            <div class="form-group mb-0">
                                                    <a type="button" href="/login">Se connecter</a>
                                            </div>

                                            @endauth
                                    </div>


                                </div>
                            </section>
                        </div>
                      </div>

                   </div>
                    <!-- SECTION 2 -->
                    {{-- <h2>
                        <span class="step-icon"><i class="zmdi zmdi-lock"></i></span>
                        <span class="step-text">Personal</span>
                    </h2>
                    <section>
                        <div class="inner">
                            <h3>Information de la destination:</h3>

                            <form action="{{ route('delivery.store') }}" method="POST">
                                @csrf
                                <div class="row py-3">

                                <div class="col">
                                <input type="text" class="form-control" placeholder="Nom et prenom" name="destName">
                                </div>
                                <div class="col">
                                <input type="number" class="form-control" placeholder="Numéro de téléphone" name="phone">
                                </div>
                                </div>

                                <div class="row">
                                <div class="col">
                                <input type="text" class="form-control" placeholder="Rue et Numero de la rue" name="address">
                                </div>
                                <div class="col">
                                <input type="text" class="form-control" placeholder="Apt, villa, " name="villa">
                                </div>
                                </div>

                                <div class="row py-3">
                                    <div class="col">
                                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                                    </div>
                                </div>

                                </form>

                        </div>
                    </section> --}}
                    <!-- SECTION 3 -->
                    {{-- <h2>
                        <span class="step-icon"><i class="zmdi zmdi-card"></i></span>
                        <span class="step-text">Payment</span>
                    </h2>
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
                                            <h4 class="mb-3">Paiement Avec wave</h4> --}}

                                            {{-- contentp1 --}}

                                           {{-- <form action="" method="POST">
                                            <div class="row">

                                                <div class="form-holder form-holder-2 col-6">
                                                    <p>Veillez effectuer le payment sur votre telephone</p>
                                                   <img src="{{ asset('checkout/images/wave.jpg') }}" alt="Wave qr" class="rounded w-50">
                                                   <input type="hidden" class="form-control" placeholder="Numéro de téléphone" name="type" value="wave">
                                                </div>

                                                <div class="col-6">
                                                    <p>Puis entrer ce numero sur ce champs</p>
                                                    <input type="number" class="form-control" placeholder="Numéro de téléphone" name="phone">

                                                        <button type="submit" class="btn btn-primary form-control mt-4">Submit</button>
                                                </div>

                                            </div>

                                        </div>


                                     </form>
                                        <div class="tab-pane fade" id="tab-pane-2">
                                            <h4 class="mb-3">Paiement Avec Orange Money</h4>
                                            <div class="form-row">
                                                <div class="form-holder form-holder-2">
                                                   <img src="{{ asset('checkout/images/wave.jpg') }}" alt="Wave qr" class="rounded w-25">
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>



                        </div>
                    </section> --}}
                    <!-- SECTION 4 -->
                    {{-- <h2>
                        <span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
                        <span class="step-text">Confirm</span>
                    </h2>
                    <section>
                        <div class="inner">
                            <h3>Confirm Details:</h3>
                            <div class="form-row table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr class="space-row">
                                            <th>Nom et Prenom du destinataire:</th>
                                            <td id="fullname-val"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>Adresse:</th>
                                            <td id="email-val"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>Telephone:</th>
                                            <td id="phone-val"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>Nombre de produits</th>
                                            <td id="username-val"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>List de produits</th>
                                            <td id="pay-val"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>Total à payer</th>
                                            <td></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>Type de Paiement</th>
                                            <td id="address-val"></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </form>
        </div>
    </div>--}}





@endsection

@section('js')

<script>


</script>





@endsection

