@extends('layouts.app')
@section('css')
@endsection
@section('content')
    <!-- page content -->
    <div class="box box-default" role="main">


        <div class="clearfix"></div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h2> @lang('statistics.stat_containerTitle')</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="box-body">
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
    <script>
        $(document).ready(function () {

        });
    </script>

@endsection