<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblServicecostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_servicecost', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('services_id');
            $table->unsignedInteger('servicescategories_id');
            $table->integer('service_cost');

            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('servicescategories_id')->references('id')->on('servicescategories')->onDelete('cascade');

            $table->primary(['services_id','servicescategories_id']);
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
        Schema::dropIfExists('tbl_servicecost');
    }
}
