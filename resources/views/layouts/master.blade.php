<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    @yield('css')


    @yield('meta')


    @yield('stripe')

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ URL::asset('shop/lib/owlcarousel/assets/owl.carousel.min.css'); }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ URL::asset('shop/css/style.css'); }}" rel="stylesheet">
</head>

<body>

    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">Iot</span>Shop</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="{{route('products.recherche')}}">
                    <div class="input-group">
                        <input name="q" value="{{ request()->q ?? '' }}" type="text" class="form-control" placeholder="Search for products">
                        <button class="input-group-append" type="submit">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search" type="submit"></i>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="{{ route('cart.index') }}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">{{ getNumber(Cart::count()) }}</span>
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))

<div class="alert alert-success">
    {{ session('success')}}
</div>

@endif


@if(session('danger'))

<div class="alert alert-danger">
    {{ session('danger')}}
</div>

@endif


    <!-- Topbar End -->


     <!-- Navbar Start -->
    @yield('navbar')
    <!-- Navbar End -->

   
    @yield('main')

    @yield('prod')


    @yield('modal')


    @yield('js')


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('shop/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('shop/lib/owlcarousel/owl.carousel.min.js')}}"></script>


    <!-- Contact Javascript File -->

    <script src="{{asset('shop/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('shop/mail/contact.js')}}"></script>


    <!-- Template Javascript -->
    <script src="{{asset('shop/js/main.js')}}"></script>

    @include('layouts.footer')
</body>