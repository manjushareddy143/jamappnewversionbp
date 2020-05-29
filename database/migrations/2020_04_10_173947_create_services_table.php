<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('icon_image')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('description')->nullable();
            $table->decimal('price',9,2);
            $table->timestamps();
        });

        DB::table('services')->insert(
            array(
                'name' => 'Air conditioner',
                'icon_image' => "/images/category/" . 'ac-repair.png',
                'banner_image' => "/images/category/" . 'AirConditioning.png',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Painting & Décor',
                'icon_image' => "/images/category/" . 'painting.png',
                'banner_image' => "/images/category/" . 'painting.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Electrical Works',
                'icon_image' => "/images/category/" . 'electricity_works.png',
                'banner_image' => "/images/category/" . 'electric_maintain.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Plumbing',
                'icon_image' => "/images/category/" . 'plumbing.png',
                'banner_image' => "/images/category/" . 'plumbing.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Carpentry & Aluminum & Blacksmithing',
                'icon_image' => "/images/category/" . 'carpentry.png',
                'banner_image' => "/images/category/" . 'carpentry.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Home cleaning & Home Maids',
                'icon_image' => "/images/category/" . 'home_cleaning.png',
                'banner_image' => "/images/category/" . 'home_maintain.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Agriculture & garden services',
                'icon_image' => "/images/category/" . 'garden.png',
                'banner_image' => "/images/category/" . 'garden.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Pest Control',
                'icon_image' => "/images/category/" . 'pest_control.png',
                'banner_image' => "/images/category/" . 'pest.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Satellite',
                'icon_image' => "/images/category/" . 'satellite.png',
                'banner_image' => "/images/category/" . 'satelite.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Laundry',
                'icon_image' => "/images/category/" . 'laundry.png',
                'banner_image' => "/images/category/" . 'laundry.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Furniture moving & assembling',
                'icon_image' => "/images/category/" . 'furniture_assemble.png',
                'banner_image' => "/images/category/" . 'furniture assemble.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Cars transfer',
                'icon_image' => "/images/category/" . 'car_transfer.png',
                'banner_image' => "/images/category/" . 'car_transfer.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Electronic devices maintenance',
                'icon_image' => "/images/category/" . 'electronic_device_maintain.png',
                'banner_image' => "/images/category/" . 'electric_maintain.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Mobiles Maintenance',
                'icon_image' => "/images/category/" . 'mobile_maintain.png',
                'banner_image' => "/images/category/" . 'mobile_repair.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Home repairs & improvements',
                'icon_image' => "/images/category/" . 'home_repair_maintain.jpg',
                'banner_image' => "/images/category/" . 'maid_banner.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Delivery & hauling services',
                'icon_image' => "/images/category/" . 'delivery_handling_charges.png',
                'banner_image' => "/images/category/" . 'delivery.jpg',
                'description' => '',
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
        Schema::dropIfExists('services');
    }
}
