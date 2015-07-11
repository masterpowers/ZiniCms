@extends('layouts/dashboard')
@section('content')
<h3>Update role</h3>
<form action="{{ URL::route('admin.role.update', $role->id) }}" method="POST">
    <div class="form-group">
        <label for="name">Name: </label>
        @if($errors->has("name"))
            <div class="alert alert-danger">
                {{ $errors->first("name") }}
            </div>
        @endif
        <input type="text" name="name" value="{{ $role->name }}" class="form-control" readonly>
    </div>
    <div class="form-group">
        <label for="display_name">Display Name: </label>
        @if($errors->has("display_name"))
            <div class="alert alert-danger">
                {{ $errors->first("display_name") }}
            </div>
        @endif
        <input type="text" name="display_name" value="{{ $role->display_name }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="name">Description: </label>
        @if($errors->has("description"))
            <div class="alert alert-danger">
                {{ $errors->first("description") }}
            </div>
        @endif
        <input type="text" name="description" value="{{ $role->description }}" class="form-control">
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="PUT">
    <button type="submit" class="btn btn-success">Update role</button>
</form>
@stop
