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
                                            <button type="submit" class="btn btn-primary form-control" href="" >Submit</button>
                                            </div>
                                        </div>

                                        </form>

                                </div>
                            </section>

                        </div>
                      </div>

                   </div>


                </div>
            </form>
        </div>
    </div>





@endsection

@section('js')

<script>


</script>





@endsection

