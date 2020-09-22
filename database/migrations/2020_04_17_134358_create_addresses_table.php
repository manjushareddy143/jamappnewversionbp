<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address_line1')->nullable(true);
            $table->string('address_line2')->nullable(true);
            $table->string('landmark')->nullable(true);
            $table->string('district')->nullable(true);
            $table->string('city')->nullable(true);
            $table->string('postal_code')->nullable(true);
            $table->string('location')->nullable(true);
            $table->integer('user_id');
            $table->boolean('is_deleted')->default(0);
            $table->timestamps();
        });

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
        Schema::dropIfExists('addresses');
    }
}
