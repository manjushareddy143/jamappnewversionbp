<?php

use App\Role;
use App\User;
use App\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        $admin = Role::where('slug','Admin')->first();
        $serviceprovider = Role::where('slug','Service provider')->first();
        $manageuser = Permission::where('slug','Manage users')->first();
        $createServices = Permission::where('slug','Create Services')->first();

        $user1 = new User();
        $user1->name = 'Sam Deo';
        $user1->email = 'sam@deo.com';
        $user1->password = bcrypt('secret');
        $user1->save();
        $user1->roles()->attach($admin);
        $user1->permissions()->attach($manageuser);

        $user2 = new User();
        $user2->name = 'Ned stark';
        $user2->email = 'ned@stark.com';
        $user2->password = bcrypt('secret');
        $user2->save();
        $user2->roles()->attach($serviceprovider);
        $user2->permissions()->attach($createServices);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
