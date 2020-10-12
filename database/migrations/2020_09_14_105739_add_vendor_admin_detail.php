<?php

use App\organisation;
use FontLib\TrueType\Collection;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AddVendorAdminDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('organisation')->insert(
            array(
                'name' => 'Mosaic Contracting',
                'logo' => "/images/profiles/" . 'jam_logo_new.png',
                'country' => 'Qatar',
                'number_of_employee' => '10000+',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            )
        );

        $org = DB::table('organisation')->where("name", "=", 'Mosaic Contracting')->first();
        DB::table('users')->insert(
            array(
                'first_name' => 'Mosaic',
                'last_name' => 'Contracting',
                'email' => 'customercare@jam-app.com',
                'password' => Hash::make('jam@admin.com'),
                'social_signin' => '',
                'image' => "/images/profiles/" . 'jam_logo_new.png',
                'contact' => '+97444626215',
                'gender' => 'Male',
                'languages' => 'Arabic,English',
                'type_id' => 2,
                'term_id' => 3,
                'org_id' => $org->id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            )
        );
        $orgAdmin = DB::table('users')->where("email", "=", 'customercare@jam-app.com')->first();

        DB::table('users_roles')->insert(
            array(
                'role_id' => 2,
                'user_id' => $orgAdmin->id,
            )
        );


        DB::table('users')->insert(
            array(
                'first_name' => 'JAM',
                'last_name' => 'Vendor',
                'email' => 'jam@vendor.com',
                'password' => Hash::make('jam@admin.com'),
                'social_signin' => '',
                'image' => "/images/profiles/" . 'jam_logo_new.png',
                'contact' => '+917000000002',
                'gender' => 'Male',
                'languages' => 'Arabic,English',
                'type_id' => 3,
                'term_id' => 2,
                'org_id' => $org->id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            )
        );
        $vendor = DB::table('users')->where("email", "=", 'jam@vendor.com')->first();

        DB::table('users_roles')->insert(
            array(
                'role_id' => 3,
                'user_id' => $vendor->id,
            )
        );


        DB::table('service_providers')->insert(
            array(
                'user_id' => $vendor->id,
                'resident_country' => 'Qatar',
                'service_radius' => 50000,
                'verified' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            )
        );

        $serviceCategories = DB::table('service_mappings')->get();
        foreach ($serviceCategories as $serCate) {
            DB::table('provider_service_mappings')->insert(
                array(
                    'user_id' => $vendor->id,
                    'service_id' => $serCate->service_id,
                    'category_id' => $serCate->category_id,
                    'price' => rand(100,1000),
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                )
            );
        }
        $withCateService = DB::table('service_mappings')->select('service_id as id')->get();

        $data = array();
        foreach ($withCateService as $service) {
            array_push($data, $service->id);
        }

        $onlyService = DB::table('services')->whereNotIn('id',$data)->get();
        foreach ($onlyService as $service) {
            DB::table('provider_service_mappings')->insert(
                array(
                    'user_id' => $vendor->id,
                    'service_id' => $service->id,
                    'category_id' => 0,
                    'price' => rand(100,1000),
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                )
            );
        }








    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
