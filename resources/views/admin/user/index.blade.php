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
                            <a href="{{ URL::route('admin.user.show', $user->id) }}">View</a><br>
                            <a href="{{ URL::route('admin.user.edit', $user->id) }}">Edit</a><br>
                            <a href="#">Ban</a><br>
                            <a href="{{ URL::route('admin.user.destroy', $user->id) }}">Delete</a><br>
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
