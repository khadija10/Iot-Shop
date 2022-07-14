<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>

    @yield('css')

    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">



<!-- JavaScript Bundle with Popper -->

<link href="{{ URL::asset('shop/lib/owlcarousel/assets/owl.carousel.min.css'); }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ URL::asset('shop/css/style.css'); }}" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
    
    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('admin/dashboard.js'); }}" rel="stylesheet">

</head>
      
<x-app-layout id="reportsPage">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @yield('pageName')

            <!-- {{ __('Dashboard for Admin') }} -->
        </h2>
    </x-slot>



    <div class="container-fluid" id="home">
  <div class="row flex-nowrap">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-4" id="navbarNavDropdown">
        <ul class="nav flex-column">
          <li class="nav-item mb-3">
            <a class="nav-link d-inline" href="dashboard">
              <span data-feather="home" class="align-text-bottom d-inline"></span>
              Dashboard
            </a>
          
          </li>
          <li class="nav-item mb-3">
            <a class="nav-link d-inline" href="categories">
              <span data-feather="file" class="align-text-bottom d-inline"></span>
              Categories
            </a>
          </li>
          <li class="nav-item mb-3 ">
            <a class="nav-link d-inline" href="products">
              <span data-feather="shopping-cart" class="align-text-bottom d-inline"></span>
              Products
            </a>
          
          </li>
          
          <li class="nav-item mb-3">
            <a class="nav-link d-inline" href="#">
              <span data-feather="users" class="align-text-bottom d-inline"></span>
              Customers
            </a>
          </li>
          <li class="nav-item mb-3">
            <a class="nav-link d-inline" href="#">
              <span data-feather="bar-chart-2" class="align-text-bottom d-inline"></span>
              Orders
            </a>
          </li>
          <li class="nav-item mb-3">
            <a class="nav-link d-inline" href="#">
              <span data-feather="layers" class="align-text-bottom d-inline"></span>
              Integrations
            </a>
          </li>
        </ul>

      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    @yield('main')

      
    </main>
  </div>
</div>

      

    </x-app-layout>

    <script>
      feather.replace()
    </script>


    @yield('js')
<script src="{{asset('admin/js/jquery-3.3.1.min.js')}}"></script>


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

</html>

