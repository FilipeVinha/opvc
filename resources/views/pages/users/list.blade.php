@extends('layouts.app')
@section('css')
    <link href="/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
@endsection
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>@lang('user.users_title')


                    </h3>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> @lang('user.users_containerTitle')
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons"
                               class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>@lang('user.users_columnName')</th>
                                <th>@lang('user.users_columnUsername')</th>
                                <th>@lang('user.users_columnEmail')</th>
                                <th>@lang('user.users_columnAuthLevel')</th>
                                <th>@lang('user.users_columnState')</th>
                                <th>@lang('user.users_columnOptions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td><a href="/users/profile/{{$user->id}}">{{$user->name}}</a></td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->auth_level}}</td>
                                    <td>{!! $user->banned == 0 ? __('user.users_resultStateEnabled'): __('user.users_resultStateDisabled')!!}</td>

                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-default" type="button" data-placement="top"
                                                    data-toggle="tooltip" data-original-title="Edit"><i
                                                        class="fa fa-edit"></i></button>
                                            <button class="btn btn-sm btn-default" type="button" data-placement="top"
                                                    data-toggle="tooltip" data-original-title="Delete"><i
                                                        class="fa fa-eraser"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>


                    </div>
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


@endsection