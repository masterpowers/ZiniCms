@extends('layouts/login-register')
@section('content')
<div class="header">Register New Membership</div>
<form action="../../index.html" method="post">
    <div class="body bg-gray">
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Full name"/>
        </div>
        <div class="form-group">
            <input type="text" name="userid" class="form-control" placeholder="User ID"/>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password"/>
        </div>
        <div class="form-group">
            <input type="password" name="password2" class="form-control" placeholder="Retype password"/>
        </div>
    </div>
    <div class="footer">

        <button type="submit" class="btn bg-olive btn-block">Sign me up</button>

        <a href="login.html" class="text-center">I already have a membership</a>
    </div>
</form>

<div class="margin text-center">
    <span>Register using social networks</span>
    <br/>
    <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
    <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
    <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

</div>
@stop
