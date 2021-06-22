@extends('layouts.main-layout')

@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Register') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('postRegistration') }}">
              @csrf

              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right mt-5">{{ __('Name') }}</label>

                <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror mt-5" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                  <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                      <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>
                    </div>

                    <div class="form-group row " >
                      <label for="nome_attivita" class="col-md-4 col-form-label text-md-right ">{{ ('Nome Attività') }}</label>

                      <div class="col-md-6">
                        <input id="nome_attivita" type="text" class="form-control" name="nome_attivita" required >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="via" class="col-md-4 col-form-label text-md-right">{{ ('Via') }}</label>

                      <div class="col-md-6">
                        <input id="via" type="text" class="form-control" name="via" required >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="n_civico" class="col-md-4 col-form-label text-md-right">{{ __('N.Civico') }}</label>

                      <div class="col-md-6">
                        <input id="n_civico" type="integer" class="form-control" name="n_civico" required >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="citta" class="col-md-4 col-form-label text-md-right">{{ ('Città') }}</label>

                      <div class="col-md-6">
                        <input id="citta" type="text" class="form-control" name="citta" required >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="cap" class="col-md-4 col-form-label text-md-right">{{ ('Cap') }}</label>

                      <div class="col-md-6">
                        <input id="cap" type="text" class="form-control" name="cap" required >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="p_iva" class="col-md-4 col-form-label text-md-right">{{ __('P.Iva') }}</label>

                      <div class="col-md-6">
                        <input id="p_iva" type="text" class="form-control" name="p_iva" required >
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="form-check">
                        <label class="form-check-label">
                          @foreach ($types as $type)
                            <input id="types_id[]" name="types_id[]" type="checkbox" class="form-check-input" value="{{ $type -> id }}"> {{ $type -> nome }}
                          @endforeach
                        </label>
                      </div>
                    </div>

                    <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                          {{ __('Register') }}
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endsection
