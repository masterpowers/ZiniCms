<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\Permission;
class PermissionRoleTableSeeder extends Seeder {

    public function run(){

        DB::table('permission_role')->delete();

        /*
         * Roles List
         * -------------------
         * 1- Developer
         * 2- Admin
         * 3- Content Manager
         * 4- Member
         *
         * */


        /* Developer GETS ALL PERMISSIONS */
        $allPermissions = Permission::all();
        Role::find(1)->attachPermissions($allPermissions);

        /* Content Manager Permissions */
//        Role::find(2)->perms()->sync([1,5,6,7,9,10,11,12,13]);

        /* Member Permissions */
//        Role::find(3)->perms()->sync([5,7,8,13]);

    }
}
