@extends('../../layouts.base')


@section('title') admin product page @endsection



<link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->


    <link href="{{ URL::asset('admin/css/fontawesome.min.css'); }}" rel="stylesheet">

    <!-- https://fontawesome.com/ -->
    <link href="{{ URL::asset('admin/css/bootstrap.min.css'); }}" rel="stylesheet">
    <!-- https://getbootstrap.com/ -->


@section('pageName') {{ __('Admin Product View') }} @endsection




@section('main') 
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Product</h1>
</div>

<div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">Price</th>
                    <th scope="col">Active</th>
                    <th scope="col">description</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                  <tr>
                    <td class="tm-product-name">{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->active }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                      <a href="{{$product->id }}" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                    <td>
                      <form action="/update" method="post">
                      <a href="{{$product->id }}/update" class="tm-product-edit-link">
                        <i class="far fa-trash-alt tm-product-edit-icon"></i>
                      </a>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a
              href="add-product"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
          </div>
        </div>




@endsection

@section('js')

<script src="{{asset('admin/js/jquery-3.3.1.min.js')}}"></script>
    <!-- https://jquery.com/download/ -->
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>


@endsection


