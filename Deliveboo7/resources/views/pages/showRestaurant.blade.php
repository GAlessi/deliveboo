@extends('layouts.main-layout')

@section('content')


    {{-- <div id="app" class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    {{ $user -> nome_attivita }}
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h3>
                    Menu
                </h3>
                <ul>
                    @foreach ($user->dishes as $dish)
                        @if ($dish->visibilita)

                            <li @click='prova()'>
                                {{ $dish -> nome }} / {{$dish -> prezzo_cent}} $
                                <input id='{{ $dish -> nome }}' type="checkbox" name="{{ $dish -> nome }}" data-price='{{ $dish -> prezzo_cent }}'>
                                <p>
                                    Descrizione:
                                </p>
                                <h4>
                                    {{ $dish -> descrizione }}
                                </h4>
                            </li>

                        @endif

                    @endforeach
                </ul>
            </div>
        </div> --}}






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
                            <div class="dish_card" title="Aggiungi {{ $dish -> nome }} al carrello">
                                <h6>{{ $dish -> nome }}</h6>
                                <p>{{ $dish -> descrizione }}</p>
                                <h6>{{$dish -> prezzo_cent}} €</h6>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


    </div>
@endsection
