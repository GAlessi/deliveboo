@extends('layouts.main-layout')

@section('content')

  <main>
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

          {{-- form --}}
          <form class="flex_col align_cen" method="POST" action="{{ route('postRegistration') }}"
            enctype="multipart/form-data">
            @csrf

            {{-- nome --}}
            <label for="name">Nome</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror

            {{-- cognome --}}
            <label for="cognome">Cognome</label>
            <input id="cognome" type="text" name="cognome" required>

            {{-- email --}}
            <label for="email">Email</label>
            <input id="email" type="email" name=" email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror

            {{-- password --}}
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">

            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror

            {{-- conferma password --}}
            <label for="password-confirm">Conferma Password</label>
            <input id="password-confirm" type="password" name="password_confirmation" required
              autocomplete="new-password">

            {{-- nome attività --}}
            <label for="nome_attivita">Nome Attività</label>
            <input id="nome_attivita" type="text" name="nome_attivita" required>

            {{-- via --}}
            <label for="via">Via</label>
            <input id="via" type="text" name="via" required>

            {{-- civico --}}
            <label for="n_civico">Numero Civico</label>
            <input id="n_civico" type="integer" name="n_civico" required>

            {{-- città --}}
            <label for="citta">Città</label>
            <input id="citta" type="text" name="citta" required>

            {{-- cap --}}
            <label for="cap">C.A.P.</label>
            <input id="cap" type="text" name="cap" required>

            {{-- p iva --}}
            <label for="p_iva">Numero Partita IVA</label>
            <input id="p_iva" type="text" name="p_iva" required>

            {{-- checkbox tipologia --}}
            <label for="type_id[]">Seleziona una o più Tipologie di Cucina</label>
            <div class="checkbox_container">

              <ul class="flex_wrap">

                @foreach ($types as $type)
                  <li class="flex just_start align_cen">
                    <label class="control control-checkbox">
                      {{ $type->nome }}
                      <input id="types_id[]" name="types_id[]" type="checkbox" value="{{ $type->id }}" />
                      <div class="control_indicator"></div>
                    </label>
                  </li>
                @endforeach
              </ul>
            </div>

            {{-- Aggiunta immagini --}}
            <label for="file_path">Scegli un immagine per il tuo Ristorante</label>
            <input type="file" name="file" class="file" required>

            {{-- submit --}}
            <button type="submit">
              Registrati
            </button>

          </form>
        </div>
      </div>
    </div>
  </main>

@endsection
