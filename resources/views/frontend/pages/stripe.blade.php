@extends('frontend.app')
<link rel="stylesheet" href="{{ asset('public/frontend/css/userProfile.css') }}" />
<script src="https://js.stripe.com/v3/"></script>
<style type="text/css">
    .StripeElement {
        box-sizing: border-box;

        height: 40px;
        width: 100%;
        padding: 10px 12px;

        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;

        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
      }

      .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
      }

      .StripeElement--invalid {
        border-color: #fa755a;
      }

      .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
      }
</style>
@include('frontend.menu')


<section>
    <div class="container" style="margin-top: 200px">
        <div class="row">
            <div class="col-lg-6">
                <form action="{{ route('stripe.charge') }}" method="post" id="payment-form" style="border: 2px solid gray; padding: 20px">
                    @csrf
                    <div class="form-group p-5">
                        <select name="totalCharge">
                            <option value="99">For 7 day $99</option>
                            <option value="999">For 30 day $999</option>
                        </select>
                    </div>
                    <div class="form-row">
                      <label for="card-element">
                        Credit or debit card
                      </label>
                      <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                      </div>

                      <!-- Used to display form errors. -->
                      <div id="card-errors" role="alert"></div>
                    </div>

                    <button>Submit Payment</button>
                  </form>
            </div>
        </div>
    </div>
</section>




<script type="text/javascript">
    // Create a Stripe client.
var stripe = Stripe('pk_test_NvVxPgkl1lzWU4bKHi50oy7Z00aSA2jmjA');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
