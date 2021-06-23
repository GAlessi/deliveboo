@extends('layouts.main-layout')

@section('content')

    <main>
        <div id="myrestaurant">

            <h2>Bentornato {{ $user->name }}</h2>


            @foreach ($restaurantOrders as $restaurantOrder)
                <h3>{{$restaurantOrder->nome_cliente}}</h3>
                <h3>{{$restaurantOrder->cognome_cliente}}</h3>
            @endforeach
            
        </div>
    </main>


@endsection
