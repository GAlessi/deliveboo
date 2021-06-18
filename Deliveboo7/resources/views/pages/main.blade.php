@extends('layouts.main-layout')

@section('content')

    <main>
        {{-- sezione tiplogie --}}
        <section id="tipologie">
            <div class="mycontainer">

                <h2>La nostra selezione di cucine</h2>

                <div class="types_carousel">
                    <div class="autoplay">

                        {{-- card tiplogia --}}

                        @foreach ($users as $user)
                                <div class="type_card relative">
                                    <a href="{{ route('show', $user -> id )}}">
                                        <img src="{{ asset('/storage/images/copertina_jappo.jpg') }}" alt="immagine tiplogia">
                                        <h3 class="absolute">{{$user -> nome_attivita}}</h3>
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
        <section id="ristoranti">
            <div class="lista_nascosta ">
                <ul>
                    @foreach ($users as $user)
                        <li>
                            {{ $user -> nome_attivita }}
                        </li>
                    @endforeach

                </ul>
            </div>

        </section>

    </main>


@endsection
