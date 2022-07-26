@extends('../layouts.master')


@section('title') Shop Shop @endsection

@section('css')

  <style>
    @media (min-width: 1025px) {
  .h-custom {
    height: 100vh !important;
    }
    }
  </style>

<!-- CSS only -->

@endsection


@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection




@section('main')


<section class="h-100 h-custom" style="background-color: #eee;">
@if(Cart::count() > 0)


<div class="p-3 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body ">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="/" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                <hr>

            @foreach(Cart::content() as $product)


            @php
               // echo(Cart::content());
            @endphp


                <div class="card mb-3 mb-lg-0 mt-2" >
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img class="img-fluid rounded-3" src="{{ asset('storage/'. str_replace("public", "", $product->model->image)) }}" alt="image" style="width: 65px;">
                        </div>
                        <div class="ms-3" style="margin-left:100px;">
                          <h5>{{ $product->name }}</h5>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                      <div style="margin-right:10px;">
                            <select name="qty" id="qty" data-id="{{ $product->rowId }}" data-stock="{{ $product->model->stock }}" class="custom-select">
                              @for($i=1; $i <=7; $i++)
                              <option {{ $i == $product->qty ? 'selected' : '' }} value="{{ $i }}" > {{ $i }} </option>
                              @endfor

                        </select>
                      </div>
                        <div style="width: 170px;">
                          <h5 class="mb-0">{{ getPrice($product->subtotal()) }}</h5>
                        </div>


                        <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
                          @csrf
                          @method('DELETE')
                        <button class="text-dark" type="submit" style="color: #cecece;"><i class="fas fa-trash-alt"></i></button>

                        </form>
                    </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              <div class="col-lg-5">

                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Card details</h5>
                       </div>





                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Subtotal</p>
                      <p class="mb-2">{{ getPrice(Cart::subtotal()) }}</p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Taxe</p>
                      <p class="mb-2">{{ getPrice(Cart::tax()) }}</p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total(Incl. taxes)</p>
                      <p class="mb-2">{{ getPrice(Cart::total()) }} </p>
                    </div>

                    <button type="button" class="btn btn-info btn-block btn-lg">
                      <div class="d-flex justify-content-between">
                        <span>{{ getPrice(Cart::total()) }} </span>




                        <button class="btn btn-success btn-block btn-lg"> <a href="{{ route('checkout.index') }}"> <div>Passer à la caisse <i class="fas fa-long-arrow-alt-right ms-2"></i></div> </a></button>

                      </div>
                    </button>

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


  @else
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100px">
            <h5> Votre panier est vide</h5>
            <div class="d-inline-flex">
            <p class="m-0"><a href="/">Home</a></p>

            </div>
        </div>
      <div style="height:100px"></div>
@endif

</section>




@endsection


@section('modal')



@endsection


@section('js')

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


<script>
    var qts = document.querySelectorAll('#qty');


    Array.from(qts).forEach((element) => {
        element.addEventListener('change', function() {



            var rowId = this.getAttribute('data-id');
            var stcok = this.getAttribute('data-stock');

            // console.log(rowId);
            var myHeaders ={
                        'Accept': 'application/json, text-plain, */*',
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      };

            const body={
                  qty: this.value,
                  stock: stcok
                };

            var url = `/panier/${rowId}`;

            var myInit = {
                          headers: myHeaders,
                          method: 'PATCH',
                          body: JSON.stringify(body)
                      };





            fetch(url, myInit).then((data) => {
                console.log(data);
                location.reload();
            }).catch((error) => {
                console.log(error);
            })

        });
    });



</script>


@endsection






