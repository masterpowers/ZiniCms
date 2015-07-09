@extends('layouts/admin')
@section('content')
<h1>Role: {{ $role->name }}</h1>
<p>Display Name: {{ $role->display_name }}</p>
<p>Description: {{ $role->display_name }}</p>

<h2>Permissions:</h2>
<ul>
    @foreach($role->perms() as $permission)
        <li>{{ $permission->name }}</li>
    @endforeach
</ul>
@stop
