<?php
use App\Servicecost;
use Illuminate\Database\Seeder;

class ServicecostSeeder extends Seeder
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
        DB::table('tbl_servicecost')->truncate();
        $servicecost = new Servicecost();
        $servicecost->services_id='1';
        $servicecost->servicescategories_id='1';
        $servicecost->service_cost='1200';
        $servicecost->save();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
