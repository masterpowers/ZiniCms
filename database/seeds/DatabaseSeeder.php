<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Model::unguard();

        $this->call('UserTableSeeder');
        $this->command->info('Users table seeded!');

        $this->call('RoleTableSeeder');
        $this->command->info('Roles table seeded!');

        $this->call('RoleUserTableSeeder');
        $this->command->info('RoleUser table seeded!');

        $this->call('PermissionTableSeeder');
        $this->command->info('Permissions table seeded!');

        $this->call('PermissionRoleTableSeeder');
        $this->command->info('Role Permissions table seeded!');

        Model::reguard();
    }
}
