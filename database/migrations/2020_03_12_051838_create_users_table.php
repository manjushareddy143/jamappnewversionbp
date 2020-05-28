<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique()->nullable();
//            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('image')->nullable();
            $table->string('contact')->unique()->nullable();
            $table->string('gender')->nullable();
            $table->string('languages')->nullable();
            $table->integer('type_id')->unsigned();
            $table->integer('term_id')->unsigned();
            $table->integer('org_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

//        $permissions = new \App\Http\Controllers\PermissionController();
       DB::table('users')->insert(
            array(
                'first_name' => 'Admin',
                'last_name' =>  'JAM',
                'email'=> 'admin@jam.com',
                'password' => Hash::make('admin@jam.com'),
                'type_id' => 1,
                'term_id' => 2,
            )
        );

//        $admin_user->roles()->attach($permissions->adminPermissions());

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
