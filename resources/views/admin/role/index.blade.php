@extends('layouts/dashboard')
@section('content')
<h1>roles List</h1>
<div class="input-group col-lg-4 pull-right">
    <input type="search" class="form-control light-table-filter" data-table="order-table" aria-describedby="search" placeholder="Filter roles">
    <span class="input-group-addon" id="search"><i class="glyphicon glyphicon-search"></i></span>
</div>
<div class="">
    <a href="{{ URL::route('admin.role.create') }}" class="btn btn-default">Add a role</a>
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
        @foreach ($roles as $role)
        <tr>
            <td style="display:none;" class="id">{{ $role->id }}</td>
            <td style="display:none;" class="sort">{{ $role->sort }}</td>
            <td class="roleName">{{ $role->name }}</td>
            <td class="roleName">{{ $role->display_name }}</td>
            <td>{{ $role->description }}</td>
            <td>
                <a href="{{ URL::route('admin.role.edit', $role->id ) }}">
                    <span class="glyphicon glyphicon-edit"></span> Edit Role
                </a><br>

{{--
                <a href="{{ URL::route('admin.role.show', $role->id ) }}">
                    <span class="glyphicon glyphicon-lock"></span> View Role Permissions
                </a><br>
--}}

                <a href="{{ URL::route('admin.role.show', $role->id ) }}">
                    <span class="glyphicon glyphicon-lock"></span> Edit Role Permissions
                </a><br>

                <form action="{{ URL::route('admin.role.destroy', $role->id ) }}" method="POST">
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
    <a href="{{ URL::route('admin.role.create') }}" class="btn btn-default">Add a role</a>
</div>
@stop
