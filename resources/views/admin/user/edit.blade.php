@extends("layouts/dashboard")
@section("content")
    <form action="{{ URL::route('admin.user.update', $user->id) }}" method="POST">
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
        <h4>Roles: </h4>
        <div class="form-group">

            @foreach($allRoles as $singleRole)
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="rolesCheckBox[]" value="{{ $singleRole->id}}"
                            @foreach($user->roles as $userRole)
                                @if($userRole->id == $singleRole->id)
                                    checked
                                @endif
                            @endforeach
                        > {{ $singleRole->display_name }}
                    </label>
                </div>
            @endforeach

        </div>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn bg-olive">Update User</button>
    </form>

@stop
