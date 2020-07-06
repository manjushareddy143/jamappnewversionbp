<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id');
            $table->integer('working_hr');
            $table->string('material_names');
            $table->integer('material_quantity');
            $table->integer('material_price');
            $table->integer('additional_charges');
            $table->integer('discount');
            $table->integer('tax');
            $table->boolean('is_deleted')->default(0);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice');
    }
}
