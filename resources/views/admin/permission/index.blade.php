@extends('layouts/dashboard')
@section('content')
<h1>Permissions List</h1>
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
                    <th>Display Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->display_name }}</td>
                    <td>{{ $permission->description }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ URL::route('admin.permission.edit', $permission->id ) }}" class="btn btn-default">
                                <span class="glyphicon glyphicon-edit"></span> Edit
                            </a>
                            <form action="{{ URL::route('admin.permission.destroy', $permission->id ) }}" method="POST" class="btn btn-default">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="submit"><span class="glyphicon glyphicon-remove"></span> Delete
                            </form>
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
    <a href="{{ URL::route('admin.permission.index') }}" class="btn btn-default">List of Permissions</a>
    <a href="{{ URL::route('admin.permission.create') }}" class="btn btn-default">Add a Permission</a>
</div>
@stop

