@extends('layouts/admin')
@section('content')
<h3>Add Permission</h3>
<form action="{{ URL::route('admin.permission.store') }}" method="POST">

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
    <button type="submit" class="btn btn-success">Create Permission</button>
</form>
@stop
