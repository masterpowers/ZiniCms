Welcome {{Auth::user()->name}}
<form action="{{ URL::route('auth.destroy')}}" method="post">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" name="submit" class="btn btn-default btn-flat">Sign out</button>
</form>
