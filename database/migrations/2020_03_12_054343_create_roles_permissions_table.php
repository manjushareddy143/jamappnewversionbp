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


    public $i;
    public function up()
    {
        Schema::create('roles_permissions', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('permission_id');

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');

            $table->primary(['role_id','permission_id']);
        });

        \App\Permission::all()->each(function($permision) {

            DB::table('roles_permissions')->insert(
                array(
                    'role_id' => 1,
                    'permission_id' => $permision->id,
                )
            );
        });

        //2 corporate
        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 2,
                'permission_id' => 1,
            )
        );
        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 2,
                'permission_id' => 2,
            )
        );

        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 2,
                'permission_id' => 3,
            )
        );
        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 2,
                'permission_id' => 4,
            )
        );

        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 2,
                'permission_id' => 5,
            )
        );

        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 2,
                'permission_id' => 6,
            )
        );

        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 2,
                'permission_id' => 10,
            )
        );
        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 2,
                'permission_id' => 11,
            )
        );

        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 2,
                'permission_id' => 12,
            )
        );
        //3 provider
        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 3,
                'permission_id' => 10,
            )
        );

        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 3,
                'permission_id' => 11,
            )
        );

        //4 customer

        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 4,
                'permission_id' => 10,
            )
        );

        DB::table('roles_permissions')->insert(
            array(
                'role_id' => 4,
                'permission_id' => 11,
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
