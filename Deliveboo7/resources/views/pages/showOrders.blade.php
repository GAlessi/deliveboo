@extends('layouts.main-layout')

@section('content')

    <main>
        <div id="showOrders">
            <div class="mycontainer">

                <h2>Ciao {{ $user->name }}</h2>

                <h5>Questi sono gli ordini ricevuti dal tuo ristorante</h5>

                <div class="orders_container">

                    <ul class="flex_wrap">

                        @foreach ($orderSel as $restaurantOrder)

                            <li>
                                <div class="order_card flex_col align_start">
                                    <h6><i class="fas fa-calendar-day"></i>Ordine del: {{ $restaurantOrder->created_at }}</h6>
                                    <h6><i class="fas fa-check-square"></i>Stato Ordine: {{ $restaurantOrder->status }}</h6>
                                    <h6><i class="fas fa-user-alt"></i>Cliente: {{ $restaurantOrder->nome_cliente }}
                                        {{ $restaurantOrder->cognome_cliente }} - Tel {{ $restaurantOrder->telefono }}
                                    </h6>
                                    <h6><i class="fas fa-drumstick-bite"></i>Prodotti ordinati:
                                            @foreach ($restaurantOrder -> dishes as $dish)
                                                {{ $loop->last ? $dish->nome : $dish->nome . ', ' }}
                                            @endforeach
                                     </h6>
                                    <h6><i class="fas fa-euro-sign"></i>Pagamento: {{ $restaurantOrder->totalPrice }}</h6>
                                    <h6><i class="fas fa-map-marker-alt"></i>Consegnato in: {{ $restaurantOrder->via }} {{ $restaurantOrder->n_civico }},
                                        {{ $restaurantOrder->citta }}, {{ $restaurantOrder->cap }}</h6>
                                    @if ($restaurantOrder->note)
                                        <p><i class="fas fa-sticky-note"></i>Note: "{{ $restaurantOrder->note }}"</p>
                                    @endif
                                </div>
                            </li>

                        @endforeach


                    </ul>

                </div>


                {{-- fine mycontainer --}}
            </div>

            {{-- fine #showOrders --}}
        </div>
    </main>


@endsection
