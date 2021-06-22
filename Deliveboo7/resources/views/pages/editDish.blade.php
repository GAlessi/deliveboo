@extends('layouts.main-layout')
@section('content')

    <div id="createDish">
        <div class="mycontainer">

            <h2>Aggiungi nuovo elemento al tuo menu</h2>

            {{-- create_container --}}
            <div class="create_container">

                {{-- form --}}
                <form method="POST" action="{{ route('updateDish', $dish->id) }}" class="flex_col align_cen">

                    @csrf
                    @method('POST')

                    <label for="nome">Nome</label>
                    <input id="nome" type="text" name="nome" value="{{$dish -> nome}}"
                        required>

                    <label for="descrizione">Descrizione</label>
                    <input id="descrizione" type="text" name="descrizione" value="{{$dish -> descrizione}}"
                        required>

                    <label for="ingredienti">Ingredienti</label>
                    <input id="ingredienti" type="text" name="ingredienti" value="{{$dish -> ingredienti}}"
                        required>

                    <label for="">Prezzo</label>
                    <input id="prezzo" type="integer" name="prezzo" value="{{$dish -> prezzo}}"
                        required>

                    <label for="visibilita">Desideri che sia subito visibile nel tuo Menu?</label>
                    <select id="visibilita" name="visibilita" required>

                        <option value="1"

                                @if ($dish -> visibilita)
                                    selected
                                @endif

                        >Si</option>

                        <option value=0
                        >No</option>
                    </select>

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
