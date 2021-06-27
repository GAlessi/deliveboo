@extends('layouts.main-layout')

@section('content')

    <main>

        @if ($editableOrder->status ==="accettato")
            <h2>
                Grazie {{$editableOrder->nome_cliente}}, il pagamento di {{$amount}}€ è avvenuto con successo! Il tuo ordine verrà elaborato immediatamente
            </h2>
        @else
            <h2>
                Ooops, sembra che qualcosa sia andato storto con il tuo pagamento
            </h2>

        @endif
        <a href="{{ route('main') }}">torna alla home</a>
    </main>


@endsection
