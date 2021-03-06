<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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
        DB::table('roles')->truncate();
        $admin = new Role();
        $admin->name = 'Admin';
        $admin->slug = 'Admin';
        $admin->save();

        $serviceprovider = new Role();
        $serviceprovider->name = 'Service provider';
        $serviceprovider->slug = 'Service provider';
        $serviceprovider->save();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
