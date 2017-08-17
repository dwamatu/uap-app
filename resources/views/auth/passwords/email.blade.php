@extends('auth.master')
@section('auth-content')
    <div class="row">
        <div class="col-sm-6">

            <p class="login-box-msg">Reset Password</p>


        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}

            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">


                <input id="email" type="email" class="form-control" name="email"
                       value="{{ old('email') }}" placeholder="E-Mail Address">

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif

            </div>

            <div class="form-group">

                <button type="submit"
                        class="btn-block no-margin large btn-uap gradient-light-linear color green button">
                    <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                </button>
            </div>
        </form>
        </div>
        <div class="col-sm-6">
            <div class="logo" style="padding: 40px 25px 10px ">
                <span class="logosu"><a href="#"><img src="{{URL::asset('img/uap/uap.png')}}" alt="Uap logo"></a></span>
                <span class="logoso"><a href="#"><img src="{{URL::asset('img/uap/old.png')}}" alt="Old mutual logo"></a></span>
            </div>
        </div>

    </div>



@endsection