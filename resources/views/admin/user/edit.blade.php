@extends("layouts/dashboard")
@section("content")
    <form action="{{ URL::route('admin.user.edit', $user->id) }}" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" value="{{ $user->email }}" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="text" value="{{ $user->name }}" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="exampleInputName">Member since</label>
            <input type="text" value="{{ date('M. Y', strtotime($user->created_at)) }}" class="form-control" readonly>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="banned"/> Ban this User
                </label>
            </div>
        </div>
        <h3>Roles: </h3>
        <div class="form-group">
            @foreach($user->roles as $role)
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="userRoles[]" value="{{ $role->id }}" checked="checked" /> {{ $role->display_name }}
                    </label>
                </div>
            @endforeach
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn bg-olive">Update User</button>
    </form>

@stop
