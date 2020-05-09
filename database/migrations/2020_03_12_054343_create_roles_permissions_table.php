<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_permissions', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('permission_id');

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');

            $table->primary(['role_id','permission_id']);
        });


        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 1,
                'permission_id' => 1,
            )
        );

        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 1,
                'permission_id' => 2,
            )
        );

        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 1,
                'permission_id' => 3,
            )
        );

        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 1,
                'permission_id' => 4,
            )
        );

        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 1,
                'permission_id' => 5,
            )
        );

        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 1,
                'permission_id' => 6,
            )
        );

        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 1,
                'permission_id' => 7,
            )
        );

        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 1,
                'permission_id' => 8,
            )
        );

        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 1,
                'permission_id' => 9,
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
        Schema::dropIfExists('roles_permissions');
    }
}
