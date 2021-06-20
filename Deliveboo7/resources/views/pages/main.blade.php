@extends('layouts.main-layout')

@section('content')

    <main>

        {{-- sezione jumbotron --}}
        <section id="myjumbotron">
            <div class="mycontainer relative flex_wrap">

                {{-- title --}}
                <div class="title">
                    <h1>Deliveboo!</h1>
                </div>

                

                {{-- <p id="jumbo_text">
                    I piatti che ami, a domicilio.
                </p>
                <img id="casa" src="{{ asset('/storage/images/casa.png') }}" alt="">
                <img class="animate__fadeInRight" id="boy-img" src="{{ asset('/storage/images/boy.png') }}">
                <input type="text" name="" placeholder='Cerca un ristorante'>
                <button type="button" name="button">cerca</button> --}}
            </div>
        </section>

        {{-- sezione tiplogie --}}
        <section id="ristoranti">
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
                                    <img src="{{ asset('/storage/images/copertina_jappo.jpg') }}" alt="immagine tiplogia">
                                    <h4 class="absolute">{{ $user->nome_attivita }}</h4>
                                </a>
                            </div>
                        @endforeach




                        {{-- <div class="type_card relative">
                            <img src="{{ asset('/storage/images/copertina_jappo.jpg') }}" alt="immagine tiplogia">
                            <h3 class="absolute">Tipologia</h3>
                        </div>
                        <div class="type_card relative">
                            <img src="{{ asset('/storage/images/copertina_jappo.jpg') }}" alt="immagine tiplogia">
                            <h3 class="absolute">Tipologia</h3>
                        </div>
                        <div class="type_card relative">
                            <img src="{{ asset('/storage/images/copertina_jappo.jpg') }}" alt="immagine tiplogia">
                            <h3 class="absolute">Tipologia</h3>
                        </div>
                        <div class="type_card relative">
                            <img src="{{ asset('/storage/images/copertina_jappo.jpg') }}" alt="immagine tiplogia">
                            <h3 class="absolute">Tipologia</h3>
                        </div>
                        <div class="type_card relative">
                            <img src="{{ asset('/storage/images/copertina_jappo.jpg') }}" alt="immagine tiplogia">
                            <h3 class="absolute">Tipologia</h3>
                        </div> --}}
                    </div>
                </div>
            </div>

            {{-- fine secrtion tipologie --}}
        </section>

        {{-- section ristoranti --}}
        {{-- <section id="ristoranti">
            <div class="lista_nascosta ">
                <ul>
                    @foreach ($users as $user)
                        <li>
                            {{ $user->nome_attivita }}
                        </li>
                    @endforeach

                </ul>
            </div>

        </section> --}}

    </main>


@endsection
