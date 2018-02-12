<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class AboutDavidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_david')->insert([
            [
                'id'=>1,
                'title'=>'About David E. Wiggins, Architect',
                'description'=>'Description',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
