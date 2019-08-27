<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StatesUs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states_us', function (Blueprint $table) {
            $table->increments('id');
            $table->string('abbr', 10);
            $table->string('name', 100);
        }); 
        
        $data = array(
            array('abbr'=>'AL', 'name'=>'Alabama'),
            array('abbr'=>'AK', 'name'=>'Alaska'),
            array('abbr'=>'AZ', 'name'=>'Arizona'),
            array('abbr'=>'AR', 'name'=>'Arkansas'),
            array('abbr'=>'CA', 'name'=>'California'),
            array('abbr'=>'CO', 'name'=>'Colorado'),
            array('abbr'=>'CT', 'name'=>'Connecticut'),
            array('abbr'=>'DE', 'name'=>'Delaware'),
            array('abbr'=>'DC', 'name'=>'District of Columbia'),
            array('abbr'=>'FL', 'name'=>'Florida'),
            array('abbr'=>'GA', 'name'=>'Georgia'),
            array('abbr'=>'HI', 'name'=>'Hawaii'),
            array('abbr'=>'ID', 'name'=>'Idaho'),
            array('abbr'=>'IL', 'name'=>'Illinois'),
            array('abbr'=>'IN', 'name'=>'Indiana'),
            array('abbr'=>'IA', 'name'=>'Iowa'),
            array('abbr'=>'KS', 'name'=>'Kansas'),
            array('abbr'=>'KY', 'name'=>'Kentucky'),
            array('abbr'=>'LA', 'name'=>'Louisiana'),
            array('abbr'=>'ME', 'name'=>'Maine'),
            array('abbr'=>'MD', 'name'=>'Maryland'),
            array('abbr'=>'MA', 'name'=>'Massachusetts'),
            array('abbr'=>'MI', 'name'=>'Michigan'),
            array('abbr'=>'MN', 'name'=>'Minnesota'),
            array('abbr'=>'MS', 'name'=>'Mississippi'),
            array('abbr'=>'MO', 'name'=>'Missouri'),
            array('abbr'=>'MT', 'name'=>'Montana'),
            array('abbr'=>'NE', 'name'=>'Nebraska'),
            array('abbr'=>'NV', 'name'=>'Nevada'),
            array('abbr'=>'NH', 'name'=>'New Hampshire'),
            array('abbr'=>'NJ', 'name'=>'New Jersey'),
            array('abbr'=>'NM', 'name'=>'New Mexico'),
            array('abbr'=>'NY', 'name'=>'New York'),
            array('abbr'=>'NC', 'name'=>'North Carolina'),
            array('abbr'=>'ND', 'name'=>'North Dakota'),
            array('abbr'=>'OH', 'name'=>'Ohio'),
            array('abbr'=>'OK', 'name'=>'Oklahoma'),
            array('abbr'=>'OR', 'name'=>'Oregon'),
            array('abbr'=>'PA', 'name'=>'Pennsylvania'),
            array('abbr'=>'RI', 'name'=>'Rhode Island'),
            array('abbr'=>'SC', 'name'=>'South Carolina'),
            array('abbr'=>'SD', 'name'=>'South Dakota'),
            array('abbr'=>'TN', 'name'=>'Tennessee'),
            array('abbr'=>'TX', 'name'=>'Texas'),
            array('abbr'=>'UT', 'name'=>'Utah'),
            array('abbr'=>'VT', 'name'=>'Vermont'),
            array('abbr'=>'VA', 'name'=>'Virginia'),
            array('abbr'=>'WA', 'name'=>'Washington'),
            array('abbr'=>'WV', 'name'=>'West Virginia'),
            array('abbr'=>'WI', 'name'=>'Wisconsin'),
            array('abbr'=>'WY', 'name'=>'Wyoming')            
        );

        DB::table('states_us')->insert($data);        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states_us');
    }
}
