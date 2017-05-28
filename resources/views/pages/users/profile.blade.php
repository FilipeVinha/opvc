@extends('layouts.app')
@section('css')
    <link href="/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
@endsection
@section('content')
    <div class="box box-default" role="main">
        <div class="">

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <h2>@lang('user.user_profile')
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <img class="profile-user-img img-responsive img-thumbnail" id="avatar"
                                         src="{{asset("storage/".$user->profile->photo)}}" alt="User profile picture">
                                </div>
                            </div>
                            <h3>{{$user->name}}</h3>

                            <ul class=" list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon"></i>
                                    <span id="profileAddress">  {!! isset($user->profile->address) ? $user->profile->address: __('user.user_setAddress') !!}</span>
                                    <span id="profileApostalcode">   {!! isset($user->profile->postalcode) ? ', '.$user->profile->postalcode:'' !!}</span>
                                </li>
                                <li><i class="fa fa-map-marker user-profile-icon"></i>
                                    <span id="profileCity"> {!! isset($user->profile->city) ? $user->profile->city: __('user.user_setCity') !!}</span>
                                </li>
                                <li>
                                    <i class="fa fa-mobile user-profile-icon"></i>
                                    <span id="profileContact"> {!! isset($user->profile->contact) ? $user->profile->contact: __('user.user_setContact') !!}</span>
                                </li>
                                <li>
                                    <i class="fa fa-envelope user-profile-icon"></i>
                                    {{$user->email}}
                                </li>
                            </ul>
                            <div class="x_content">
                                @if(Auth::user()->id == $user->id)
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target=".editProfile"><i class="fa fa-edit m-right-xs"></i>Edit
                                        Profile
                                    </button>
                                @endif
                                <div class="modal fade editProfile" tabindex="-1" role="dialog"
                                     aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form id="profile"
                                                  class="form-horizontal form-label-left"
                                                  enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                            data-dismiss="modal">
                                                    </button>
                                                    <h4 class="modal-title"
                                                        id="myModalLabel">@lang('user.editUser_containerTitle')</h4>
                                                </div>
                                                <div class="modal-body">


                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                               for="address">@lang('user.user_address')
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
                                                               for="postalcode">@lang('user.user_postalcode')

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
                                                               for="city">@lang('user.user_city')
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
                                                               for="contact">@lang('user.user_contact')
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="contact" name="contact"
                                                                   required="required"
                                                                   class="form-control col-md-7 col-xs-12"
                                                                   value="{!! isset($user->profile->postalcode) ? $user->profile->contact: '' !!}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                               for="lang">@lang('user.user_langt')
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <select class="form-control  col-md-7 col-xs-12" id="lang"
                                                                    name="lang">

                                                                @foreach (config('languages') as $lang => $language)
                                                                    <option value="{{$lang}}" {!! $lang == App::getLocale()? 'selected':'' !!}>{{$language}}</option>

                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                               for="lang">@lang('user.user_photo')
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="file" id="photo" name="photo"
                                                                   required="required"
                                                                   class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12 has-error-passowrd "
                                                               for="lang">@lang('user.createUser_password')
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12 has-error-passowrd ">
                                                            <input type="password"
                                                                   class="form-control has-feedback-left"
                                                                   required="required"
                                                                   placeholder="@lang('user.createUser_password')"
                                                                   name="password">


                                                            <span class="help-block">
                                                                    <strong id="error-password"></strong>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12 has-error-passowrd "
                                                               for="lang">@lang('user.createUser_password_confirmation')

                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12 has-error-passowrd  ">
                                                            <input type="password"
                                                                   class="form-control has-feedback-left"
                                                                   required="required"
                                                                   placeholder="@lang('user.createUser_password_confirmation')"
                                                                   name="password_confirmation">

                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button id="saveprofile" type="button"
                                                            class="btn btn-primary">
                                                        Save changes
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
            $('#saveprofile').click(function (e) {
                $("#profile").submit();
            });


            $('#profile').on('submit', (function (e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: "/user/profile",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.success) {
                            $('.modal').modal('hide');
                            $("#profileAddress").html(data.profile.address);
                            $("#profileCity").html(data.profile.city);
                            $("#profileApostalcode").html(data.profile.postalcode);
                            $("#profileContact").html(data.profile.contact);

                            $("#avatar").attr("src", "/storage/" + data.profile.photo);
                            $('.has-error-passowrd').removeClass('has-error');
                            $('#error-password').html('');
                        } else {
                            $('.has-error-passowrd').addClass('has-error');
                            $('#error-password').html(data.error.password[0]);
                        }
                    },
                    error: function (data) {
                    }
                });
            }));

            $('input[name="birthday"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            })

        });
    </script>


@endsection