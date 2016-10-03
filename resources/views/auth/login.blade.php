@extends('auth.master')

@section('auth-content')


                <div class="panel-heading">
                    <h3 class="panel-title text-center">UAP AFRICA LOGIN</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/auth/login">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control inset" name="email" value="{{ old('email') }}" placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control inset" name="password" placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                            </div>
                            {{--<div class="col-md-6">--}}
                                {{--<label class="pull-left"> Remember Me</label>--}}
                                {{--<div class="checkbox">--}}

                                         {{--<input type="checkbox" class="pull-right" name="remember">--}}

                                {{--</div>--}}
                            {{--</div>--}}


                        <div class="form-group">
                            <div class="col-md-6 forgot">
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>

@endsection
