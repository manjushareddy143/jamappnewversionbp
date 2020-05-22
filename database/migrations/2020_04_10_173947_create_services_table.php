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
            $table->timestamps();
        });

//        $host = url('/');

        DB::table('services')->insert(
            array(
                'name' => 'Air conditioner',
                'icon_image' => "/images/category/" . 'ac-repair.jpeg',
                'banner_image' => "/images/category/" . 'ac-actop.jpg',
                'description' => '',
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Painting & Décor',
                'icon_image' => "/images/category/" . 'painting.jpg',
                'banner_image' => "/images/category/" . 'painting_banner.jpg',
                'description' => '',
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Electrical Works',
                'icon_image' => "/images/category/" . 'electrict.jpg',
                'banner_image' => "/images/category/" . 'electric_banner.jpg',
                'description' => '',
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Plumbing',
                'icon_image' => "/images/category/" . 'Plumbing.jpg',
                'banner_image' => "/images/category/" . 'Plumbing_banner.jpg',
                'description' => '',
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Carpentry & Aluminum & Blacksmithing',
                'icon_image' => "/images/category/" . 'Carpentry.jpg',
                'banner_image' => "/images/category/" . 'Carpentry_banner.jpg',
                'description' => '',
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Home cleaning & Home Maids',
                'icon_image' => "/images/category/" . 'cleaning.jpg',
                'banner_image' => "/images/category/" . 'cleaning_bannr.jpg',
                'description' => '',
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Agriculture & garden services',
                'icon_image' => "/images/category/" . 'Agriculture.jpg',
                'banner_image' => "/images/category/" . 'Agriculture_banner.jpg',
                'description' => '',
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Pest Control',
                'icon_image' => "/images/category/" . 'PestControl.jpg',
                'banner_image' => "/images/category/" . 'PestControl_banner.jpg',
                'description' => '',
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Satellite',
                'icon_image' => "/images/category/" . 'Satellite.jpg',
                'banner_image' => "/images/category/" . 'Satellite_banner.jpg',
                'description' => '',
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Laundry',
                'icon_image' => "/images/category/" . 'Laundry.jpg',
                'banner_image' => "/images/category/" . 'Laundry_banner.jpg',
                'description' => '',
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Furniture moving & assembling',
                'icon_image' => "/images/category/" . 'Furniture.jpg',
                'banner_image' => "/images/category/" . 'Furniture_banner.jpg',
                'description' => '',
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Cars transfer',
                'icon_image' => "/images/category/" . 'Carstransfer.jpg',
                'banner_image' => "/images/category/" . 'Carstransfer_banner.jpg',
                'description' => '',
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Electronic devices maintenance',
                'icon_image' => "/images/category/" . 'Electronicmaintenance.jpg',
                'banner_image' => "/images/category/" . 'Electronicmaintenance_banner.jpg',
                'description' => '',
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Mobiles Maintenance',
                'icon_image' => "/images/category/" . 'MobilesMaintenance.jpg',
                'banner_image' => "/images/category/" . 'MobilesMaintenance_banner.jpg',
                'description' => '',
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Home repairs & improvements',
                'icon_image' => "/images/category/" . 'Homerepairs.jpg',
                'banner_image' => "/images/category/" . 'Homerepairs_banner.jpg',
                'description' => '',
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Delivery & hauling services',
                'icon_image' => "/images/category/" . 'Deliveryservices.jpg',
                'banner_image' => "/images/category/" . 'Deliveryservices_banner.png',
                'description' => '',
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
