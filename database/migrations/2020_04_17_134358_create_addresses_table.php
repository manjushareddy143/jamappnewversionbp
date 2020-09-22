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
        Schema::dropIfExists('addresses');
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
            $table->integer('default_address')->default(0)->nullable();
            $table->boolean('is_deleted')->default(0);
            $table->timestamps();
        });



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
