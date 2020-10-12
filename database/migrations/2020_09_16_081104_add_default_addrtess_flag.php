<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultAddrtessFlag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('addresses', function (Blueprint $table) {
        //     $table->integer('default_address')->after('user_id')->default(0)->nullable();
        //     $table->index("default_address");
        // });

        DB::table('addresses')->insert(
            array(
                'name' => 'JAM',
                'address_line1' =>  'Office No 1B',
                'address_line2'=> '1st Floor',
                'landmark' => 'Al Mana Tower',
                'district' => 'Near Toyota Signal',
                'city' => 'Doha Qatar',
                'postal_code' => 'P O Box 203281',
                'location' => '25.2670474,51.5486133',
                'user_id' => 3,
                'default_address' => 1,
                'is_deleted' => 0,
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('addresses', function (Blueprint $table) {
        //     $table->dropColumn('default_address');
        // });
    }
}
