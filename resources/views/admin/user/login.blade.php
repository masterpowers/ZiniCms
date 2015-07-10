@extends('layouts/admin')
@section('content')
<form action="{{ URL::route('admin.auth.store') }}" method="POST">
    @if($errors->has("email"))
    <p class="email-pass-error">{{ $errors->first("email") }}</p>
    @endif
    <div class="group-inputs @if($errors->has('email')) error-here @endif">
        <input type="text"  autocapitalize="off" autocorrect="off" placeholder="USERNAME" name="email" (Input::old('email')) ? value="{{ e(Input::old('email')) }}" : value="">
        <div  id="needPassBtn" class="btn-inside-input">need a username?</div>
    </div>

    <div class="group-inputs @if($errors->has('password')) error-here @endif">
        @if($errors->has("password"))
            <p class="email-pass-error">{{ $errors->first("password") }}</p>
        @endif
        <input type="password" autocapitalize="off" autocorrect="off" placeholder="PASSWORD" name="password" >
        <div id="forgotPassBtn" class="btn-inside-input">Forgot Password?</div>
    </div>

    <div class="checkbox">
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember Me</label>
    </div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" name="submit" value="Submit" id="submit">


</form>
@stop
