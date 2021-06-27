@extends('layouts.main-layout')
@section('content')

    <div id="createDish">
        <div class="mycontainer">
            {{-- create_container --}}
            <div class="create_container">
                {{-- <span>{{$totalPrice}}</span> --}}
                {{-- <span>{{$carrello}}</span> --}}

                {{-- form --}}
                <form method="POST" action="{{ route('storeOrder', $carrello) }}" class="flex_col align_cen">

                    @csrf
                    @method('POST')
                    <input type="hidden" name="totalPrice" value="{{$totalPrice}}">
                    {{-- nome --}}
                    <label for="nome_cliente">Nome</label>
                    <input id="nome_cliente" type="text" name="nome_cliente" value="{{ old('nome_cliente') }}"
                        placeholder="Nome" required autofocus>

                    {{-- cognome --}}
                    <label for="cognome_cliente">Cognome</label>
                    <input id="cognome_cliente" type="text" name="cognome_cliente" value="{{ old('cognome_cliente') }}"
                        placeholder="Cognome" required>

                    {{-- via --}}
                    <label for="via">Via</label>
                    <input id="via" type="text" name="via" value="{{ old('via') }}"
                        placeholder="Via" required>

                    {{-- n_civico --}}
                    <label for="">Numero Civico</label>
                    <input id="n_civico" type="integer" name="n_civico" value="{{ old('n_civico') }}"
                        placeholder="Numero Civico" required>

                    {{-- citta --}}
                    <label for="citta">Città</label>
                    <input id="citta" type="text" name="citta" value="{{ old('citta') }}"
                        placeholder="Città" required>

                    {{-- cap --}}
                    <label for="cap">Cap</label>
                    <input id="cap" type="integer" name="cap" value="{{ old('cap') }}"
                        placeholder="Cap" required>

                    {{-- telefono --}}
                    <label for="telefono">Numero di telefono:</label>
                    <input type="tel" id="telefono" name="telefono" pattern="[0-9]{10}">

                    {{-- cap --}}
                    <label for="note">Note</label>
                    <input id="note" type="text" name="note" value="{{ old('note') }}"
                        placeholder="Note">

                    {{-- submit --}}
                    <button type="submit">
                        Salva il nuovo elemento
                    </button>

                    {{-- gestione errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </form>


                {{-- fine create_container --}}
            </div>
            {{-- fine mycontainer --}}
        </div>
        {{-- fine create_dish --}}
    </div>
@endsection
