@extends('layouts/login-register')
@section('content')
    <div class="header">Sign In</div>

    <form action="{{ URL::route('admin.auth.store') }}" method="post">
        <div class="body bg-gray">
            <div class="form-group">
                @if($errors->has("email"))
                <p class="email-pass-error">{{ $errors->first("email") }}</p>
                @endif
                <input type="text" placeholder="Email" class="form-control" name="email" (Input::old('email')) ? value="{{ e(Input::old('email')) }}" : value="">
            </div>
            <div class="form-group">
                @if($errors->has("password"))
                <p class="email-pass-error">{{ $errors->first("password") }}</p>
                @endif
                <input type="password" placeholder="Password" class="form-control" name="password" >
            </div>
            <div class="form-group">
                <input type="checkbox" name="remember"/> Remember me
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </div>
        <div class="footer">
            <button type="submit" class="btn bg-olive btn-block">Sign me in</button>

            <p><a href="#">I forgot my password</a></p>

            <a href="register.html" class="text-center">Register a new membership</a>
        </div>
    </form>

    <div class="margin text-center">
        <span>Sign in using social networks</span>
        <br/>
        <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
        <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
        <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

    </div>
@stop
