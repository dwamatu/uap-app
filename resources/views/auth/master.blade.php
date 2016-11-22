@extends('common.master')
@push('styles')

<style type="text/css">

    html,body{
        height:100%;
    }

    .container-fluid {
        height:100%;
    }

    .fullscreen {
        background: #f0f2f5 /* url('{{ URL::asset('img/bg.jpg') }}')*/   no-repeat 0 0;
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        overflow: auto;
    }

    .info {
        background-color: #00575A;
        height:100%;
        width:21%;
        float: left;
        color: #FFF9E6;
        min-height: 100%;
        position: relative;
        /* equal to footer height */
        margin-bottom: -142px;
    }

    .logo {
        background:rgba(255,255,255, 1);
        height: 65px;
        margin: 0;
        padding: 0;
        width: 100%;
    }

    .info .logo h1 {
        background: transparent /* url('{{ URL::asset('img/bg.jpg') }}')*/ no-repeat scroll 21px 50%;
        background-size: auto 35px;
        height: 65px;
        margin: 0;
        padding: 0;
        opacity: 0.9;
    }

    .info .logo h1.text-hide {
        background-color: transparent;
        border: 0 none;
        color: transparent;
        font: 0px/0 a;
        text-shadow: none;
    }

    .info-content {
        padding: 0 25px 0 21px;
        position: absolute;
        top: 95px;
        font-weight: 300;
    }

    .info-title {
        color: #FFF9E6;
        font-size: 2.5em;
        font-weight: 100;
        margin-bottom: 1em;
    }

    .sub-title {
        color: #FFF9E6;
        font-size: 1.6em;
        font-weight: 300;
        margin-bottom: 1em;
    }

    .info-content p {
        margin-bottom: 1em;
        font-size: 1.05em;
    }

    .footer {
        background-color: transparent;
        bottom: 0;
        height: 10%;
        position: absolute;
        width: 100%;

    }

    .footer-content {
        padding: 0 25px 0 25px;
        font-size: 0.9em;
    }

    .rights {
        height: 50%;
        color: #FFF9E6;
    }
    .partner {
        height: 50%;
        color: #FFEFBA;
    }

    .login {
        position: relative;
        height:100%;
        float: right;
        width:79%;
    }

    .login-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 30%;
        color: #fff;
        background-color: transparent;
    }

    .login-form {
        border: 3px solid #667687;
    }

    .panel-default {
        border: 0;
    }

    .login-content .panel-heading {
        background-color: #a60e33;
        border: 2px solid #667687;
        /*border: 2px solid #FBECD4;*/
        border-bottom: 0 none;
        color: #ffffff;
        padding: 8px 15px 8px;
        border-radius: 10px 10px 0 0;
    }

    .login-content .panel-title {
        font-weight: 500;
        letter-spacing: .5px;
        color: #FFFFFF;
    }

    .login-content .panel-body {
        background-color: #f4f1ec;
        border: 2px solid #FBECD4;
        border-top: 0 none;
        border-radius: 0 0 10px 10px;
        padding: 32px 28px 8px;
        -webkit-box-shadow: inset 1px 1px 2px 0 #707070;
        -moz-box-shadow: inset 1px 1px 2px 0 #707070;
        box-shadow: inset 1px 1px 2px 0 #707070;
    }

    .info h1 {
        font-size: 2.4em;
        margin-top: 1.4em;
        margin-bottom: 1em;
        letter-spacing: -0.03em;
        color: #fff;
    }

    .button{
        display: inline-block;
        *display: inline;
        zoom: 1;
        padding: 6px 20px;
        margin: 0;
        cursor: pointer;
        border: 1px solid #bbb;
        overflow: visible;
        font: 500 13px "Roboto",sans-serif;
        text-decoration: none;
        white-space: nowrap;
        color: #555;
        background-color: #ddd;
        background-image: linear-gradient(top, rgba(255,255,255,1),
        rgba(255,255,255,0)),
        url(data:image/png;base64,iVBORw0KGg[...]QmCC);
        transition: background-color .2s ease-out;
        background-clip: padding-box; /* Fix bleeding */
        border-radius: 3px;
        box-shadow: 0 1px 0 rgba(0, 0, 0, .3),
        0 2px 2px -1px rgba(0, 0, 0, .5),
        0 1px 0 rgba(255, 255, 255, .3) inset;
        text-shadow: 0 1px 0 rgba(255,255,255, .9);
    }

    .button:hover{
        background-color: #eee;
        color: #555;
    }

    .button:active{
        background: #e9e9e9;
        position: relative;
        top: 1px;
        text-shadow: none;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .3) inset;
    }

    /* Smaller buttons styles */
    .button.small{
        padding: 4px 12px;
    }

    /* Larger buttons styles */
    .button.large{
        padding: 8px 30px;
    }

    .button.large:active{
        top: 2px;
    }

    .button[disabled], .button[disabled]:hover, .button[disabled]:active{
        border-color: #eaeaea;
        background: #fafafa;
        cursor: default;
        position: static;
        color: #999;
        /* Usually, !important should be avoided but here it's really needed :) */
        box-shadow: none !important;
        text-shadow: none !important;
    }

    .button.color{
        color: #fff;
        text-shadow: 0 1px 0 rgba(0,0,0,.2);
        background-image: linear-gradient(top, rgba(255,255,255,.3),
        rgba(255,255,255,0)),
        url(data:image/png;base64,iVBORw0KGg[...]QmCC);
    }

    /* */

    .button.green{
        background-color: #36689e;
        border-color: #36689e;
    }

    .button.green:hover{
        background-color: #4789d0;
        border-color: #4789d0;
    }

    .button.green:active{
        background: #4789d0;
    }

    .light-rounded {
        border-radius: 3px;
    }

    .heavy-rounded {
        border-radius: 10px;
    }

    .emphasize-dark {
        box-shadow: 0 0 5px 2px rgba(0,0,0,.35);
    }

    .forgot a {
        text-align: left;
        padding-left: 0;
        padding-top: 7px;
        color: #3B70A8;
        font-size: 1em;
    }

    .forgot a:hover, .forgot a:active {
        color: #204A76;
    }

    hr.carved {
        clear: both;
        float: none;
        width: 100%;
        height: 1px;
        margin: 0;
        border: 0; /* reset the default stylesheet */
        border-bottom: 1px solid rgba(255,255,255,0.5);
        border-top: 1px solid rgba(0,0,0,0.5);
        border-width: 1px;
    }

    .gradient-light-linear {
        background-image: linear-gradient(rgba(255,255,255,.4), rgba(255,255,255,0.1));
    }


    input.form-control.inset {
        background-color: #FCFBF5;
        border: solid 1px #FBE8D4;
        -webkit-box-shadow: inset 1px 1px 2px 0 #707070;
        -moz-box-shadow: inset 1px 1px 2px 0 #707070;
        box-shadow: inset 1px 1px 2px 0 #707070;
        -webkit-transition: box-shadow 0.3s;
        -moz-transition: box-shadow 0.3s;
        -o-transition: box-shadow 0.3s;
        transition: box-shadow 0.3s;
        font-size: 1em;
    }
    input.form-control.inset:focus {
        -webkit-box-shadow: inset 1px 1px 2px 0 #c9c9c9;
        -moz-box-shadow: inset 1px 1px 2px 0 #c9c9c9;
        box-shadow: inset 1px 1px 2px 0 #c9c9c9;
    }

    input.form-control.inset::-webkit-input-placeholder { /* Chrome/Opera/Safari */
        color: #a3a5a6;
    }
    input.form-control.inset::-moz-placeholder { /* Firefox 19+ */
        color: #a3a5a6;
    }
    input.form-control.inset:-ms-input-placeholder { /* IE 10+ */
        color: #a3a5a6;
    }
    input.form-control.inset:-moz-placeholder { /* Firefox 18- */
        color: #a3a5a6;
    }

</style>

@endpush
@section('login-content')
    <div class="fullscreen">

        <div class="info">
            <div class="wrap">
                <div class="logo"></div>
                <div class="info-content">

                    <h2 class="info-title">UAP Old Mutual Portal</h2>
                    <p>This website provides secure access to features and information provided by the UAP Pricing software.</p>
                    <p>Log in with the credentials assigned to you to access the system.</p>
                </div>

                <footer class="footer">
                    <div class="footer-content">
                        <p class="rights">© 2016 UAP Old Mutual</p>
                        <p class="partner">Powered by Netcen Group.</p>
                    </div>
                </footer>
            </div>
        </div>

        <div class="login">
            <div class="login-content panel panel-default">
                <div class="login-form heavy-rounded emphasize-dark">

                    @yield('auth-content')

                </div>
            </div>

        </div>

        <div class="clearfix"></div>
    </div>
@endsection