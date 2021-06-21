@extends('layouts.main-layout')

@section('content')

    <div id="showRestaurant">
        <div class="mycontainer">

            <div class="restaurant_name">
                <h2>{{ $user->nome_attivita }}</h2>
                <h4>Menu</h4>
            </div>

            <div class="menu_container">

                <ul class="flex_wrap">
                    @foreach ($user->dishes as $dish)
                        <li>
                            {{-- card piatto --}}
                            <div class="dish_card" title="Aggiungi {{ $dish->nome }} al carrello">
                                <h6>{{ $dish->nome }}</h6>
                                <p>{{ $dish->descrizione }}</p>
                                <h6>{{ $dish->prezzo }} €</h6>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


    </div>
@endsection
