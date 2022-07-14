@extends('../layouts.master')


@section('title') Shop Shop @endsection


@section('main') 
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100px">
        @if(request()->input())
            <h5> {{ $products->count() }} resultat(s) pour la recherche</h5>
            @endif    
        <div class="d-inline-flex">
            <p class="m-0"><a href="/">Home</a></p>

            

            </div>

        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">


            <!-- Shop Product Start -->
           
                    
                    
                    @include('../layouts.product')

            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


@endsection


