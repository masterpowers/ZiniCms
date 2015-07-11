<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
    <li>
        <a href="{{ URL::route('admin-dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-users"></i>
            <span>Roles</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ URL::route('admin.role.create')}}"><i class="fa fa-angle-double-right"></i> Add a Role</a></li>
            <li><a href="{{ URL::route('admin.role.index')}}"><i class="fa fa-angle-double-right"></i> View Roles</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-user-secret"></i>
            <span>Permissions</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ URL::route('admin.permission.create')}}"><i class="fa fa-angle-double-right"></i> Add a Permission</a></li>
            <li><a href="{{ URL::route('admin.permission.index')}}"><i class="fa fa-angle-double-right"></i> View Permissions</a></li>
        </ul>
    </li>
</ul>
