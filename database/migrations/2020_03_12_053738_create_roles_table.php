<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Roles for users
        Schema::create('roles', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name'); //user name
            $table->string('slug');
            $table->timestamps();
        });

        DB::table('roles')->insert(
            array(
                'name' => 'Admin',
                'slug' =>  'admin-admin'
            )
        );

        DB::table('roles')->insert(
            array(
                'name' => 'Corporate Service Provider',
                'slug' =>  'organisation-admin'
            )
        );

        DB::table('roles')->insert(
            array(
                'name' => 'Individual Service Provider',
                'slug' =>  'provider'
            )
        );

        DB::table('roles')->insert(
            array(
                'name' => 'Consumer',
                'slug' =>  'customer'
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
        Schema::dropIfExists('roles');
    }
}
