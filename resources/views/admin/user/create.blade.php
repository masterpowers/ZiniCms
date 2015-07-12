@extends('layouts/dashboard')
@section('content')
    <form action="{{ URL::route('admin.user.store')}}" method="post">
        <div class="body bg-gray">
            @if($errors->has("name"))
                <div class="form-group has-error">
                    <label class="control-label" for="inputWarning"><i class="fa fa-warning"></i> {{ $errors->first("name") }}</label>
                    <input type="text" name="name"  class="form-control" value="{{ (Input::old('name')) ? e(Input::old('name')) : '' }}">
                </div>
            @else
                <div class="form-group">
                    <label class="control-label" for="name">Name:</label>
                    <input type="text" name="name"  class="form-control" value="{{ (Input::old('name')) ? e(Input::old('name')) : '' }}">
                </div>
            @endif

            @if($errors->has("email"))
                <div class="form-group has-error">
                    <label class="control-label" for="inputWarning"><i class="fa fa-warning"></i> {{ $errors->first("email") }}</label>
                    <input type="text" name="email"  class="form-control" value="{{ (Input::old('email')) ? e(Input::old('email')) : '' }}">
                </div>
            @else
                <div class="form-group">
                    <label class="control-label" for="email">Email:</label>
                    <input type="text" name="email"  class="form-control" placeholder="Email"  value="{{ (Input::old('email')) ? e(Input::old('email')) : '' }}">
                </div>
            @endif

            @if($errors->has("password"))
                <div class="form-group has-error">
                    <label class="control-label" for="inputWarning"><i class="fa fa-warning"></i> {{ $errors->first("password") }}</label>
                    <input type="password" name="password"  class="form-control">
                </div>
            @else
                <div class="form-group">
                    <label class="control-label" for="password">Password:</label>
                    <input type="password" name="password"  class="form-control">
                </div>
            @endif

            @if($errors->has("password_again"))
                <div class="form-group has-error">
                    <label class="control-label" for="inputWarning"><i class="fa fa-warning"></i> {{ $errors->first("password_again") }}</label>
                    <input type="password" name="password_again"  class="form-control">
                </div>
            @else
                <div class="form-group">
                    <label class="control-label" for="password_again">Retype Password:</label>
                    <input type="password" name="password_again"  class="form-control">
                </div>
            @endif


            <input type="hidden" name="_token" value="{{csrf_token()}}">

        </div>
        <div class="footer">
            <button type="submit" class="btn bg-olive">Create user</button>
        </div>
    </form>

@stop
