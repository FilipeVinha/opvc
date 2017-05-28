<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PrevCrime -OPVC</title>

    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href=/dist/css/opvc.css rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>

    <img src="/images/opvc-icon.png" align="middle" class="img-responsive center-block">
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="">
                <form class="form-horizontal form-label-left input_mask" action="{{ route('user.password.create') }}"
                      method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">
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
                    <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" class="form-control has-feedback-left" required="required"
                               placeholder="@lang('user.createUser_password')" name="password">
                        <span class="fa fa-key form-control-feedback left"
                              aria-hidden="true"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <input type="password" class="form-control has-feedback-left" required="required"
                               placeholder="@lang('user.createUser_password_confirmation')"
                               name="password_confirmation">
                        <span class="fa fa-key form-control-feedback left"
                              aria-hidden="true"></span>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <button type="button" class="btn btn-primary">Cancel</button>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success" id="send">@lang('user.user_confirm')</button>
                        </div>
                    </div>

                </form>
            </section>
        </div>

    </div>
</div>
</body>
</html>
