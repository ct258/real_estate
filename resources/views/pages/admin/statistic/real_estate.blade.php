

@extends('layouts.admin')

@section('content')
<style>
  .v-middle{
    padding-left: 25px;
  }
    
    .error {
        color: red;
    }
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
        color:#0000009e;
    
  }
</style>
<div class="container-fuild">
  <div class="row">
    <div class="col-sm-12">
      @if (Session::has('mess'))
      <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{Session::get('mess')}}</strong>
      </div>
      {{Session::put('mess',null)}}
    @endif
  </div>
</div>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thống kê nhà đất
    </div>
    <div class="row w3-res-tb">

      {{-- <canvas id="myChart1" width="170" height="100"></canvas> --}}
    
      {{-- <canvas id="myChart" width="170" height="100"></canvas> --}}
     

      <div class="col-md-6 chart_agile_left">
        <div class="chart_agile_top">
            <div class="chart_agile_bottom"> 
                <div id="graph10"></div>
                {{-- @foreach ($real as $reals) --}}
                     <script>  
                   
                    var week_data = [
                      // {"period": "2011 W27", "licensed": $reals->real_estate_price, "sorned": 660},
                      // {"period": "2011 W26", "licensed": $reals->real_estate_price, "sorned": 629},
                      {"period": "2011 W25", "licensed": 3269, "sorned": 618},
                      {"period": "2011 W24", "licensed": 3246, "sorned": 661},
                      {"period": "2011 W23", "licensed": 3257, "sorned": 667},
                      {"period": "2011 W22", "licensed": 3248, "sorned": 627},
                      {"period": "2011 W21", "licensed": 3171, "sorned": 660},
                      {"period": "2011 W20", "licensed": 3171, "sorned": 676},
                      {"period": "2011 W19", "licensed": 3201, "sorned": 656},
                      {"period": "2011 W18", "licensed": 3215, "sorned": 622},
                      {"period": "2011 W17", "licensed": 3148, "sorned": 632},
                      {"period": "2011 W16", "licensed": 3155, "sorned": 681},
                      {"period": "2011 W15", "licensed": 3190, "sorned": 667},
                      {"period": "2011 W14", "licensed": 3226, "sorned": 620},
                      {"period": "2011 W13", "licensed": 3245, "sorned": null},
                      {"period": "2011 W12", "licensed": 3289, "sorned": null},
                      {"period": "2011 W11", "licensed": 3263, "sorned": null},
                      {"period": "2011 W10", "licensed": 3189, "sorned": null},
                      {"period": "2011 W09", "licensed": 3079, "sorned": null},
                      {"period": "2011 W08", "licensed": 3085, "sorned": null},
                      {"period": "2011 W07", "licensed": 3055, "sorned": null},
                      {"period": "2011 W06", "licensed": 3063, "sorned": null},
                      {"period": "2011 W05", "licensed": 2943, "sorned": null},
                      {"period": "2011 W04", "licensed": 2806, "sorned": null},
                      {"period": "2011 W03", "licensed": 2674, "sorned": null},
                      {"period": "2011 W02", "licensed": 1702, "sorned": null},
                      {"period": "2011 W01", "licensed": 3900, "sorned": null}
                    ];
                    Morris.Line({
                      element: 'graph10',
                      data: week_data,
                      xkey: 'period',
                      ykeys: ['licensed', 'sorned'],
                      labels: ['Licensed', 'SORN'],
                      // events: [
                      //   '2011-04',
                      //   '2011-08'
                      // ]
                    });
                    </script>
  {{-- @endforeach  --}}
            </div>
        </div> 
    
    </div>
   

  

    
    
  </div>
  
</div>
@endsection
{{-- <script>  
                   
  var week_data = [
    // {"period": "2011 W27", "licensed": $reals->real_estate_price, "sorned": 660},
    // {"period": "2011 W26", "licensed": $reals->real_estate_price, "sorned": 629},
    {"period": "2011 W25", "licensed": 3269, "sorned": 618},
    {"period": "2011 W24", "licensed": 3246, "sorned": 661},
    {"period": "2011 W23", "licensed": 3257, "sorned": 667},
    {"period": "2011 W22", "licensed": 3248, "sorned": 627},
    {"period": "2011 W21", "licensed": 3171, "sorned": 660},
    {"period": "2011 W20", "licensed": 3171, "sorned": 676},
    {"period": "2011 W19", "licensed": 3201, "sorned": 656},
    {"period": "2011 W18", "licensed": 3215, "sorned": 622},
    {"period": "2011 W17", "licensed": 3148, "sorned": 632},
    {"period": "2011 W16", "licensed": 3155, "sorned": 681},
    {"period": "2011 W15", "licensed": 3190, "sorned": 667},
    {"period": "2011 W14", "licensed": 3226, "sorned": 620},
    {"period": "2011 W13", "licensed": 3245, "sorned": null},
    {"period": "2011 W12", "licensed": 3289, "sorned": null},
    {"period": "2011 W11", "licensed": 3263, "sorned": null},
    {"period": "2011 W10", "licensed": 3189, "sorned": null},
    {"period": "2011 W09", "licensed": 3079, "sorned": null},
    {"period": "2011 W08", "licensed": 3085, "sorned": null},
    {"period": "2011 W07", "licensed": 3055, "sorned": null},
    {"period": "2011 W06", "licensed": 3063, "sorned": null},
    {"period": "2011 W05", "licensed": 2943, "sorned": null},
    {"period": "2011 W04", "licensed": 2806, "sorned": null},
    {"period": "2011 W03", "licensed": 2674, "sorned": null},
    {"period": "2011 W02", "licensed": 1702, "sorned": null},
    {"period": "2011 W01", "licensed": 3900, "sorned": null}
  ];
  Morris.Line({
    element: 'graph10',
    data: week_data,
    xkey: 'period',
    ykeys: ['licensed', 'sorned'],
    labels: ['Licensed', 'SORN'],
    // events: [
    //   '2011-04',
    //   '2011-08'
    // ]
  });
  


  
  </script> --}}
  {{-- <script>
    var ctx = document.getElementById('myChart1').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 0, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [20, 10, 5, 2, 20, 30, 145]
        }]
    },

    // Configuration options go here
    options: {}
});
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Purple', 'Orange','buoi'],
        datasets: [{
            label: '# of Votes',
            data: [2, 10, 3, 5, 2, 3,1],
            backgroundColor: [
                'red',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
  </script> --}}