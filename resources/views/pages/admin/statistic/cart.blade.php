<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    .row.w3-res-tb {

    justify-content: center;
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
        Thống kê khu vực bán chạy

       </div> {{--<select name="" id="a1">
              <option value="">Theo tuần</option>
              <option value="">Theo tháng</option>
            </select> --}}
      <div class="row w3-res-tb">


       {{-- @foreach ($realWeeks as $key => $value) --}}

        <div class="col-md-6 chart_agile_left">
 <canvas id="myChart" width="100" height="100"></canvas>
 <div class="panel-heading" style="	text-transform: capitalize;">
    Bảng thống kê khu vực bán chạy

   </div>



      </div>



    </div>
    <p id="name" style="opacity:0;">{{$a}}<p>
              <p id="value" style="opacity:0;">{{$b}}</p>
              {{-- <p id="idngay" style="opacity:0;">{{$cotNgay}}<p>
                  <p id="idgiatringay" style="opacity:0;">{{$giaTriNgay}}</p> --}}
  {{-- {{dd( $cotNgay)}}; --}}


    </div>

  </div>
  <script>
// cot x
      var e = document.getElementById('name');
      var tachthe =e.innerHTML;

      var a = tachthe.split(",");
      console.log(e);
      console.log(tachthe);

      console.log(a);
//cot y:
var e1 = document.getElementById('value');
      var tachthe1 =e1.innerHTML;
      var cat= tachthe1.slice(1, tachthe1.length-1);
      var a1 = cat.split(",");
      console.log(e1);
      console.log(tachthe1);

      console.log(a1);




    var ctx = document.getElementById('myChart').getContext('2d');

    const myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: a,
            datasets: [{
                label: 'Thống kê khu vực bán chạy ',
                data: a1,
                backgroundColor: [
                    '#55efc4',
                    '#ffeaa7',
                    '#74b9ff',
                    '#ff7675',
                    '#81ecec',
                    '#636e72',
                    '#dfe6e9',
                    '#0984e3',
                    '#fab1a0'
                ],
                borderColor: [
                    '#55efc4',
                    '#ffeaa7',
                    '#74b9ff',
                    '#ff7675',
                    '#81ecec',
                    '#636e72',
                    '#dfe6e9',
                    '#0984e3',
                    '#fab1a0'
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

  // getData();
  //   async function getData(){
  //     const x = $cottuan1;
  //     cotx.push(x);
  //     console.log(x,cotx);
  //   }
    </script>





  @endsection
