@extends('layouts/dashboard')
@section('content')
    <form action="{{ URL::route('admin.user.store')}}" method="post">
        <div class="body bg-gray">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Full name"/>
            </div>
            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Email"/>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password"/>
            </div>
            <div class="form-group">
                <input type="password" name="password_again" class="form-control" placeholder="Retype password"/>
            </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}">

        </div>
        <div class="footer">
            <button type="submit" class="btn bg-olive">Create user</button>
        </div>
    </form>

@stop
