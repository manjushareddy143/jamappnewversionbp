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
            $table->string('arabic_name')->nullable();
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->decimal('price',9,2);
            $table->timestamps();
        });

        DB::table('sub_categories')->insert(
            array(
                'id' => 1,
                'name' => 'Installation',
                'arabic_name' => 'التركيب',
                'image' => "/images/subcategories/" . 'Installation.jpg',
                'description' => 'Light and accessories',
                'price' => 50.0,
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'id' => 2,
                'name' => 'Cleaning',
                'arabic_name' => 'تنظيف',
                'image' => "/images/subcategories/" . 'Cleaning.jpg',
                'description' => 'Floor Cleaning,Carpet and Curtains,Deep Cleaning service,External Façade Cleaning',
                'price' => 50.0,
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'id' => 3,
                'name' => 'Repair',
                'arabic_name' => 'يصلح',
                'image' => "/images/subcategories/" . 'Repair.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'id' => 4,
                'name' => 'Modification',
                'arabic_name' => 'تعديل',
                'image' => "/images/subcategories/" . 'Modification.jpg',
                'description' => 'Exhaust Fans',
                'price' => 50.0,
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'id' => 5,
                'name' => 'Maintenance',
                'arabic_name' => 'اعمال صيانة',
                'image' => "/images/subcategories/" . 'Maintenance.jpg',
                'description' => 'Water heater and pump,Panel Board and power sockets,Wiring and network extension',
                'price' => 50.0,
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'id' => 6,
                'name' => 'New Installation',
                'arabic_name' => 'تثبيت جديد',
                'image' => "/images/subcategories/" . 'Installation.jpg',
                'description' => 'Light and accessories',
                'price' => 50.0,
            )
        );




        DB::table('sub_categories')->insert(
            array(
                'id' => 7,
                'name' => 'Modification',
                'arabic_name' => 'تعديل',
                'image' => "/images/subcategories/" . 'Modification.jpg',
                'description' => 'Bathroom Fittings',
                'price' => 50.0,
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'id' => 8,
                'name' => 'Assembly',
                'arabic_name' => 'المجسم',
                'image' => "/images/subcategories/" . 'Assembly.jpg',
                'description' => 'Shifting Furnitures',
                'price' => 50.0,
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'id' => 9,
                'name' => 'Shifting',
                'arabic_name' => 'التحول',
                'image' => "/images/subcategories/" . 'Shifting.jpg',
                'description' => 'Assemby and dismantling',
                'price' => 50.0,
            )
        );



        DB::table('sub_categories')->insert(
            array(
                'id' => 10,
                'name' => 'Decoration',
                'arabic_name' => 'زخرفة',
                'image' => "/images/subcategories/" . 'Decoration.jpg',
                'description' => 'Internal and external Wall painting',
                'price' => 50.0,
            )
        );


        DB::table('sub_categories')->insert(
            array(
                'id' => 11,
                'name' => 'New construction',
                'arabic_name' => 'بناء جديد',
                'image' => "/images/subcategories/" . 'Construction.jpg',
                'description' => 'Block Works',
                'price' => 50.0,
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'id' => 13,
                'name' => 'New Installation',
                'arabic_name' => 'تثبيت جديد',
                'image' => "/images/subcategories/" . 'Installation.jpg',
                'description' => 'Gas filling or cleaning',
                'price' => 50.0,
            )
        );
        DB::table('sub_categories')->insert(
            array(
                'id' => 14,
                'name' => 'Maintenance',
                'arabic_name' => 'اعمال صيانة',
                'image' => "/images/subcategories/" . 'Installation.jpg',
                'description' => 'New A/C installation,Shifting Existing A/C,A/C repairing',
                'price' => 50.0,
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'id' => 15,
                'name' => 'New Installation',
                'arabic_name' => 'تثبيت جديد',
                'image' => "/images/subcategories/" . 'Installation.jpg',
                'description' => 'Heater,Pump,Filter,Cooler',
                'price' => 50.0,
            )
        );
        DB::table('sub_categories')->insert(
            array(
                'id' => 16,
                'name' => 'Modification ',
                'arabic_name' => 'تعديل',
                'image' => "/images/subcategories/" . 'Installation.jpg',
                'description' => 'Bathroom Fittings',
                'price' => 50.0,
            )
        );
        DB::table('sub_categories')->insert(
            array(
                'id' => 17,
                'name' => 'Maintenance',
                'arabic_name' => 'اعمال صيانة',
                'image' => "/images/subcategories/" . 'Installation.jpg',
                'description' => 'Leakage and blocks,Kitchen Fittings,Taps and mixers ',
                'price' => 50.0,
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Assembly',
                'arabic_name' => 'المجسم',
                'image' => "/images/subcategories/" . 'Assembly.jpg',
                'description' => 'Shifting Furnitures',
                'price' => '50',
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Shifting',
                'arabic_name' => 'التحول',
                'image' => "/images/subcategories/" . 'Shifting.jpg',
                'description' => 'Assemby and dismantling',
                'price' => '60',
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Maintenance',
                'arabic_name' => 'اعمال صيانة',
                'image' => "/images/subcategories/" . 'Maintenance.jpg',
                'description' => 'Fixing doors',
                'price' => '50',
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Decoration',
                'arabic_name' => 'زخرفة',
                'image' => "/images/subcategories/" . 'Decoration.jpg',
                'description' => 'Internal and external Wall painting',
                'price' => '70',
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Maintenance',
                'arabic_name' => 'اعمال صيانة',
                'image' => "/images/subcategories/" . 'Maintenance.jpg',
                'description' => 'Wood and metal painting',
                'price' => '30',
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'New construction',
                'arabic_name' => 'بناء جديد',
                'image' => "/images/subcategories/" . 'Construction.jpg',
                'description' => 'Block Works',
                'price' => '50',
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Maintenance',
                'arabic_name' => 'اعمال صيانة',
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
        Schema::dropIfExists('sub_categories');
    }
}
