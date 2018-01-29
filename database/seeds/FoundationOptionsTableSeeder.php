<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class FoundationOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foundation_options')->insert([
            [
                'name'=>'Slab',
                'description'=>'',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Crawl Space',
                'description'=>'',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Basement',
                'description'=>'',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
