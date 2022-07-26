@extends('../layouts.master')


@section('title') Checkout @endsection

@section('css')





<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

@endsection




@section('stripe')
@endsection

@section('main')

                   <div class="container py-4">

                    <div class="card">
                        <div class="card-body">
                            <section>
                                <div class="inner">
                                    <div class="form-row table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr class="space-row">
                                                    <th>Nom et Prenom du destinataire:</th>
                                                    <td ></td>
                                                </tr>
                                                <tr class="space-row">
                                                    <th>Adresse complete:</th>
                                                    <td ></td>
                                                </tr>
                                                <tr class="space-row">
                                                    <th>Telephone:</th>
                                                    <td ></td>
                                                </tr>
                                                <tr class="space-row">
                                                    <th>List de produits</th>
                                                    <td ></td>
                                                </tr>
                                                <tr class="space-row">
                                                    <th>Nombre de produits</th>
                                                    <td></td>
                                                </tr>

                                                <tr class="space-row">
                                                    <th>Total à payer</th>
                                                    <td></td>
                                                </tr>
                                                <tr class="space-row">
                                                    <th>Numero de Paiement</th>
                                                    <td ></td>
                                                </tr>
                                                <tr class="space-row">
                                                    <th>Type de Paiement</th>
                                                    <td></td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                        </div>
                </div>
            </div>

                        </div>
                      </div>

                   </div>



@endsection

@section('js')

<script>


</script>

@endsection

