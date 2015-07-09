<?php
use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RoleUserTableSeeder extends Seeder {

    public function run(){
        DB::table('role_user')->delete();

        /*Developer gets Develper Role*/
        User::find(1)->attachRole(1);

        /*Admin gets Admin Role*/
        User::find(2)->attachRole(2);

        /*Content Manger gets Content Manager Role*/
        User::find(3)->attachRole(3);

        /*Member gets Member Role*/
        User::find(4)->attachRole(4);
    }

}
