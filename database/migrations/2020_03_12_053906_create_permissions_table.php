<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        DB::table('permissions')->insert(
            array(
                'name' => 'Create User',
                'slug' =>  'create-user'
            )
        );

        DB::table('permissions')->insert(
            array(
                'name' => 'View User',
                'slug' =>  'view-user'
            )
        );

        DB::table('permissions')->insert(
            array(
                'name' => 'Delete User',
                'slug' =>  'delete-user'
            )
        );



        DB::table('permissions')->insert(
            array(
                'name' => 'Create Provider',
                'slug' =>  'create-provider'
            )
        );

        DB::table('permissions')->insert(
            array(
                'name' => 'View Provider',
                'slug' =>  'view-provider'
            )
        );

        DB::table('permissions')->insert(
            array(
                'name' => 'Delete Provider',
                'slug' =>  'delete-provider'
            )
        );

        DB::table('permissions')->insert(
            array(
                'name' => 'Create Organisation',
                'slug' =>  'create-organisation'
            )
        );

        DB::table('permissions')->insert(
            array(
                'name' => 'View Organisation',
                'slug' =>  'view-organisation'
            )
        );

        DB::table('permissions')->insert(
            array(
                'name' => 'Delete Organisation',
                'slug' =>  'delete-organisation'
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
        Schema::dropIfExists('permissions');
    }
}
