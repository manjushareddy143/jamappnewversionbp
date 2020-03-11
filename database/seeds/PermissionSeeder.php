<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
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
        DB::table('permissions')->truncate();
        $manageUser = new Permission();
        $manageUser->name = 'Manage users';
        $manageUser->slug = 'Manage users';
        $manageUser->save();

        $createServices = new Permission();
        $createServices->name = 'Create Services';
        $createServices->slug = 'Create Services';
        $createServices->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
