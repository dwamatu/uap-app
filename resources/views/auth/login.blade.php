@extends('auth.master')

@section('auth-content')


    <div class="panel-heading">

        <h3 class="panel-title text-center">UAP Old Mutual LOGIN</h3>


    </div>
    <div class="panel-body">

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
            {{ csrf_field() }}
            <div class="form-group has-feedback {{$errors -> has ('email') ? 'has-error' : ''}}">
                <input type="email" class="form-control inset" placeholder="Email" id="email"
                       name="email"
                       value="{{old('email')}}">


            </div>
            @if ($errors->has('email'))
                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
            @endif
            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control inset" placeholder="Password"
                       id="password"
                       name="password"
                       value="{{old('password')}}">


            </div>
            @if ($errors->has('password'))
                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
            @endif
            <div class="row">

                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        Sign In
                    </button>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">

                </div>
                <a class="pull-right input-sm" href="{{ url('/password/reset') }}">I
                    forgot my password</a><br>

                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.social-auth-links -->


@endsection
