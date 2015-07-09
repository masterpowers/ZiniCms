<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;
class RoleTableSeeder extends Seeder{

    public function run(){

        DB::table('roles')->delete();

        Role::create(array(
            "name"         => 'developer',
            "display_name" => 'Developer',
            "description"  => 'This is the Developer level'
        ));

        Role::create(array(
            "name"         => 'admin',
            "display_name" => 'Administrator',
            "description"  => 'This is the admin of the website'
        ));

        Role::create(array(
            "name"         => 'content-manager',
            "display_name" => 'Content Manager',
            "description"  => 'This is the Content Manager'
        ));

        Role::create(array(
            "name"         => 'member',
            "display_name" => 'Member' ,
            "description"  => 'This is a simple member'
        ));
    }
}
