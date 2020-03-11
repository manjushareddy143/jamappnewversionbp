<?php

use App\Services;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data for services Master table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('services')->truncate();
        $services = new Services();
        $services->servicename='AC Services';
        $services->cost='100';
        $services->save();

        $services = new Services();
        $services->servicename='Plumbing';
        $services->cost='100';
        $services->save();

        $services = new Services();
        $services->servicename='Cleaning';
        $services->cost='100';
        $services->save();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
