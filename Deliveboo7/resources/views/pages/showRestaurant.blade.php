@extends('layouts.main-layout')

@section('content')

  <main>
    <div id="app" v-cloak>
      <div id="showRestaurant">
        <div class="mycontainer relative">

          {{-- carrello icona --}}
          @if (Auth::check() && Auth::user()->id != $user->id)
            <div class="cart flex_center absolute" @click="showCart" title="Vai al tuo Ordine">
              <img src="{{ asset('/storage/images/shopping-cart.png') }}" alt="carrello" class="relative">

              {{-- bollino --}}
              <div v-if='cartItems > 0' class="cart_count flex_center absolute animate__animated animate__shakeY">
                <span>@{{ cartItems }}</span>
              </div>
            </div>
          @endif
          @guest
            <div class="cart flex_center absolute" @click="showCart" title="Vai al tuo Ordine">
              <img src="{{ asset('/storage/images/shopping-cart.png') }}" alt="carrello" class="relative">

              {{-- bollino --}}
              <div v-if='cartItems > 0' class="cart_count flex_center absolute animate__animated animate__shakeY">
                <span>@{{ cartItems }}</span>
              </div>
            </div>

          @endguest

          {{-- carrello aperto --}}
          <div class="opened_cart flex_col animate__animated animate__fadeInRight" :hidden="cartHidden">

            <div @click="showCart" class="riduci flex just_end align_cen">
              <p>Riduci</p>
              <h6><i class="fas fa-long-arrow-alt-right"></i></h6>
            </div>

            <h3>Il tuo ordine</h3>
            <h4>Ristorante: {{ $user->nome_attivita }}</h4>
            <h5>Totale prodotti: @{{ cartItems }} </h5>

            <ul>
              <li v-for='(dish, index) in carrello'>
                <h6>@{{ dish . nome }}</h6>
                <p>Prezzo: <b>@{{ carrello[index] . prezzo * carrello[index] . counter . toFixed(2) }} €</b></p>
                {{-- <p>Quantità: <b>@{{ dish . counter }}</b></p> --}}
                <p class="flex_center">
                  <i class="fas fa-minus" @click='decrease(dish.id, index)'></i>
                  <span>Quantità: <b>@{{ dish . counter }}</b></span>

                  <i class="fas fa-plus" @click='increase(dish.id, index)'></i>
                </p>
              </li>
              <li>
                <h5>Totale: @{{ totalPrice . toFixed(2) }} €</h5>
              </li>

            </ul>

            {{-- submit --}}
            <form class="flex_center" :action="'/createOrder/' + carrelloIDs" method="post">
              @csrf
              <input type="hidden" name="totalPrice" :value="totalPrice.toFixed(2)">
              <button type="submit" class="btn-link">
                Vai al Checkout <i class="fas fa-angle-double-right"></i>
              </button>
            </form>
          </div>

          <div class="restaurant_info flex_col align_cen">

            <h2>{{ $user->nome_attivita }}</h2>

            {{-- info card ristorante --}}
            <div class="restaurant_info_card flex_col align_start">
              {{-- immagine ristorante --}}
              <div class="restaurant_image">
                <img src="{{ asset('/storage/restaurantImages/' . $user->file_path) }}" alt="immagine_ristorante"
                  alt="">
              </div>

              <div class="info_card_row flex align_cen">
                <i class="fas fa-utensils"></i>
                <h6>Tipo di Cucina:

                  @foreach ($user->types->sortBy('nome') as $type)

                    {{ $loop->last ? $type->nome : $type->nome . ', ' }}

                  @endforeach

                </h6>
              </div>

              <div class="info_card_row flex align_cen">
                <i class="fas fa-map-marker-alt"></i>
                <h6>{{ $user->via }} {{ $user->n_civico }}, {{ $user->citta }},
                  {{ $user->cap }}</h6>
              </div>

              <div class="info_card_row flex align_cen">
                <i class="far fa-envelope"></i>
                <h6>{{ $user->email }}</h6>
              </div>
            </div>

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
                  <a href="{{ route('showOrders', $user->id) }}" class="flex space_bet">
                    <h6>Ordini Ricevuti</h6>
                    <i class="fas fa-clipboard-list"></i>
                  </a>
                </div>

                <div class="option_card" title="Guarda statistiche">
                  <a href="{{ route('statistiche', $user->id) }}" class="flex space_bet align_cen">
                    <h6>Statistiche Ordini</h6>
                    <i class="fas fa-chart-line"></i>
                  </a>
                </div>
              </div>

            @endif

            <h3>Menu</h3>

            <ul class="flex_wrap">

              @foreach ($user->dishes->sortBy('nome') as $dish)

                @if (!Auth::check() || Auth::user()->id != $user->id)

                  @if (!$dish->deleted && $dish->visibilita)

                    <li>
                      {{-- card piatto --}}
                      <div class="dish_card flex_col just_start" title="Aggiungi {{ $dish->nome }} al carrello">
                        <h5>{{ $dish->nome }}</h5>
                        <p><span>Ingredienti:</span> {{ $dish->ingredienti }}</p>
                        <p><span>Descrizione:</span> {{ $dish->descrizione }}</p>
                        <h6>Prezzo: {{ round($dish->prezzo, 2) }} €</h6>

                        {{-- bottone aggiungi al carrello --}}
                        @if (Auth::check() && Auth::user()->id != $user->id)
                          <button @click="addToCart({{ $dish }})" class="flex_center">
                            Aggiungi all'ordine <i class="fas fa-cart-plus"></i>
                          </button>
                        @endif
                        @guest
                          <button @click="addToCart({{ $dish }})" class="flex_center">
                            Aggiungi all'ordine <i class="fas fa-cart-plus"></i>
                          </button>
                        @endguest

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
                @endif
                @if (Auth::check() && Auth::user()->id == $user->id)
                  <li>
                    {{-- card piatto --}}
                    <div class="dish_card flex_col just_start {{ !$dish->visibilita ? 'chiaro' : '' }}"
                      title="Aggiungi {{ $dish->nome }} al carrello">
                      <h5>{{ $dish->nome }}</h5>
                      <p><span>Ingredienti:</span> {{ $dish->ingredienti }}</p>
                      <p><span>Descrizione:</span> {{ $dish->descrizione }}</p>
                      <h6>Prezzo: {{ round($dish->prezzo, 2) }} €</h6>

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
            {{-- fine menu_container --}}
          </div>
          {{-- fine mycontainer --}}
        </div>
        {{-- fine #showRestaurant --}}
      </div>
      {{-- fine #app --}}
    </div>
  </main>

@endsection
