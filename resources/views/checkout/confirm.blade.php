@extends('../layouts.master')


@section('title') Checkout @endsection

@section('css')

@php
    $payment_id = $_GET['payment_id'];

@endphp


<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

@endsection




@section('stripe')
@endsection






@section('main')

               <div class="container">
                <form action="{{ route('order.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="payment_id" value="{{ $payment_id }}">

                        <button type="submit" class="btn btn-primary form-control mt-4">Submit</button>
                </form>

               </div>



@endsection

@section('js')

<script>


</script>

@endsection

