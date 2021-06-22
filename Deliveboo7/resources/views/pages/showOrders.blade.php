@extends('layouts.main-layout')

@section('content')

    <main>
        <div id="myrestaurant">

            <h2>Bentornato {{ $user->name }}</h2>
            @foreach ($user -> dishes as $dish)
                @foreach ($dish -> orders as $order)
                    {{$order->nome_cliente}}
                @endforeach
            @endforeach
        </div>
    </main>


@endsection
