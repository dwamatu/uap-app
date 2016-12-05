@extends('auth.master')

@section('auth-content')

    <div class="panel-heading">Reset Password</div>

    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset/old') }}">
            {{ csrf_field() }}



            <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">

                <input id="old_password" type="password" class="form-control" name="old_password"
                       value="{{ $old_password or old('old_password') }}" placeholder="Old Password">

                @if ($errors->has('old_password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                @endif
            </div>


            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                <input id="password" type="password" class="form-control" name="password"
                       placeholder="Password">

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>


            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                <input id="password-confirm" type="password" class="form-control"
                       name="password_confirmation" placeholder="Confirm Password">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                @endif
            </div>


            <div class="form-group">

                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fa fa-btn fa-refresh"></i> Reset Password
                </button>
            </div>

        </form>
    </div>

@endsection