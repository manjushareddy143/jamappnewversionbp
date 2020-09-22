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
                'name' => 'JAM office',
                'address_line1' =>  'Sheikh Saoud Building',
                'address_line2'=> 'Hamad Medical City',
                'landmark' => '',
                'district' => 'Ponomaryovsky District',
                'city' => 'Doha',
                'postal_code' => '461784',
                'location' => '25.283082024872016,51.536083705723286',
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
