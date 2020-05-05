<?php

use App\users_type;
use Illuminate\Database\Seeder;

class users_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users_type')->truncate();
        $SA = new CreateUsersTypeTable();
        $SA ->types = 'SA';
        $SA ->details = 'Super Admin';
        $SA->save();

        $CSP = new CreateUsersTypeTable();
        $CSP ->types = 'CSP';
        $CSP ->details = 'Corporate Service Provider';
        $CSP->save();

        $ISP = new CreateUsersTypeTable();
        $ISP->types = 'ISP';
        $ISP->details = 'Individual Service Provider';
        $ISP->save();
    }
}
