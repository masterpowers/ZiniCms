@extends('layouts/login-register')
@section('content')
    <div class="header">Sign In</div>

    <form action="{{ URL::route('auth.store') }}" method="post">
        <div class="body bg-gray">
            @if(Session::has("failedAuthMsg"))
                <div class="form-group has-error">
                    <label class="control-label"><i class="fa fa-warning"></i> {{ Session::get("failedAuthMsg") }} </label>
                </div>
            @endif

            @if($errors->has("email"))
                <div class="form-group has-error">
                    <label class="control-label" for="email"><i class="fa fa-warning"></i> {{ $errors->first("email") }}</label>
                    <input type="text" name="email"  class="form-control" value="{{ (Input::old('email')) ? e(Input::old('email')) : '' }}">
                </div>
            @else
                <div class="form-group">
                    <label class="control-label" for="email">Email:</label>
                    <input type="text" name="email"  class="form-control"  value="{{ (Input::old('email')) ? e(Input::old('email')) : '' }}">
                </div>
            @endif

            @if($errors->has("password"))
                <div class="form-group has-error">
                    <label class="control-label" for="password"><i class="fa fa-warning"></i> {{ $errors->first("password") }}</label>
                    <input type="password" name="password"  class="form-control">
                </div>
            @else
                <div class="form-group">
                    <label class="control-label" for="password">Password:</label>
                    <input type="password" name="password"  class="form-control">
                </div>
            @endif


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
