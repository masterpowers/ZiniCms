<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\Permission;
class PermissionTableSeeder extends Seeder{

    public function run(){

        DB::table('permissions')->delete();

        /* CP PERMISSIONS */
        Permission::create(array(
            "name"         => 'access-dashboard',
            "display_name" => 'Access Dashboard',
            "description"  => 'This User can access the Dashboard'
        ));

        /*Roles PERMISSIONS*/
        Permission::create(array(
            "name"         => 'create-role',
            "display_name" => 'Create a Role',
            "description"  => 'Create a role'
        ));

        Permission::create(array(
            "name"         => 'edit-role',
            "display_name" => 'Edit a Role',
            "description"  => 'Edit a role'
        ));

        Permission::create(array(
            "name"         => 'view-role',
            "display_name" => 'View a Role',
            "description"  => 'View a role'
        ));

        Permission::create(array(
            "name"         => 'list-roles',
            "display_name" => 'List all Roles',
            "description"  => 'View the list of existing Roles'
        ));

        Permission::create(array(
            "name"         => 'delete-role',
            "display_name" => 'Delete a Role',
            "description"  => 'Delete a role'
        ));

        Permission::create(array(
            "name"         => 'attach-role',
            "display_name" => 'Attach Role',
            "description"  => 'Can attach a role to a user'
        ));


        /*Permissions Permissions*/
        Permission::create(array(
            "name"         => 'create-permission',
            "display_name" => 'Create Permission',
            "description"  => 'Can create a permission'
        ));

        Permission::create(array(
            "name"         => 'edit-permission',
            "display_name" => 'Edit Permission',
            "description"  => 'Edit a permission'
        ));

        Permission::create(array(
            "name"         => 'view-permission',
            "display_name" => 'View Permission',
            "description"  => 'View a permission'
        ));

        Permission::create(array(
            "name"         => 'attach-permission',
            "display_name" => 'Attach Permission',
            "description"  => 'Can attach a permission to a role'
        ));

        Permission::create(array(
            "name"         => 'list-permissions',
            "display_name" => 'List all Permissions',
            "description"  => 'View the list of existing Permissions'
        ));

        Permission::create(array(
            "name"         => 'delete-permission',
            "display_name" => 'Delete Permission',
            "description"  => 'Delete a permission'
        ));


        /*User Permissions*/
        Permission::create(array(
            "name"         => 'create-user',
            "display_name" => 'Create a User Account',
            "description"  => 'This User can create a User Account either using a register form or using the Admin Dashboard'
        ));


        Permission::create(array(
            "name"         => 'edit-user',
            "display_name" => 'Edit a User',
            "description"  => 'This User can edit Users'
        ));

        Permission::create(array(
            "name"         => 'change-user-password',
            "display_name" => 'Change User password',
            "description"  => 'This User can change Users password'
        ));

        Permission::create(array(
            "name"         => 'view-user',
            "display_name" => 'View User Profile',
            "description"  => 'This User can access view User Profile.'
        ));

        Permission::create(array(
            "name"         => 'list-users',
            "display_name" => 'List Users',
            "description"  => 'View a list of users'
        ));

        Permission::create(array(
            "name"         => 'ban-user',
            "display_name" => 'Ban User',
            "description"  => 'Ban a user'
        ));

        Permission::create(array(
            "name"         => 'delete-user',
            "display_name" => 'Delete a User',
            "description"  => 'This User can delete Users'
        ));
    }
}
