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


        var xValues = ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Set', 'Ott', 'Nov', 'Dic'];
        var yValues = [9, 12, 25, 16, 9, 0, 0, 0, 0, 0, 0, 0];

        var barColors = ["red", "green", "blue", "orange", "brown", "magenta", "yellow", "purple", "pink", "cyan", "brown",
            "red"
        ];

        
        for (var i = 0; i < myUsers.length; i++) {
            let month = new Date(myUsers[i].created_at);
            let indexMonth = month.getMonth();
            for (var j = 0; j < yValues.length; j++) {

                //paragono il valore numerico del mese con l'indice dell'array yValues
                if (indexMonth == j) {
                    yValues[j]++
                }
            }
        }

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Ordini Mensili"
                }
            }
        });

    </script>
@endsection
