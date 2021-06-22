@extends('layouts.main-layout')
@section('content')


    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('createDish') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('storeDish') }}">

                            @csrf
                            @method('POST')

                            <div class="form-group row">
                                <label for="nome"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome Piatto') }}</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror"
                                        name="nome" value="{{ old('nome') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descrizione"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Ingredienti/descrizione') }}</label>

                                <div class="col-md-6">
                                    <input id="descrizione" type="text"
                                        class="form-control @error('descrizione') is-invalid @enderror" name="descrizione"
                                        value="{{ old('descrizione') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prezzo"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Prezzo') }}</label>

                                <div class="col-md-6">
                                    <input id="prezzo" type="integer"
                                        class="form-control @error('prezzo') is-invalid @enderror" name="prezzo"
                                        value="{{ old('prezzo') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="visibilita"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Visibile') }}</label>

                                <select id="visibilita" name="visibilita" required>
                                    <option value=1 selected>
                                        Si
                                    </option>
                                    <option value=0>
                                        No
                                    </option>
                                </select>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Carica') }}
                                    </button>
                                </div>
                            </div>

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
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div id="createDish">
        <div class="mycontainer">

            <h2>Aggiungi nuovo elemento al tuo menu</h2>

            {{-- create_container --}}
            <div class="create_container">

                {{-- form --}}
                <form method="POST" action="{{ route('storeDish') }}" class="flex_col align_cen">

                    @csrf
                    @method('POST')

                    <label for="nome">Nome</label>
                    <input id="nome" type="text" name="nome" value="{{ old('nome') }}"
                        placeholder="Inserisci qui il nome del nuovo elemento" required autofocus>

                    <label for="descrizione">Descrizione</label>
                    <input id="descrizione" type="text" name="descrizione" value="{{ old('descrizione') }}"
                        placeholder="Inserisci la descrizione" required>

                    <label for="ingredienti">Ingredienti</label>
                    <input id="ingredienti" type="text" name="ingredienti" value="{{ old('ingredienti') }}"
                        placeholder="Inserisci qui gli ingredienti" required>

                    <label for="">Prezzo</label>
                    <input id="prezzo" type="integer" name="prezzo" value="{{ old('prezzo') }}"
                        placeholder="Inserisci qui il prezzo" required>

                    <label for="visibilita">Desideri che sia subito visibile nel tuo Menu?</label>
                    <select id="visibilita" name="visibilita" required>
                        <option value=1 selected>Si</option>
                        <option value=0>No</option>
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
