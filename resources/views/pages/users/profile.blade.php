@extends('layouts.app')
@section('css')
    <link href="/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
@endsection
@section('content')
    @php
        $user =  Auth::user();
    @endphp
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>@lang('user.user_profile')</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>@lang('user.user_profile')
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                <div class="profile_img">
                                    <div id="crop-avatar">
                                        <!-- Current avatar -->
                                        <img class="img-responsive avatar-view" src="/images/user.png" alt="Avatar"
                                             title="Change the avatar">
                                    </div>
                                </div>
                                <h3>{{$user->name}}</h3>

                                <ul class="list-unstyled user_data">
                                    <li><i class="fa fa-map-marker user-profile-icon"></i>
                                        {!! isset($user->profile->address) ? $user->profile->address: __('user.user_setAddress') !!}
                                        {!! isset($user->profile->postalcode) ? ', '.$user->profile->postalcode:'' !!}
                                    </li>
                                    <li><i class="fa fa-map-marker user-profile-icon"></i>
                                        {!! isset($user->profile->city) ? $user->profile->city: __('user.user_setCity') !!}
                                    </li>
                                    <li>
                                        <i class="fa fa-mobile user-profile-icon"></i>
                                        {!! isset($user->profile->contact) ? $user->profile->contact: __('user.user_setContact') !!}
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope user-profile-icon"></i>
                                        {{$user->email}}
                                    </li>
                                </ul>
                                <div class="x_content">
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target=".editProfile"><i class="fa fa-edit m-right-xs"></i>Edit
                                        Profile
                                    </button>

                                    <div class="modal fade editProfile" tabindex="-1" role="dialog"
                                         aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form id="profile"
                                                      class="form-horizontal form-label-left"
                                                      id="profile" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span
                                                                    aria-hidden="true">×</span>
                                                        </button>
                                                        <h4 class="modal-title"
                                                            id="myModalLabel">@lang('user.editUser_containerTitle')</h4>
                                                    </div>
                                                    <div class="modal-body">


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                   for="address">@lang('user.user_address')<span
                                                                        class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" id="address" required="required"
                                                                       class="form-control col-md-7 col-xs-12"
                                                                       name="address"
                                                                       value="{!! isset($user->profile->address) ? $user->profile->address: '' !!}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                   for="postalcode">@lang('user.user_postalcode')<span
                                                                        class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" id="postalcode" name="postalcode"
                                                                       required="required"
                                                                       class="form-control col-md-7 col-xs-12"
                                                                       value="{!! isset($user->profile->postalcode) ? $user->profile->postalcode: '' !!}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                   for="city">@lang('user.user_city')<span
                                                                        class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" id="postalcode" name="city"
                                                                       required="required"
                                                                       class="form-control col-md-7 col-xs-12"
                                                                       value="{!! isset($user->profile->city) ? $user->profile->city: '' !!}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                   for="contact">@lang('user.user_contact')<span
                                                                        class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" id="contact" name="contact"
                                                                       required="required"
                                                                       class="form-control col-md-7 col-xs-12"
                                                                       value="{!! isset($user->profile->postalcode) ? $user->profile->contact: '' !!}">
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button id="saveprofile" type="button" class="btn btn-primary">
                                                            Save changes
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <section class="panel">
                                    <div class="x_title">
                                        <h2>@lang('occurrences.occurrence')
                                        </h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="clearfix"></div>
                                        <table id="datatable-buttons"
                                               class="table table-striped table-bordered dt-responsive nowrap"
                                               cellspacing="0"
                                               width="100%">
                                            <thead>
                                            <tr>

                                                <th>@lang('occurrences.events_columnAddress')</th>
                                                <th>@lang('occurrences.events_columnCategory')</th>
                                                <th>@lang('occurrences.events_columnOccurrence')</th>
                                                <th hidden>@lang('occurrences.events_columnLocal')</th>
                                                <th>@lang('occurrences.events_columnDateTime')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user->events as $event)
                                                <tr>
                                                    <td><a href="/events/details/{{$event->id}}">{{$event->address}}</a>
                                                    </td>
                                                    <td>{{$event->occurrence->category->category}}</td>
                                                    <td>{{$event->occurrence->occurrence}}</td>
                                                    <td hidden>{{$event->local->local}}</td>
                                                    <td>{{date("d/M/Y", strtotime($event->created_at))}}</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </section>


                                <section class="panel">
                                    <div class="x_title">
                                        <h2>@lang('occurrences.details_containerObs')
                                        </h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="clearfix"></div>
                                        <ul class="messages" id="messages">
                                            @foreach($user->reviews as $review)
                                                <li>
                                                    <div class="message_date">
                                                        <h3 class="date text-info">{{date("d", strtotime($review->created_at))}}</h3>
                                                        <p class="month">{{date("M", strtotime($review->created_at))}}</p>
                                                    </div>
                                                    <div class="message_wrapper" style="margin-left: 0 !important;">
                                                        <h4 class="heading"><a
                                                                    href="/events/details/{{$review->event->id}}">{{$review->event->address}}</a>
                                                        </h4>
                                                        <blockquote class="message">{!! $review->review !!}
                                                        </blockquote>
                                                        <br>
                                                    </div>
                                                    <p class="url">
                                                        <span class="fs1 text-info" aria-hidden="true"></span>
                                                        <a href="#"><i
                                                                    class="fa fa-bug"></i> {{$review->event->occurrence->occurrence }}
                                                        </a>
                                                    </p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </section>
                            </div>
                        </div>
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
    <script src="/vendors/moment/min/moment.min.js"></script>
    <script src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>

        $(document).ready(function () {
            $('#datatable-button').dataTable({
//                order: [2, 'DESC']
            });
        });

        $(function () {
            $('input[name="birthday"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            })
        });

        $(document).ready(function () {
            $('#saveprofile').click(function (e) {


                var data = $("#profile").serialize();
                $.ajax({
                    url: '/user/profile',
                    method: "POST",
                    dataType: 'json',
                    data: data,
//                    processData: false,
//                    contentType: false,
                    success: function (result) {
                        $('.modal').modal('hide');

                    },
                    error: function (er) {
                        res = $.parseJSON(er.responseText);

                    }
                });
            });
        });
    </script>



@endsection