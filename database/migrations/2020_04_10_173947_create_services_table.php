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
                'id' => 1,
                'name' => 'Air conditioner',
                'icon_image' => "/images/category/" . 'ac-repair.png',
                'banner_image' => "/images/category/" . 'AirConditioning.png',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'id' => 2,
                'name' => 'Painting & Décor',
                'icon_image' => "/images/category/" . 'painting.png',
                'banner_image' => "/images/category/" . 'painting.jpg',
                'description' => 'Internal and external Wall painting',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'id' => 3,
                'name' => 'Electrical Works',
                'icon_image' => "/images/category/" . 'electricity_works.png',
                'banner_image' => "/images/category/" . 'electric_maintain.jpg',
                'description' => 'Light and accessories',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'id' => 4,
                'name' => 'Plumbing',
                'icon_image' => "/images/category/" . 'plumbing.png',
                'banner_image' => "/images/category/" . 'plumbing.jpg',
                'description' => 'Heater,Pump,Filter,Cooler',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'id' => 5,
                'name' => 'Carpentry & Aluminum & Blacksmithing',
                'icon_image' => "/images/category/" . 'carpentry.png',
                'banner_image' => "/images/category/" . 'carpentry.jpg',
                'description' => 'Shifting Furnitures',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'id' => 6,
                'name' => 'Home cleaning & Home Maids',
                'icon_image' => "/images/category/" . 'home_cleaning.png',
                'banner_image' => "/images/category/" . 'home_maintain.jpg',
                'description' => 'Floor Cleaning',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'id' => 7,
                'name' => 'Agriculture & garden services',
                'icon_image' => "/images/category/" . 'garden.png',
                'banner_image' => "/images/category/" . 'garden.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'id' => 8,
                'name' => 'Pest Control',
                'icon_image' => "/images/category/" . 'pest_control.png',
                'banner_image' => "/images/category/" . 'pest.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'id' => 9,
                'name' => 'Satellite',
                'icon_image' => "/images/category/" . 'satellite.png',
                'banner_image' => "/images/category/" . 'satelite.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'id' => 10,
                'name' => 'Laundry',
                'icon_image' => "/images/category/" . 'laundry.png',
                'banner_image' => "/images/category/" . 'laundry.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'id' => 11,
                'name' => 'Furniture moving & assembling',
                'icon_image' => "/images/category/" . 'furniture_assemble.png',
                'banner_image' => "/images/category/" . 'furniture assemble.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'id' => 12,
                'name' => 'Cars transfer',
                'icon_image' => "/images/category/" . 'car_transfer.png',
                'banner_image' => "/images/category/" . 'car_transfer.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'id' => 13,
                'name' => 'Electronic devices maintenance',
                'icon_image' => "/images/category/" . 'electronic_device_maintain.png',
                'banner_image' => "/images/category/" . 'electric_maintain.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'id' => 14,
                'name' => 'Mobiles Maintenance',
                'icon_image' => "/images/category/" . 'mobile_maintain.png',
                'banner_image' => "/images/category/" . 'mobile_repair.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'id' => 15,
                'name' => 'Home repairs & improvements',
                'icon_image' => "/images/category/" . 'home_repair_maintain.jpg',
                'banner_image' => "/images/category/" . 'maid_banner.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'id' => 16,
                'name' => 'Delivery & hauling services',
                'icon_image' => "/images/category/" . 'delivery_handling_charges.png',
                'banner_image' => "/images/category/" . 'delivery.jpg',
                'description' => '',
                'price' => 50.0,
            )
        );

        DB::table('services')->insert(
            array(
                'id' => 17,
                'name' => 'Masonry',
                'icon_image' => "/images/category/" . 'masonry.png',
                'banner_image' => "/images/category/" . 'masonry_bannerBlock Works.jpg',
                'description' => 'Block Works',
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
