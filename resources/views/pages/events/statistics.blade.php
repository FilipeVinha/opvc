@extends('layouts.app')
@section('script')
    <script type="text/javascript">
        $(function() {



            var data = [
                { label: "IE",  data: 19.5, color: "#4572A7"},
                { label: "Safari",  data: 4.5, color: "#80699B"},
                { label: "Firefox",  data: 36.6, color: "#AA4643"},
                { label: "Opera",  data: 2.3, color: "#3D96AE"},
                { label: "Chrome",  data: 36.3, color: "#89A54E"},
                { label: "Other",  data: 0.8, color: "#3D96AE"}
            ];

            var data = [
                <?php
                foreach ($events as $event) {
                    echo "{";
                    echo 'label: "'.$event->occurrence->category->category.'",';
                    echo "data: 5";
                    echo "},";
                }
                ?>
            ];

            var plotObj = $.plot($("#flot-pie-chart"), data, {
                series: {
                    pie: {
                        show: true
                    }
                },
                legend: {
                    show: false
                }
            });

        });
    </script>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('statistics.stat_containerTitle')</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('statistics.stat_Graph1')
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="flot-chart">
                    <div class="flot-chart-content" id="flot-pie-chart" style="width:400px;height:300px"></div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
<!-- /.row -->
@endsection