@extends('layouts.app')
@section('css')
    <link href="/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
@endsection
@section('content')
    <!-- page content -->
    <div class="box box-default" role="main">




            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h2> @lang('occurrences.events_containerTitle')
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">
                        <table id="listEvents"
                               class="table table-striped table-bordered dt-responsive nowrap table-hover"  cellspacing="0"
                               width="100%">
                            <thead>
                            <tr border="0">
                                <th></th>
                                <th>
                                    <select id="categories" class="form-control" required=""
                                            style="min-width: 100% !important;">
                                        <option value=" ">Select a @lang('occurrences.events_columnCategory')</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->category}}">{{$category->category}}</option>
                                        @endforeach

                                    </select>
                                </th>
                                <th>
                                    <select id="occurrences" class="form-control" required=""
                                            style="min-width: 100% !important;">
                                        <option value=" ">Select a @lang('occurrences.events_columnOccurrence')</option>
                                        @foreach($occurrences as $occurrence)
                                            <option value="{{$occurrence->occurrence}}">{{$occurrence->occurrence}}</option>
                                        @endforeach

                                    </select>
                                </th>
                                <th hidden></th>
                                <th></th>
                            </tr>
                            <tr>

                                <th>@lang('occurrences.events_columnAddress')</th>
                                <th>@lang('occurrences.events_columnCategory')</th>
                                <th>@lang('occurrences.events_columnOccurrence')</th>
                                <th hidden>@lang('occurrences.events_columnLocal')</th>
                                <th>@lang('occurrences.events_columnDateTime')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $event)
                                <tr>

                                    <td><a href="/events/details/{{$event->id}}">{{$event->address}}</a></td>
                                    <td>{{$event->occurrence->category->category}}</td>
                                    <td>{{$event->occurrence->occurrence}}</td>
                                    <td hidden>{{$event->local->local}}</td>
                                    <td>{{$event->created_at}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
    </div>
@endsection
@section('script')
    <!-- Datatables -->
    <script src="/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>

    <script>
        $(document).ready(function () {
            $('#listEvents').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            var table = $('#listEvents').DataTable();
            $("#categories").change(function () {
                var category = $("#categories option:selected").val();
                table.columns(1).search(category).draw();
            });
            $("#occurrences").change(function () {
                var occurrence = $("#occurrences option:selected").val();
                table.columns(2).search(occurrence).draw();
            });
        });
    </script>
@endsection