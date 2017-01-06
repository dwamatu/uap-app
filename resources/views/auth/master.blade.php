@extends('common.master-fullscreen')

@push('styles')



@section('login-content')




    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>UAP Old Mutual </b>PORTAL</a>
        </div>
        <div class="login-links">
            <a href="/" class="" title="Sign In">Home</a>
            <span style="color: #333; height: 5px; font-size: 11px; padding: 5px;"> | </span>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            {{--@include('flash')--}}

            @yield('auth-content')

        </div>
    </div>




@endsection