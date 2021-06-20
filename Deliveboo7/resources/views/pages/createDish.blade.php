@extends('layouts.main-layout')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('createDish') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('storeDish') }}">

                            @csrf
                            @method('POST')

                            <div class="form-group row">
                                <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome Piatto') }}</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descrizione" class="col-md-4 col-form-label text-md-right">{{ __('Ingredienti/descrizione') }}</label>

                                <div class="col-md-6">
                                    <input id="descrizione" type="text" class="form-control @error('descrizione') is-invalid @enderror" name="descrizione" value="{{ old('descrizione') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prezzo" class="col-md-4 col-form-label text-md-right">{{ __('Prezzo') }}</label>

                                <div class="col-md-6">
                                    <input id="prezzo" type="integer" class="form-control @error('prezzo') is-invalid @enderror" name="prezzo" value="{{ old('prezzo') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="visibilita" class="col-md-4 col-form-label text-md-right">{{ __('Visibile') }}</label>

                                <select id="visibilita" name="visibilita" required>
                                    <option value=1 selected>
                                        Si
                                    </option>
                                    <option value=0 >
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
    </div>
@endsection
