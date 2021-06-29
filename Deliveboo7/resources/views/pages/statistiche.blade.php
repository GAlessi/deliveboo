@extends('layouts.main-layout')

@section('content')

<main>
    <input id="test" type="hidden" name="" value="{{$user}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

</main>

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
<script>


    let user = document.getElementById('test').value;
    let myUsers = JSON.parse(user);


    var xValues = ['Gen','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct', 'Nov', 'Dec'];
    var yValues = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

    var barColors = ["red", "green","blue","orange","brown", "magenta", "yellow", "purple", "pink", "cyan", "brown", "red"];

    //estrazione del mese da created_at
    for (var i = 0; i < myUsers.length; i++) {
        // let created_at_array = myUsers[i].created_at;
        let month = new Date(myUsers[i].created_at);
        let indexMonth =  month.getMonth();
        for (var j = 0; j < yValues.length; j++) {

            if(indexMonth == j){
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
            legend: {display: false},
            title: {
                display: true,
                text: "Orders per Month"
            }
        }
    });

</script>
@endsection
