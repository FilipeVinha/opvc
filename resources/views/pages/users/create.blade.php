@extends('layouts.app')
@section('css')
@endsection
@section('content')
    <!-- page content -->
    <div class="box box-default" role="main">
        <div class="">

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <h2>@lang('user.createUser_containerTitle')
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal form-label-left input_mask" action="/users/create"
                              method="post">
                            {{ csrf_field() }}
                            <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                                <input type="text" class="form-control has-feedback-left" id="inputSuccess2"
                                       placeholder="@lang('user.createUser_name')" required="required" name="name"
                                       value="{{ old('name') }}">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class="form-control has-feedback-left" required="required"
                                       placeholder="@lang('user.createUser_email')" name="email"
                                       value="{{ old('email') }}">
                                <span class="fa fa-envelope form-control-feedback left"
                                      aria-hidden="true"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback {{ $errors->has('email_confirmation') ? ' has-error' : '' }}">
                                <input type="email" class="form-control has-feedback-left" required="required"
                                       placeholder="@lang('user.createUser_email_confirmation')"
                                       name="email_confirmation"
                                       value="{{ old('email_confirmation') }}">
                                <span class="fa fa-envelope form-control-feedback left"
                                      aria-hidden="true"></span>
                                @if ($errors->has('email_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <button type="button" class="btn btn-primary">Cancel</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success" id="send">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection