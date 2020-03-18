<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividualserviceprovidermasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individualserviceprovidermaster', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('usermaster_id');
            $table->string('gender');
            $table->string('languages known');
            $table->string('timing');
            $table->string('experience');

            $table->foreign('usermaster_id')->refrences('id')->on('usermaster')->onDelete('cascade');
            $table->primary(['usermaster_id']);
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
        Schema::dropIfExists('individualserviceprovidermaster');
    }
}
