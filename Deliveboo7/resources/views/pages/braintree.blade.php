@extends('layouts.main-layout')

@section('content')
    <main>

        <div class="content">
            <form method="post" id="payment-form" action="{{route('checkout', $order)}}">
                @csrf

                <section>
                    <label for="amount">
                        <span class="input-label">Totale da pagare: {{$totalPrice}} €</span>
                        <div class="input-wrapper amount-wrapper">
                            <input id="amount" name="amount" type="hidden" min="1" placeholder="{{$totalPrice}}" value="{{$totalPrice}}">
                        </div>
                    </label>

                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </section>

                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <button class="button" type="submit"><span>Esegui pagamento</span></button>
            </form>
        </div>

    </main>

    <script src="https://js.braintreegateway.com/web/dropin/1.30.1/js/dropin.min.js"></script>
    <script>
    var form = document.querySelector('#payment-form');
    var client_token = "{{$token}}";

    braintree.dropin.create({
        authorization: client_token,
        selector: '#bt-dropin'
    }, function (createErr, instance) {
        if (createErr) {
            console.log('Create Error', createErr);
            return;
        }
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                    console.log('Request Payment Method Error', err);
                    return;
                }

                // Add the nonce to the form and submit
                document.querySelector('#nonce').value = payload.nonce;
                form.submit();
            });
        });
    });
    </script>

@endsection
