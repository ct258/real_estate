<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="  https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
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
        Thống kê lợi nhuận

       </div> {{--<select name="" id="a1">
              <option value="">Theo tuần</option>
              <option value="">Theo tháng</option>
            </select> --}}
      <div class="row w3-res-tb">
          {{-- <div class="col-md-2"></div> --}}
        <div class="col-md-2">
        <form method="post" action="#" >
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="tuNgay">Từ ngày</label>
                    <input type="date" class="form-control"  min="2018-01-01"  id="tuNgay" name="tuNgay">
                </div>
                {{-- <input type="date" id="start" name="trip-start"
       value="2018-07-22"
       min="2018-01-01" max="2018-12-31"> --}}
                <div class="form-group">
                    <label for="denNgay">Đến ngày</label>
                <input type="date" class="form-control" value="{{$ngayhientai}}"  min="2018-01-01" id="denNgay" name="denNgay">
                </div>
                <button type="submit" class="btn btn-primary" id="btnLapBaoCao">Lập báo cáo</button>
            </form>
        </div>
        <div class="col-md-10"></div>

       {{-- @foreach ($realWeeks as $key => $value) --}}

        <div class="col-md-6 chart_agile_left">
 <canvas id="a" width="100" height="100"></canvas>
 <div class="panel-heading" style="	text-transform: capitalize;">
    Bảng thống kê lợi nhuận

   </div>



      </div>



    </div>
    {{-- <p id="name" style="opacity:0;">{{$a}}<p>
              <p id="value" style="opacity:0;">{{$b}}</p> --}}
              {{-- <p id="idngay" style="opacity:0;">{{$cotNgay}}<p>
                  <p id="idgiatringay" style="opacity:0;">{{$giaTriNgay}}</p> --}}
  {{-- {{dd( $cotNgay)}}; --}}


    </div>

  </div>
  @endsection
@push('script')
<script>
  numeral.register('locale', 'vi', {
        delimiters: {
            thousands: ',',
            decimal: '.'
        },
        abbreviations: {
            thousand: 'k',
            million: 'm',
            billion: 'b',
            trillion: 't'
        },
        ordinal: function(number) {
            return number === 1 ? 'một' : 'không';
        },
        currency: {
            symbol: 'vnđ'
        }
    });
    // Sử dụng locate vi (Việt nam)
    numeral.locale('vi');

    $(document).ready(function() {
        var objChart;
        var $a = document.getElementById("a").getContext("2d");

        $("#btnLapBaoCao").click(function(e) {
            e.preventDefault();
        // console.log($('#tuNgay').val());

            // console.log($('#tuNgay').val());
            // console.log($('#denNgay').val());
            $.ajax({
                url: '{{ route('statistic.profitAjax') }}',
                type: "GET",
                data: {
                    tuNgay: $('#tuNgay').val(),
                    denNgay: $('#denNgay').val(),
                },
                success: function(response) {

                        // console.log(response.phung);

                    var res = JSON.parse(response);
                    var myLabels = [];
                    var myData = [];
                    $(res).each(function() {
                        myLabels.push((this.ngayban));
                        myData.push(this.tien);
                    });
                    myData.push(0); // creates a '0' index on the graph
                    if (typeof $objChart !== "undefined") {
                        $objChart.destroy();
                    }
                    $objChart = new Chart($a, {
                        // The type of chart we want to create
                        type: "line",
                        data: {
                            labels: myLabels,
                            datasets: [{
                                data: myData,
                                borderColor: "red",
                                backgroundColor: "#9ad0f5",
                                borderWidth: 1
                            }]
                        },
                        // Configuration options go here
                        options: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: "Báo cáo lợi nhuận"
                            },
                            scales: {
                                xAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Ngày lợi nhuận'
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        callback: function(value) {
                                            return numeral(value).format('0,0 $')
                                        }
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Tổng lợi nhuận'
                                    }
                                }]
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(tooltipItem, data) {
                                        return numeral(tooltipItem.value).format('0,0 $')
                                    }
                                }
                            },
                            responsive: true,
                            maintainAspectRatio: true,
                    }
                    });
                }
            });
        });
    });
</script>



@endpush



