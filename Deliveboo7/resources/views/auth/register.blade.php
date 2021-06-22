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

    <div id="register">
        <div class="mycontainer">

            <h2>Registrati</h2>
            <div class="register_container">
                {{-- <div class="card">
                    <div class="card-header">{{ __('Register') }}</div> --}}

                {{-- <div class="card-body"> --}}
                <form class="flex_col align_cen" method="POST" action="{{ route('postRegistration') }}">
                    @csrf

                    {{-- <div class="form-group row"> --}}
                    <label for="name">Nome</label>

                    {{-- <div class="col-md-6"> --}}
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name"
                        autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    {{-- </div> --}}
                    {{-- </div> --}}

                    {{-- <div class="form-group row"> --}}
                    <label for="email">Email</label>

                    {{-- <div class="col-md-6"> --}}
                    <input id="email" type="email" name=" email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    {{-- </div> --}}
                    {{-- </div> --}}

                    {{-- <div class="form-group row"> --}}
                    <label for="password" >Password</label>

                    {{-- <div class="col-md-6"> --}}
                    <input id="password" type="password" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    {{-- </div> --}}
                    {{-- </div> --}}

                    {{-- <div class="form-group row"> --}}
                        <label for="password-confirm">Conferma Password</label>

                        {{-- <div class="col-md-6"> --}}
                            <input id="password-confirm" type="password" name="password_confirmation"
                                required autocomplete="new-password">
                        {{-- </div> --}}
                    {{-- </div> --}}

                    {{-- <div class="form-group row"> --}}
                        <label for="nome_attivita"
                            >Nome Attività</label>

                        {{-- <div class="col-md-6"> --}}
                            <input id="nome_attivita" type="text" name="nome_attivita" required>
                        {{-- </div> --}}
                    {{-- </div> --}}

                    {{-- <div class="form-group row"> --}}
                        <label for="via">Via</label>

                        {{-- <div class="col-md-6"> --}}
                            <input id="via" type="text" name="via" required>
                        {{-- </div> --}}
                    {{-- </div> --}}

                    {{-- <div class="form-group row"> --}}
                        <label for="n_civico">Numero Civico</label>

                        {{-- <div class="col-md-6"> --}}
                            <input id="n_civico" type="integer" name="n_civico" required>
                        {{-- </div> --}}
                    {{-- </div> --}}

                    {{-- <div class="form-group row"> --}}
                        <label for="citta">Città</label>

                        {{-- <div class="col-md-6"> --}}
                            <input id="citta" type="text" name="citta" required>
                        {{-- </div> --}}
                    {{-- </div> --}}

                    {{-- <div class="form-group row"> --}}
                        <label for="cap">C.A.P.</label>

                        {{-- <div class="col-md-6"> --}}
                            <input id="cap" type="text" name="cap" required>
                        {{-- </div> --}}
                    {{-- </div> --}}

                    {{-- <div class="form-group row"> --}}
                        <label for="p_iva">Numero Partita IVA</label>

                        {{-- <div class="col-md-6"> --}}
                            <input id="p_iva" type="text" name="p_iva" required>
                        {{-- </div> --}}
                    {{-- </div> --}}

                    {{-- Checkbox --}}
                    {{-- <div class="form-group row">
                                          <div class="form-check">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" value="">Option 1
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" value="">Option 2
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" value="" disabled>Option 3
                                          </label>
                                      </div>
                                  </div> --}}


                    {{-- <div> --}}
                        <select id="types_id[]" name="types_id[]" required multiple>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">
                                    {{ $type->nome }}
                                </option>
                            @endforeach
                        </select>
                    {{-- </div> --}}


                    {{-- <div class="form-group row mb-0"> --}}
                        {{-- <div class="col-md-6 offset-md-4"> --}}
                            <button type="submit">
                                Registrati
                            </button>
                        {{-- </div> --}}
                    {{-- </div> --}}
                </form>
            </div>
        </div>
        {{-- </div>
                    </div>
                </div> --}}
    @endsection
