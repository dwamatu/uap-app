@extends('common.master')

@push('styles')
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-select.min.css') }}">
@endpush

@section('content')

<div class="mainbar content">
    <div class="page-head">
        <h2 class="pull-left">
            {{ $pageData['title'] or '' }}
        </h2>

        <div class="bread-crumb pull-right">
            <a href="{{ URL::route('dashboard') }}"><i class="fa fa-home"></i> Home</a>
            <span class="divider">/</span>
            <a href="{{ URL::route('inspectors') }}">Inspectors</a>
            <span class="divider">/</span>
            <a class="bread-current" href="#">{{ $pageData['title'] or '' }}</a>
        </div>

        <div class="clearfix"></div>
    </div>

    <div class="matter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="aggregator-create-content">
                        <form class="creation-form" role="form" method="POST" action="{{ url('/inspector/create') }}">
                            {!! csrf_field() !!}

                            <div class="row form tools">
                                <div class="col-md-12">
                                    <a id="cancel" class="btn btn-default" href="{{ url('/inspectors') }}">Cancel</a>
                                </div>
                            </div>

                            @if (session()->has('success'))

                            <div class="row push-down-20">
                                <div class="col-md-12">
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                        <p>{{ Session::get('success') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 text-center">
                                    <div>
                                        <p><a class="btn btn-default btn-lg" href="{{ url('inspector/details') . '/' . Session::get('id') }}">View Inspector</a></p>
                                    </div>
                                </div>
                            </div>

                            @else

                            @if (session()->has('fail'))

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                        <p>{{ Session::get('fail') }}</p>
                                    </div>
                                </div>
                            </div>

                            @endif

                            <div class="form-group row first">
                                <label class="col-sm-4 form-control-label text-right">First Name</label>

                                <div class="col-sm-6">
                                    <input name="first_name" type="text" class="form-control" id="first_name" value="{{ old('first_name') }}">

                                    @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 form-control-label text-right">Last Name</label>

                                <div class="col-sm-6">
                                    <input name="last_name" type="text" class="form-control" id="last_name" value="{{ old('last_name') }}">

                                    @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 form-control-label text-right">Username</label>

                                <div class="col-sm-6">
                                    <input name="username" type="text" class="form-control" id="username" value="{{ old('username') }}">

                                    @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 form-control-label text-right">E-Mail Address</label>

                                <div class="col-sm-6">
                                    <input name="email" type="email" class="form-control" id="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                                <div class="form-group row">
                                    <label class="col-sm-4 form-control-label text-right">Password</label>

                                    <div class="col-sm-6">
                                        <input name="password" type="password" class="form-control" id="password" value="{{ old('password') }}">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 form-control-label text-right">Confirm Password</label>

                                    <div class="col-sm-6">
                                        <input name="confirm_password" type="password" class="form-control" id="confirm_password" value="{{ old('confirm_password') }}">

                                        @if ($errors->has('confirm_password'))
                                            <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                            <div class="form-group row push-up-20">
                                <div class="col-sm-6 col-sm-offset-4">
                                    <button id="save-details" type="submit" class="btn btn-primary btn-lg">Save Inspector</button>
                                </div>
                            </div>
                        </form>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>


@endsection

@push('scripts')


<script src="{{ URL::asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ URL::asset('js/roles_field.js') }}"></script>

@endpush
