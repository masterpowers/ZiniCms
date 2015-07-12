@extends('layouts/dashboard')
@section('content')
<h1>Roles List</h1>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Roles List</h3>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table class="table table-bordered table-striped paginatedDataTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)

                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ URL::route('admin.role.edit', $role->id) }}" class="btn btn-default">
                                    <span class="glyphicon glyphicon-edit"></span> Edit Role
                                </a>
                                <a href="{{ URL::route('admin.role.show', $role->id) }}" class="btn btn-default">
                                    <span class="glyphicon glyphicon-eye-open"></span> Edit Role Permissions
                                </a>
                                <a href="{{ URL::route('admin.role.destroy', $role->id) }}" class="btn btn-default">
                                    <span class="glyphicon glyphicon-remove"></span> Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
<div class="pull-right">
    <a href="{{ URL::route('admin.role.create') }}" class="btn btn-default">Add a role</a>
</div>
@stop
