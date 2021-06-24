@extends('layouts.main-layout')

@section('content')

    <main>

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

                <div class="jumbotron_container flex align_cen">

                    {{-- filtro ricerca --}}
                    <div class="jumbotron_search flex_col align_cen">
                        <input @keyup.enter='searchRestaurant' v-model='searchText' type="text" type="text" placeholder="Cerca un ristorante"
                         type="text">


                        <label for="type_id[]">Seleziona una o più Tipologie di Cucina</label>

                        <div class="chekbox_container">

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

                        {{-- button --}}
                        <button @click='searchRestaurant'>Cerca!</button>
                    </div>

                    {{-- immagine --}}
                    <div class="picture relative">
                        <img class="jumbotron_casa absolute" src="{{ asset('/storage/images/casa.png') }}" alt="">
                        <img class="jumbotron_moto absolute animate__fadeInRight" id="boy-img"
                            src="{{ asset('/storage/images/boy.png') }}">
                    </div>
                </div>
            </div>
        </section>

        <section class="provvisorio">
            <ul v-if="filter != ''">
                <li v-for="restaurant in filteredRestaurants">
                    Name: @{{ restaurant . nome_attivita }}
                    <strong v-for="genre in restaurant.categories">
                        - @{{ genre . name }}
                    </strong>)
                </li>
                <li>NESSUN RISULTATO</li>
            </ul>
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
                                    <img src="{{ asset('/storage/images/copertina_jappo.jpg') }}"
                                        alt="immagine tiplogia">
                                    <h4 class="absolute">{{ $user->nome_attivita }}</h4>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    {{-- fine carousel --}}
                </div>
            </div>

            {{-- fine secrtion bestRestaurant --}}
        </section>

    </main>


@endsection
