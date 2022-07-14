@extends('../../layouts.base')


@section('title') Add category page @endsection

<link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link href="{{ URL::asset('admin/css/fontawesome.min.css'); }}" rel="stylesheet">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="{{asset('admin/jquery-ui-datepicker/jquery-ui.min.css')}}" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link href="{{ URL::asset('admin/css/bootstrap.min.css'); }}" rel="stylesheet">
    <!-- https://getbootstrap.com/ -->
    <link href="{{ URL::asset('admin/css/templatemo-style.css'); }}" rel="stylesheet">





@section('pageName') {{ __('Add New Category') }} @endsection




@section('main') 

<div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add Category</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="{{ route('ajoutCate') }}" method="POST" class="tm-edit-product-form">
                @csrf  
                <div class="form-group mb-3">
                    <label
                      for="name"
                      >Category Name
                    </label>
                    <input
                      name="name"
                      type="text"
                      class="form-control validate"
                      required
                    />
                  </div>
                  
                  </div>
                  
              </div>
              
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
              </div>
                        </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    



@endsection

<script src="{{asset('admin/js/jquery-3.3.1.min.js')}}"></script>

    <!-- https://jquery.com/download/ -->
    <!-- https://jqueryui.com/download/ -->
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>



