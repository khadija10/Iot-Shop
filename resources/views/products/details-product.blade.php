@extends('../layouts.master')


@section('title') Shop Shop @endsection


@section('navbar')




@section('main') 


     

    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset('storage/'. str_replace("public", "", $product->image)) }}" alt="Image">
                        </div>
                        
                        
                        
                    </div>
                    
                    
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ $product->name }}</h3>
                
                <h3 class="font-weight-semi-bold mb-4">{{ getPrice($product->price) }} </h3>
                <p class="mb-4">{{ $product->description }}.</p>
                
                
                
                    <form action="{{ route('cart.store') }}" method="POST">
                    @csrf  
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        
                    <button class="btn btn-primary px-3" type="submit"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                    </form>

                </div>
                
            </div>
        </div>
        
    </div>
    <!-- Shop Detail End -->

@endsection



