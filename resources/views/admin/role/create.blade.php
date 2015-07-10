@extends('layouts/admin')
@section('content')
<h3>Add Role</h3>
<a href="{{ URL::route('admin.role.index') }}" class="btn btn-default"> <span class="glyphicon glyphicon-chevron-left"></span> Back to Roles</a>
<form action="{{ URL::route('admin.role.store') }}" method="POST">
    <div class="form-group">
        <label for="name">Name: </label>
        @if($errors->has("name"))
            <div class="alert alert-danger">
                {{ $errors->first("name") }}
            </div>
        @endif
        <input type="text" name="name"  class="form-control"  value="{{ (Input::old('name')) ? e(Input::old('name')) : '' }}">
    </div>

    <div class="form-group">
        <label for="display_name">Display Name: </label>
        @if($errors->has("display_name"))
            <div class="alert alert-danger">
                {{ $errors->first("display_name") }}
            </div>
        @endif
        <input type="text" name="display_name"  class="form-control"  value="{{ (Input::old('display_name')) ? e(Input::old('display_name')) : '' }}">
    </div>

    <div class="form-group">
        <label for="name">Description: </label>
        @if($errors->has("description"))
            <div class="alert alert-danger">
                {{ $errors->first("description") }}
            </div>
        @endif
        <input type="text" name="description"  class="form-control"  value="{{ (Input::old('description')) ? e(Input::old('description')) : '' }}">
    </div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-success">Create Role</button>
</form>
@stop
