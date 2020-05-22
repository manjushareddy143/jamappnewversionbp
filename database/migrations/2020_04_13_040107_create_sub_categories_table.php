<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->string('price');
            $table->timestamps();
        });

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Installation',
                'image' => "/images/subcategories/" . 'Installation.jpg',
                'description' => '',
                'price' => '50',
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Cleaning',
                'image' => "/images/subcategories/" . 'Cleaning.jpg',
                'description' => '',
                'price' => '60',
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Repair',
                'image' => "/images/subcategories/" . 'Repair.jpg',
                'description' => '',
                'price' => '30',
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
        Schema::dropIfExists('sub_categories');
    }
}
