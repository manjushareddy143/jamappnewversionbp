<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_mappings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('service_id');
            $table->integer('category_id');
            $table->timestamps();
        });
    


     DB::table('service_mappings')->insert(
            array(
                'service_id' => 3,
                'category_id' => 6,
                
            )
        );

     DB::table('service_mappings')->insert(
            array(
                'service_id' => 3,
                'category_id' => 4,
                
            )
        );

     DB::table('service_mappings')->insert(
            array(
                'service_id' => 3,
                'category_id' => 5,
                
            )
        );

        DB::table('service_mappings')->insert(
            array(
                'service_id' => 1,
                'category_id' => 13,
                
            )
        );

        DB::table('service_mappings')->insert(
            array(
                'service_id' => 1,
                'category_id' => 14,
                
            )
        );

        DB::table('service_mappings')->insert(
            array(
                'service_id' => 4,
                'category_id' => 15,
                
            )
        );

        DB::table('service_mappings')->insert(
            array(
                'service_id' => 4,
                'category_id' => 16,
                
            )
        );

        DB::table('service_mappings')->insert(
            array(
                'service_id' => 4,
                'category_id' => 17,
                
            )
        );

            DB::table('service_mappings')->insert(
            array(
                'service_id' => 5,
                'category_id' => 18,
                
            )
        );

            DB::table('service_mappings')->insert(
            array(
                'service_id' => 5,
                'category_id' => 19,
                
            )
        );

            DB::table('service_mappings')->insert(
            array(
                'service_id' => 5,
                'category_id' => 20,
                
            )
        );

              DB::table('service_mappings')->insert(
            array(
                'service_id' => 2,
                'category_id' => 10,
                
            )
        );
            DB::table('service_mappings')->insert(
            array(
                'service_id' => 2,
                'category_id' => 22,
                
            )
        );

          DB::table('service_mappings')->insert(
            array(
                'service_id' => 17,
                'category_id' => 23,
                
            )
        );

            DB::table('service_mappings')->insert(
            array(
                'service_id' => 17,
                'category_id' => 24,
                
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
        Schema::dropIfExists('service_mappings');
    }
}
