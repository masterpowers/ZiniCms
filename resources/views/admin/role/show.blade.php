@extends('layouts/dashboard')
@section('content')
<form action="{{ URL::route('update-role-permissions', $role->id) }}" method="POST">
    @foreach($allPerms as $singlePerm)
    <div class="checkbox">
        <label>
            <input type="checkbox" name="permissionsCheckBox[]" value="{{ $singlePerm->id}}"
                @foreach($role->perms as $rolePerm)
                    @if($rolePerm->id == $singlePerm->id)
                        checked
                    @endif
                @endforeach
            > {{ $singlePerm->name }}
        </label>
    </div>
    @endforeach
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-default">Update Permissions</button>
</form>
@stop
