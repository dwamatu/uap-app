
@extends('common.master')

@push('styles')
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/flag-icon.min.css') }}">
@endpush

@section('content')

    <div class="mainbar content">
        <div class="page-head">
            <h2 class="pull-left">

            </h2>

            <div class="bread-crumb pull-right">
                <a href="{{ URL::route('dashboard') }}"><i class="fa fa-home"></i> Home</a>
                <span class="divider">/</span>
                <a href="#">Employees</a>
                <span class="divider">/</span>
                <a class="bread-current" href="#"></a>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="matter">
            <div class="container">
                <div class="row tools-table">
                    <div class="col-xs-6 col-md-6">
                        <a class="btn btn-link no-left-padding" href="/inspectors"><i class="fa fa-angle-left"></i> Back
                            to Individual Inspectors List</a>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div id="individual-details-content" class="content-tabs">
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#details" data-toggle="tab">Inspector Details</a></li>

                                {{-- <li><a href="#farms" data-toggle="tab">Farms</a></li>


                                 <li><a href="#livestock" data-toggle="tab">Livestock</a></li>


                                 <li><a href="#insurance-cover" data-toggle="tab">Insurance Covers</a></li>--}}

                            </ul>

                            <div class="tab-content clearfix">
                                <div class="tab-pane active" id="details">
                                    <form role="form" method="POST" action="/inspector/individual/details/update">
                                        {!! csrf_field() !!}

                                        <input name="id" type="hidden" value="{!! $pageData['individualDetails']['id'] !!}">


                                        <div class="row tabs tools">
                                            <div class="col-md-12">
                                            @if (session()->has('individualEditFlag'))

                                            <a id="cancel" class="btn btn-link no-left-padding"
                                            href="/inspector/individual/edit/cancel/{!! $pageData['individualDetails']['id'] !!}">Cancel</a>

                                            @else

                                            <a id="edit-details" class="btn btn-default"
                                            href="/inspector/individual/edit/{!! $pageData['individualDetails']['id'] !!}">Edit</a>

                                            @endif
                                            </div>
                                        </div>

                                        @if (session()->has('success') || session()->has('fail'))

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="alert alert-{{ Session::has('success') ? 'success' : 'danger' }}">
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>

                                                        <p>{{ Session::has('success') ? Session::get('success') : Session::get('fail') }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif

                                        <div class="form-group row first">
                                            <label class="col-sm-4 form-control-label text-right">First Name</label>

                                            <div class="col-sm-6">
                                                @if (session()->has('individualEditFlag'))
                                                    <input name="first_name" type="text" class="form-control"
                                                           id="first_name"
                                                           value="{!! $pageData['individualDetails']['first_name'] !!}">
                                                @else
                                                    <p class="form-control-static">{!! $pageData['individualDetails']['first_name'] or "<span class='text-missing'>Employee name not set</span>" !!}</p>
                                                @endif

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
                                                @if (session()->has('individualEditFlag'))
                                                    <input name="last_name" type="text" class="form-control"
                                                           id="last_name"
                                                           value="{!! $pageData['individualDetails']['last_name'] !!}">
                                                @else
                                                    <p class="form-control-static">{!! $pageData['individualDetails']['last_name'] or "<span class='text-missing'>Staff ID not set</span>" !!}</p>
                                                @endif

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
                                                @if (session()->has('individualEditFlag'))
                                                    <input name="username" type="text" class="form-control"
                                                           id="username"
                                                           value="{!! $pageData['individualDetails']['username'] !!}">
                                                @else
                                                    <p class="form-control-static">{!! $pageData['individualDetails']['username'] or "<span class='text-missing'>Username not set</span>" !!}</p>
                                                @endif

                                                @if ($errors->has('username'))
                                                    <span class="help-block">
                        <strong class="text-danger">{{ $errors->first('username') }}</strong>
                      </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 form-control-label text-right">Email</label>

                                            <div class="col-sm-6">
                                                @if (session()->has('individualEditFlag'))
                                                    <input name="email" type="text" class="form-control"
                                                           id="email"
                                                           value="{!! $pageData['individualDetails']['email'] !!}">
                                                @else
                                                    <p class="form-control-static">{!! $pageData['individualDetails']['email'] or "<span class='text-missing'>Email name not set</span>" !!}</p>

                                                @endif

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                      </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-4 form-control-label text-right">Password
                                            </label>

                                            <div class="col-sm-6">
                                                @if (session()->has('individualEditFlag'))
                                                    <input name="password" type="text"
                                                           class="form-control" id="password"
                                                    >
                                                @else
                                                    <p class="form-control-static"> <span class='text-missing'>Password Hidden</span></p>

                                                @endif

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
                                                @if (session()->has('individualEditFlag'))
                                                    <input name="confirm_password" type="text"
                                                           class="form-control" id="confirm_password">
                                                @else
                                                    <p class="form-control-static"> <span class='text-missing'>Password Hidden</span></p>                                                @endif

                                                @if ($errors->has('confirm_password'))
                                                    <span class="help-block">
                        <strong class="text-danger">{{ $errors->first('confirm_password') }}</strong>
                      </span>
                                                @endif
                                            </div>
                                        </div>





                                        <div class="form-group row">
                                            <label class="col-sm-4 form-control-label text-right">Role</label>

                                            <div class="col-sm-6">
                                                @if (session()->has('individualEditFlag'))
                                                    <select id="role_id" name="role_id"
                                                            class="form-control"></select>
                                                @else
                                                    <p class="form-control-static">{!! $pageData['individualDetails']['role_id'] or "<span class='text-missing'>Role not set</span>" !!}</p>
                                                @endif

                                                @if ($errors->has('role_id'))
                                                    <span class="help-block">
                        <strong class="text-danger">{{ $errors->first('role_id') }}</strong>
                      </span>
                                                @endif
                                            </div>
                                        </div>

                                        @if (session()->has('individualEditFlag'))

                                            <div class="form-group row push-up-20">
                                                <div class="col-sm-6 col-sm-offset-4">
                                                    <button id="update-details" type="submit"
                                                            class="btn btn-primary btn-lg">Update Inspector
                                                    </button>
                                                </div>
                                            </div>

                                        @endif
                                    </form>
                                </div>

                                <div class="tab-pane" id="farms">
                                    <input name="farmer_id" type="hidden" value="">
                                    <p>Sorry, no farms are available for this customer at this moment.</p>
                                </div>

                                <div class="tab-pane" id="livestock">
                                    <p>Sorry, no livestock are available for this customer at this moment.</p>
                                </div>

                                <div class="tab-pane" id="insurance-cover">
                                    <p>Sorry, no covers are available for this customer at this moment.</p>
                                </div>
                            </div>
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
