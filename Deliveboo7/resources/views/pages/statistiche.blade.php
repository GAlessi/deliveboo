@extends('layouts.main-layout')

@section('content')

    <main>
        <input id="test" type="hidden" name="" value="{{ $user }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

        <div id="statistiche">
            <div class="mycontainer">
                <h2>Le statistiche dei tuoi ordini</h2>
                <div class="graph_container">

                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

                </div>
            </div>
        </div>

    </main>

    <script>
        let user = document.getElementById('test').value;
        let myUsers = JSON.parse(user);
        let idOrders = [];

        console.log(myUsers);
        var xValues = ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Set', 'Ott', 'Nov', 'Dic'];
        var yValues = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        var yValuesDishes = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        //var barColors = ["red", "green", "blue", "orange", "brown", "magenta", "yellow", "purple", "pink", "cyan", "brown",
        //     "red"
        // ];

        //estrazione del mese da created_at
        for (var i = 0; i < myUsers.length; i++) {

            let month = new Date(myUsers[i].created_at);
            let indexMonth = month.getMonth();

            for (var j = 0; j < yValues.length; j++) {

                //paragono il valore numerico del mese con l'indice dell'array yValues
                if (indexMonth == j && !idOrders.includes(myUsers[i].order_id)) {
                    idOrders.push(myUsers[i].order_id)
                    yValues[j]++
                };
            };

            for (let x = 0; x < yValuesDishes.length; x++) {
                if (indexMonth == x) {
                    yValuesDishes[x]++;
                } 
            }
        };

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [
                    {
                        label: 'Ordini',
                        backgroundColor: '#2a9d8f',
                        data: yValues
                    },
                    {
                        label: 'Piatti',
                        backgroundColor: '#f4a261',
                        data: yValuesDishes
                    },
                ],
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                    text: "Ordini Mensili"
                }
            }
        });
    </script>
@endsection
