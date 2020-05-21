@extends('layouts.admin')

@section('content')
<style>
    .v-middle {
        padding-left: 25px;
    }

    .error {
        color: red;
    }

    .table>thead>tr>th,
    .table>tbody>tr>th,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>tbody>tr>td,
    .table>tfoot>tr>td {
        color: #0000009e;

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
                Thống kê giao dịch
            </div>
            <div class="row w3-res-tb">

                <canvas id="myChart"></canvas>


                <script>
                    var ctx = document.getElementById('myChart');
                    // And for a doughnut chart
                    var myDoughnutChart = new Chart(ctx, {
                        type: 'doughnut',
                        data:   {
                            datasets: [{
                                data: [80, 10, 10],
                                backgroundColor: [
                                    'green',
                                    'yellow',
                                    'red']
                            }],

                            // These labels appear in the legend and in the tooltips when hovering different arcs
                            labels: [
                                'Giao dịch thành công',
                                'Giao dịch đang thực hiện',
                                'Giao dịch thất bại'
                            ]
                        },
                        options: {
                            
                        }
                    });
           
                </script>
            </div>






        </div>

    </div>
    @endsection