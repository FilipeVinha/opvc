@extends('layouts.app')
@section('script')
    <script type="text/javascript">
        $(function() {

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
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>@lang('statistics.stat_Graph1')</h3>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> @lang('statistics.stat_Graph1')</h2>
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
                                    <div class="flot-chart">
                                        <div class="flot-chart-content" id="flot-pie-chart" style="width:400px;height:300px"></div>
                                    </div>
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
</div>

<!-- /.row -->
@endsection