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
        $services = new Services();
        $services->name='AC Services';
        $services->save();

        $services = new Services();
        $services->name='Plumbing';
        $services->save();

        $services = new Services();
        $services->name='Cleaning';
        $services->save();
    }
}
