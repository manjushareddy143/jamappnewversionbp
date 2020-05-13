<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_conditions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('term_code');
            $table->string('type');
            $table->integer('is_latest');
            $table->timestamps();
        });

        DB::table('term_conditions')->insert(
            array(
                'term_code' => 1,
                'type' => 'Consumer Terms',
                'is_latest' => 1
            )
        );

        DB::table('term_conditions')->insert(
            array(
                'term_code' => 1,
                'type' => 'Provider Terms',
                'is_latest' => 1
            )
        );

        DB::table('term_conditions')->insert(
            array(
                'term_code' => 1,
                'type' => 'Organisation Terms',
                'is_latest' => 1
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
        Schema::dropIfExists('term_conditions');
    }
}
