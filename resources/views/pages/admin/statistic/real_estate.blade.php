<head>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js" ></script>
    {{-- <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
  #a1{
    margin-bottom: -47px; */
    position: absolute!important;
    /* top: 1px; */
    bottom: 114px;
    z-index: 20;
    left: 335px;
    height: 31px;
    border: 2px solid #b0b0b0;
    background-color: #8b5c4b;
    color: white;
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

     </div> {{--<select name="" id="a1">
            <option value="">Theo tuần</option>
            <option value="">Theo tháng</option>
          </select> --}}
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
  <p id="id_cua_toi" style="opacity:0;">{{$cottuan1}}<p>
            <p id="giatri_cua_toi" style="opacity:0;">{{$cotgiatri1}}</p>
            <p id="idngay" style="opacity:0;">{{$cotNgay}}<p>
                <p id="idgiatringay" style="opacity:0;">{{$giaTriNgay}}</p>
{{-- {{dd( $cotNgay)}}; --}}


  </div>

</div>
<script>
    var element = document.getElementById('id_cua_toi');
    var tachthe =element.innerHTML;
    var cat= tachthe.slice(1, tachthe.length-1);
// Number(aa);
    var a = cat.split(",");
    console.log( a);
    // var a1= parseInt(a);
    // aa.unshift("a");
    // console.log(element);
    // var a1 =aa.join();
    // var c = tachthe;

    a.forEach(myFunction)

    function myFunction(item, index, arr) {
      arr[index] = 'Tuần '+item + ' trong năm 2020'  ;
    }
    console.log(a);
    console.log(element);
    console.log(tachthe);
    console.log( cat);
    console.log( a);
    // console.log(a1);
    //cot y
    var element1 = document.getElementById('giatri_cua_toi');
    var tachthe1 =element1.innerHTML;
    var cat1= tachthe1.slice(1, tachthe1.length-1);
// Number(aa);
    var a1 = cat1.split(",");



//timngay:
var e = document.getElementById('idngay');
    var e1 =e.innerHTML;
    var e2= e1.slice(1, e1.length-1);
// Number(aa);
    var e3 = e2.split(",");
// $('#idngay').datepicker({
//     format: '{{ config('app.date_format_js') }}'
// });
//timgiatringay:
var v = document.getElementById('idgiatringay');
    var v1 =v.innerHTML;
    var v2= v1.slice(1, v1.length-1);
// Number(aa);
    var v3 = v2.split(",");

    // console.log(element1);
    // console.log(tachthe1);
    // console.log(cat1);
    // console.log(a1);
  var ctx = document.getElementById('myChart').getContext('2d');
//   var c = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
//   var data1 = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
//   data1.push(c);
//   var cotx = new Array();

    // var a= $cottuan1;
    // console.log(a);
//   cotx.push(aa);

//   document.getElementById("myChart").innerHTML = aa;
//   const coty = [];
//   mycottuan1 = JSON.stringify(cottuan1);
// console.log(cotx);

// console.log(mycottuan1);
//   const x = $cottuan1;
//   cotx.push(x);
//   console.log(x);
  const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: a,
          datasets: [{
              label: 'Thống kê số lượng nhà đất được đăng theo tuần ',
              data: a1,
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
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
          labels: e3,
          datasets: [{
              label: 'Thống kê số lượng nhà đất được đăng theo ngày ',
              backgroundColor: 'rgb(255, 0, 132)',
              borderColor: 'rgb(25, 99, 132)',
              data: v3
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
