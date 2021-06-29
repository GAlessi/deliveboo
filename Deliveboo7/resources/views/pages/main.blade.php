@extends('layouts.main-layout')

@section('content')
    <div id="app">

        <main>

            <div id="mainPage">

                @if (Auth::check())

                    {{-- sezione myrestaurant --}}
                    <div id="myrestaurant">

                        <h2>Bentornato {{ $user->name }}</h2>

                        {{-- link al mio ristorante --}}
                        <a href="{{ route('show', $user->id) }}">
                            <h3>Vai al tuo ristorante <i class="fas fa-angle-double-right"></i></h3>
                        </a>

                    </div>
                @endif

                {{-- sezione jumbotron --}}
                <section id="myjumbotron">
                    <div class="mycontainer flex_wrap">

                        {{-- title --}}
                        <div class="title">
                            <h1>Deliveboo!</h1>
                            <h3>i piatti che ami, a domicilio.</h3>
                        </div>

                            {{-- ricerca per nome ristorante --}}
                            <input v-if="filter.length == 0" type="text" placeholder="Cerca un ristorante" type="text"
                                @keyup='searchRestaurant' v-model='searchedRestaurantTxt'>

                            {{-- filtro ricerca --}}
                            <div class="jumbotron_search flex_col align_cen">

                                {{-- ricerca per nome ristorante --}}
                                <input v-if="filter.length == 0" type="text" placeholder="Cerca un ristorante" type="text"
                                    @keyup='searchRestaurant' v-model='searchedRestaurantTxt'>

                                {{-- button --}}
                                {{-- <button @click="searchRestaurant">Cerca!</button> --}}

                                <h6 v-if='searchedRestaurantTxt == "" && filter == 0'>Oppure</h6>


                                {{-- ricerca per tipologie --}}
                                <div class="chekbox_container" v-if="searchedRestaurantTxt == false">

                                    <label for="type_id[]">Seleziona una o più Tipologie di Cucina</label>

                                    <ul class="flex_wrap">

                                        @foreach ($types as $type)
                                            <li class="flex just_start align_cen">
                                                <input id="types_id" v-model="filter" v-on:change="getFilteredRestaurant()"
                                                    name="types_id" type="checkbox" value="{{ $type->id }}">
                                                {{ $type->nome }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                {{-- fine filtro ricerca --}}
                            </div>

                            {{-- immagine --}}
                            <div class="picture relative">
                                <img class="jumbotron_casa absolute" src="{{ asset('/storage/images/casa.png') }}" alt="">
                                <img class="jumbotron_moto absolute animate__fadeInRightBig" id="boy-img"
                                    src="{{ asset('/storage/images/boy.png') }}">
                            </div>
                        </div>
                    </div>
                </section>

            {{-- ristoranti filtrati per nome --}}
            <section v-if="searchedRestaurantTxt.length > 0 && showSearch" id="filtered_restaurants"
                class="animate__animated animate__fadeInUp">
                <div class="mycontainer" v-if="txtFilteredRestaurant.length > 0">

                        <h3>Ecco cosa abbiamo trovato per te</h3>

                        <div class="filtered_restaurants_container">

                            <ul class="flex_wrap">
                                <li v-for="restaurant in txtFilteredRestaurant">
                                    <div class="restaurant_card relative">
                                        <a :href="'/showRestaurant/' + restaurant.id">
                                            <img :src="'/storage/restaurantImages/' + restaurant.file_path"
                                                alt="immagine_ristorante">
                                            <h4 class="absolute">@{{ restaurant . nome_attivita }}</h4>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mycontainer" v-else>
                        <h3>Ooops! Nessun ristorante corrisponde alla tua ricerca. Cercane un altro o prova la ricerca per
                            tipologia di cucina</h3>
                    </div>
                    {{-- fine sezione ristoranti filtrati per nome --}}
                </section>

                {{-- sezione ristoranti filtrati per tipologia --}}
                <section v-if="filter != ''" id="filtered_restaurants" class="animate__animated animate__fadeInUp">
                    <div class="mycontainer">

                        <h3 v-if='filteredRestaurants.length==0'>Ops! Nessun risultato...</h3>

                        <h3 v-else>Ecco cosa abbiamo trovato per te</h3>

                        <div class="filtered_restaurants_container">

                            <ul class="flex_wrap">
                                <li v-for="restaurant in filteredRestaurants">
                                    <div class="restaurant_card relative">
                                        <a :href="'/showRestaurant/' + restaurant.id">
                                            <img :src="'/storage/restaurantImages/' + restaurant.file_path"
                                                alt="immagine_ristorante">
                                            <h4 class="absolute">@{{ restaurant . nome_attivita }}</h4>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- fine sezione ristoranti filtrati per tipologia --}}

                </section>

                {{-- sezione ristoranti --}}
                <section id="restaurants">
                    <div class="mycontainer">

                        <h2>La nostra selezione di ristoranti</h2>

                        {{-- carousel ristoranti --}}
                        <div class="restaurants_carousel">
                            <div class="autoplay">

                            {{-- card tiplogia --}}
                            @foreach ($users as $user)

                                    <div class="restaurant_card relative">
                                        <a href="{{ route('show', $user->id) }}"
                                            title="Vai al menu di {{ $user->nome_attivita }}">
                                            <img src="{{ asset('/storage/restaurantImages/' . $user->file_path)}}"
                                                alt="immagine tiplogia">
                                            <h4 class="absolute">{{ $user->nome_attivita }}</h4>
                                        </a>
                                    </div>

                            @endforeach

                        </div>
                    </div>

                    {{-- fine section ristauranti --}}
                </section>
                {{-- fine #mainPage --}}
            </div>
        </main>
    </div>


@endsection
