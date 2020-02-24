<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $adminRole=Role::where('name','admin')->first();
        $userRole=Role::where('name','user')->first();

        $admin= User::create([
        	'name'=>'Admin',
        	'email'=>'admin@admin.com',
        	'password'=>bcrypt('admin')
        ]);

        $user= User::create([
        	'name'=>'User',
        	'email'=>'user@user.com',
        	'password'=>bcrypt('user')
        ]); 

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}
