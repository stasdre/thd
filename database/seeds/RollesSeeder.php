<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class RollesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id'=>1,
                'name'=>'owner',
                'display_name'=>'Site Owner',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'=>2,
                'name'=>'admin',
                'display_name'=>'User Administrator',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'=>3,
                'name'=>'designer',
                'display_name'=>'Designers Administration',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'=>4,
                'name'=>'designer_partner',
                'display_name'=>'Design Partner Administration',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'=>5,
                'name'=>'customer',
                'display_name'=>'Customer',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);

        DB::table('role_user')->insert([
            [
                'user_id'=>1,
                'role_id'=>2,
            ],
        ]);
    }
}
