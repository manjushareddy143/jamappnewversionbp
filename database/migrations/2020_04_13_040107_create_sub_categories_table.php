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
            $table->decimal('price',9,2);
            $table->timestamps();
        });

        DB::table('sub_categories')->insert(
            array(
                'id' => 1,
                'name' => 'Installation',
                'image' => "/images/subcategories/" . 'Installation.jpg',
                'description' => 'Light and accessories',
                'price' => 50.0,
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'id' => 2,
                'name' => 'Cleaning',
                'image' => "/images/subcategories/" . 'Cleaning.jpg',
                'description' => 'Floor Cleaning,Carpet and Curtains,Deep Cleaning service,External Façade Cleaning',
                'price' => 50.0,
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'id' => 3,
                'name' => 'Repair',
                'image' => "/images/subcategories/" . 'Repair.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'id' => 4,
                'name' => 'Modification',
                'image' => "/images/subcategories/" . 'Modification.jpg',
                'description' => 'Exhaust Fans',
                'price' => 50.0,
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'id' => 5,
                'name' => 'Maintenance',
                'image' => "/images/subcategories/" . 'Maintenance.jpg',
                'description' => 'Water heater and pump,Panel Board and power sockets,Wiring and network extension',
                'price' => 50.0,
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'id' => 6,
                'name' => 'New Installation',
                'image' => "/images/subcategories/" . 'Installation.jpg',
                'description' => 'Light and accessories',
                'price' => 50.0,
            )
        );


        

        DB::table('sub_categories')->insert(
            array(
                'id' => 7,
                'name' => 'Modification',
                'image' => "/images/subcategories/" . 'Modification.jpg',
                'description' => 'Bathroom Fittings',
                'price' => 50.0,
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'id' => 8,
                'name' => 'Assembly ',
                'image' => "/images/subcategories/" . 'Assembly.jpg',
                'description' => 'Shifting Furnitures',
                'price' => 50.0,
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'id' => 9,
                'name' => 'Shifting ',
                'image' => "/images/subcategories/" . 'Shifting.jpg',
                'description' => 'Assemby and dismantling',
                'price' => 50.0,
            )
        );

        

        DB::table('sub_categories')->insert(
            array(
                'id' => 10,
                'name' => 'Decoration ',
                'image' => "/images/subcategories/" . 'Decoration.jpg',
                'description' => 'Internal and external Wall painting',
                'price' => 50.0,
            )
        );


        DB::table('sub_categories')->insert(
            array(
                'id' => 11,
                'name' => 'New construction ',
                'image' => "/images/subcategories/" . 'Construction.jpg',
                'description' => 'Block Works',
                'price' => 50.0,
            )
        );

                DB::table('sub_categories')->insert(
            array(
                'id' => 13,
                'name' => 'New Installation ',
                'image' => "/images/subcategories/" . 'Installation.jpg',
                'description' => 'Gas filling or cleaning',
                'price' => 50.0,
            )
        );
                   DB::table('sub_categories')->insert(
            array(
                'id' => 14,
                'name' => 'Maintenance ',
                'image' => "/images/subcategories/" . 'Installation.jpg',
                'description' => 'New A/C installation,Shifting Existing A/C,A/C repairing',
                'price' => 50.0,
            )
        );

                 DB::table('sub_categories')->insert(
            array(
                'id' => 15,
                'name' => 'New Installation ',
                'image' => "/images/subcategories/" . 'Installation.jpg',
                'description' => 'Heater,Pump,Filter,Cooler',
                'price' => 50.0,
            )
        );
                        DB::table('sub_categories')->insert(
            array(
                'id' => 16,
                'name' => 'Modification ',
                'image' => "/images/subcategories/" . 'Installation.jpg',
                'description' => 'Bathroom Fittings',
                'price' => 50.0,
            )
        );
                               DB::table('sub_categories')->insert(
            array(
                'id' => 17,
                'name' => 'Maintenance',
                'image' => "/images/subcategories/" . 'Installation.jpg',
                'description' => 'Leakage and blocks,Kitchen Fittings,Taps and mixers ',
                'price' => 50.0,
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
