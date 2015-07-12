@extends('layouts/dashboard')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Users List</h3>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table class="table table-bordered table-striped paginatedDataTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Member Since</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)

                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $role)
                                {{ $role->display_name }}
                            @endforeach
                        </td>
                        <td>{{ date("M. Y", strtotime($user->created_at)) }}</td>
                        <td>
                            <div class="btn-group ">
                                <a href="{{ URL::route('admin.user.show', $user->id) }}" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span> View</a>
                                <a href="{{ URL::route('admin.user.edit', $user->id) }}" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> Ban</a>
                                <a href="{{ URL::route('admin.user.destroy', $user->id) }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Member Since</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->

@stop
