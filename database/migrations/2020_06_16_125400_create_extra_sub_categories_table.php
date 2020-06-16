<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_sub_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->string('price');
            $table->timestamps();
        });

            DB::table('sub_categories')->insert(
                array(
                'name' => 'Assembly',
                'image' => "/images/subcategories/" . 'Assembly.jpg',
                'description' => 'Shifting Furnitures',
                'price' => '50',
            )
                );

            DB::table('sub_categories')->insert(
                array(
                'name' => 'Shifting',
                'image' => "/images/subcategories/" . 'Shifting.jpg',
                'description' => 'Assemby and dismantling',
                'price' => '60',
            )
                );

            DB::table('sub_categories')->insert(
                array(
                'name' => 'Maintenance',
                'image' => "/images/subcategories/" . 'Maintenance.jpg',
                'description' => 'Fixing doors',
                'price' => '50',
            )
                );

            DB::table('sub_categories')->insert(
                array(
                'name' => 'Decoration',
                'image' => "/images/subcategories/" . 'Decoration.jpg',
                'description' => 'Internal and external Wall painting',
                'price' => '70',
            )
                );

            DB::table('sub_categories')->insert(
                array(
                'name' => 'Maintenance',
                'image' => "/images/subcategories/" . 'Maintenance.jpg',
                'description' => 'Wood and metal painting',
                'price' => '30',
            )
                );

            DB::table('sub_categories')->insert(
                array(
                'name' => 'New construction',
                'image' => "/images/subcategories/" . 'Construction.jpg',
                'description' => 'Block Works',
                'price' => '50',
            )
                );

            DB::table('sub_categories')->insert(
                array(
                'name' => 'Maintenance',
                'image' => "/images/subcategories/" . 'Maintenance.jpg',
                'description' => 'Marble Works',
                'price' => '50',
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
        Schema::dropIfExists('extra_sub_categories');
    }
}
