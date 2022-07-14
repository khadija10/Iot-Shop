@extends('../layouts.master')


@section('title') Checkout @endsection


@section('stripe')
<script src="https://js.stripe.com/v3/"></script>
@endsection



@section('main') 


@endsection

@section('js')

<script>

    var stripe = Stripe('pk_test_51LLD5OKNR5j2J1cQrhm1KSmDXZRGwAxVnA46oTPWpJoZJLZwJkuxbF3SbhCE89rEWid9WpW4sMnkTE2Wml5MASZN00MZIPGvZT');

    var elements = stripe.elements();

    // var style = {
    //     base:{
    //         color: "#32325D",

    //     }
    // }


    var card = elements.create("card", { 
        base: {
            classes: 'form-outline form-white mb-4'
        }
    });

    card.mount("#card-element");

    card.addEventListener('change', ({error}) => {
      const displayError = document.getElementById('card-errors');
      if(error){
        displayError.classList.add('alert', 'alert-warning');
        displayError.textContent = error.message;
      }else{
        displayError.classList.remove('alert', 'alert-warning');
        displayError.textContent = '';
      }
    });


    var submitButton = document.getElementById('submit');

    submitButton.addEventListener('click', function(ev) {
        ev.preventDefault(); 
        stripe.confirmCardPayment("{{ $clientSecret }}", {
            payment_method: {
                card: card   
            }
        }).then(function(result) {
            if(result.error){
                console.log(result.error.message);
            }else{
                if(result.paymentIntent.status == 'succeeded'){
                    console.log(result.paymentIntent);


                }
            }
        })
    })

</script>


@endsection


