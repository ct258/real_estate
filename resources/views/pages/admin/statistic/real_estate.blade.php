<head>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js" ></script>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
</head>
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

     
     {{-- @foreach ($realWeeks as $key => $value) --}}

      <div class="col-md-6 chart_agile_left">
        <div class="chart_agile_top">
            <div class="chart_agile_bottom"> 
                   <canvas id="myChart" width="100" height="100"></canvas>

                {{-- {{dd($cotgiatri1)}} --}}
    {{-- @endforeach --}}
     {{-- {{dd($key)}}  --}}
            </div>
        </div> 
  
    </div>
   
    <div class="col-md-6 chart_agile_left">
      <div class="chart_agile_top">
          <div class="chart_agile_bottom"> 
            <canvas id="myChart1" width="100" height="100"></canvas>
          </div>
      </div> 
  
  </div>

 
    
    
  </div>
  
</div>
<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  // var data1 = [];
  // data1.push($cottuan1)
  const cotx = [];
  const coty = [];
  const x = $cottuan1;
  cotx.push(x);
  console.log(x);
  const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: cotx,
          datasets: [{
              label: '# of Votes',
              data: [1,2,23,3],
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
  var ctx = document.getElementById('myChart1').getContext('2d');
  var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',
  
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
// getData();
//   async function getData(){
//     const x = $cottuan1; 
//     cotx.push(x);
//     console.log(x,cotx);
//   }
  </script>
@endsection