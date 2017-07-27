@extends('layouts.app.blade.old.php')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('menus_geral.dashboard')</div>

                <div class="panel-body">
                    @lang('messages_geral.loginSuccess')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
