@extends('layouts/admin')
@section('content')
<h1>Permissions List</h1>
<div class="input-group col-lg-4 pull-right">
    <input type="search" class="form-control light-table-filter" data-table="order-table" aria-describedby="search" placeholder="Filter permissions">
    <span class="input-group-addon" id="search"><i class="glyphicon glyphicon-search"></i></span>
</div>
<div class="">
    <a href="{{ URL::route('admin.permission.index') }}" class="btn btn-default">List of Permissions</a>
    <a href="{{ URL::route('admin.permission.create') }}" class="btn btn-default">Add a Permission</a>
</div>

<table class="table table-striped sorted_table order-table">
    <thead>
        <tr>
            <th style="display:none;">ID</th>
            <th style="display:none;">Sort</th>
            <th>Name</th>
            <th>Display Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="list">
        @foreach ($permissions as $permission)
        <tr>
            <td style="display:none;" class="id">{{ $permission->id }}</td>
            <td style="display:none;" class="sort">{{ $permission->sort }}</td>
            <td class="permissionName">{{ $permission->name }}</td>
            <td class="permissionName">{{ $permission->display_name }}</td>
            <td>{{ $permission->description }}</td>
            <td>
                <a href="{{ URL::route('admin.permission.edit', $permission->id ) }}"><span class="glyphicon glyphicon-edit"></span> Edit</a><br>
                <form action="{{ URL::route('admin.permission.destroy', $permission->id ) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" ><span class="glyphicon glyphicon-remove"></span> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="pull-right">
    <a href="{{ URL::route('admin.permission.index') }}" class="btn btn-default">List of Permissions</a>
    <a href="{{ URL::route('admin.permission.create') }}" class="btn btn-default">Add a Permission</a>
</div>
@stop

