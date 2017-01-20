@extends('auth.master')

@section('auth-content')


    <div class="row">
        <div class="col-sm-6">

            <p class="login-box-msg">Sign in to start your session</p>


            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
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
                           name="password" autocomplete="off"
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
        <div class="col-sm-6">
            <div class="logo" style="padding: 60px 25px 10px ">
            <span class="logosu"><a href="#"><img src="{{URL::asset('img/uap/uap.png')}}" alt="Uap logo"></a></span>
            <span class="logoso"><a href="#"><img src="{{URL::asset('img/uap/old.png')}}" alt="Old mutual logo"></a></span>
            </div>
        </div>
    </div>

@endsection
