@extends('layouts.app')
@section('css')
@endsection
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_title">
                    <h2> @lang('statistics.stat_containerTitle')</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    @lang('statistics.stat_Graph1')
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    @foreach($stats as $stat)
                                        {!! $stat->category.": ".$stat->counter."</br>" !!}
                                    @endforeach
                                    <canvas id="canvasDoughnut"></canvas>

                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <script>
        $(document).ready(function () {
            var labels = [];
            @foreach($stats as $stat)
                labels.push("{{$stat->category}}");
                    @endforeach
            var data = [];

            @foreach($stats as $stat)
                data.push("{{$stat->counter}}");
                    @endforeach
            console.log(data);
            var f = document.getElementById("canvasDoughnut"), i = {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: ["#455C73", "#9B59B6", "#BDC3C7"],
                        hoverBackgroundColor: ["#34495E", "#B370CF", "#CFD4D8"]
                    }]
                };
            new Chart(f, {type: "doughnut", tooltipFillColor: "rgba(51, 51, 51, 0.55)", data: i})
        });
    </script>

@endsection