@extends('auth.master')
@section('auth-content')

    <div class="panel-heading">
        <h3 class="panel-title text-center">Reset Password</h3>
    </div>
    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                <div class="col-md-12">
                    <input id="email" type="email" class="form-control" name="email"
                           value="{{ old('email') }}" placeholder="E-Mail Address">

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12 ">
                    <button type="submit"
                            class="btn-block no-margin large btn-primary gradient-light-linear color green button">
                        <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection