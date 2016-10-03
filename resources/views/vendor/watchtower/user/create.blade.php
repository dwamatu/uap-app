@extends(config('watchtower.views.layouts.master'))

@section('content')

    <h1>Create New User</h1>
    <hr/>

    {!! Form::open( ['route' => 'watchtower.user.store', 'class' => 'form-horizontal']) !!}
    
    <div class="form-group {{ $errors->has('Firstname') ? 'has-error' : ''}}">
        {!! Form::label('Firstname', 'First Name: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('Firstname', null, ['class' => 'form-control']) !!}
        </div>
        {!! $errors->first('Firstname', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
    </div>
    <div class="form-group {{ $errors->has('Lastname') ? 'has-error' : ''}}">
        {!! Form::label('Lastname', 'Last Name: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('Lastname', null, ['class' => 'form-control']) !!}
        </div>
        {!! $errors->first('Lastname', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
    </div>

    <div class="form-group {{ $errors->has('Email') ? 'has-error' : ''}}">
        {!! Form::label('Email', 'Email Address: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('Email', null, ['class' => 'form-control']) !!}
        </div>
        {!! $errors->first('Email', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
    </div>

    <div class="form-group {{ $errors->has('Password') ? 'has-error' : ''}}">
        {!! Form::label('Password', 'Password: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-md-6">
            <input type="password" class="form-control" name="password">
            {!! $errors->first('Password', '<div class="text-danger">:message</div>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('Password_confirmation') ? 'has-error' : ''}}">
        {!! Form::label('Password_confirmation', 'Confirm Password: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-md-6">
            <input type="password" class="form-control" name="password_confirmation">
            {!! $errors->first('Password_confirmation', '<div class="text-danger">:message</div>') !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>    
    </div>
    
    {!! Form::close() !!}

@endsection