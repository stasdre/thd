<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class StylesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('styles')->insert([
            [
                'name'=>'Beach House Plans',
                'short_name'=>'Beach',
                'description'=>'description',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Bungalow Home Plans',
                'short_name'=>'Bungalow',
                'description'=>'description',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Cape Cod Floor Plans',
                'short_name'=>'Cape Cod',
                'description'=>'description',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Colonial Plans',
                'short_name'=>'Colonial',
                'description'=>'description',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Contemporary Designs',
                'short_name'=>'Contemporary',
                'description'=>'description',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Cottage House Plans',
                'short_name'=>'Cottage',
                'description'=>'description',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
