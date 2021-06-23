@extends('layouts.main-layout')

@section('content')

    <div id="showRestaurant">
        <div class="mycontainer">

            {{-- nome --}}
            <div class="restaurant_name">
                <h2>{{ $user->nome_attivita }}</h2>

                <p>Tipo di Cucina</p>

                @foreach ($user->types as $type)
                    <h6>{{ $loop->last ? $type->nome : $type->nome . ', ' }}</h6>

                @endforeach
                {{-- immagine ristorante --}}
            </div>

            <div class="menu_container flex_col align_cen">

                @if (Auth::check() && Auth::user()->id == $user->id)

                    <div class="restaurant_options flex space_bet">

                        {{-- option_card --}}
                        <div class="option_card" title="Crea nuovo prodotto">
                            <a href="{{ route('createDish') }}" class="flex space_bet align_cen">
                                <h6>Aggiungi nuovo prodotto</h6>
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>

                        <div class="option_card" title="Guarda gli ordini ricevuti">
                            <a href="" class="flex space_bet align_cen">
                                <h6>Ordini Ricevuti</h6>
                                <i class="fas fa-clipboard-list"></i>
                            </a>
                        </div>

                        <div class="option_card" title="Guarda statistiche">
                            <a href="" class="flex space_bet align_cen">
                                <h6>Statistiche Ordini</h6>
                                <i class="fas fa-chart-line"></i>
                            </a>
                        </div>
                    </div>

                @endif

                <h3>Menu</h3>

                <ul class="flex_wrap">

                    @foreach ($user->dishes as $dish)

                        @if (!$dish->deleted)

                            <li>
                                {{-- card piatto --}}
                                <div class="dish_card" title="Aggiungi {{ $dish->nome }} al carrello">
                                    <h6>{{ $dish->nome }}</h6>
                                    <p>{{ $dish->descrizione }}</p>
                                    <h6>{{ $dish->prezzo }} €</h6>

                                    @if (Auth::check() && Auth::user()->id == $user->id)

                                        {{-- edit --}}
                                        <div class="edit_row" title="Modifica prodotto">
                                            <a href="{{ route('editDish', $dish->id) }}" class="flex space_bet align_cen">
                                                <p>Modifica</p>
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </div>

                                        {{-- delete --}}
                                        <div class="delete_row" title="Elimina prodotto">
                                            <a href="{{ route('destroy', [$dish->id, $user->id]) }}" class="flex space_bet align_cen">
                                                <p>Elimina Prodotto</p>
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </div>

                                    @endif
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
