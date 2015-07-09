<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;

class UserTableSeeder extends Seeder {

    public function run(){

        DB::table('users')->delete();

        User::create(array(
            "name"         => 'Dev',
            "email" => 'dev@app.com' ,
            "password"  => '$2y$10$BB9JACyCfk5HulWUY4VajOLj9sO9rz/JUSPDMtN0/jcgGEpUUl9Ju'
        ));

        User::create(array(
            "name"         => 'Admin',
            "email" => 'admin@app.com' ,
            "password"  => '$2y$10$BB9JACyCfk5HulWUY4VajOLj9sO9rz/JUSPDMtN0/jcgGEpUUl9Ju'
        ));

        User::create(array(
            "name"         => 'Content Manager',
            "email" => 'cm@app.com',
            "password"  => '$2y$10$BB9JACyCfk5HulWUY4VajOLj9sO9rz/JUSPDMtN0/jcgGEpUUl9Ju'
        ));

        User::create(array(
            "name"         => 'Member',
            "email" => 'member@app.com',
            "password"  => '$2y$10$BB9JACyCfk5HulWUY4VajOLj9sO9rz/JUSPDMtN0/jcgGEpUUl9Ju'
        ));
    }
}
