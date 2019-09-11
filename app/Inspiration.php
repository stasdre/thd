<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class Inspiration extends Model
{
    protected $guarded = [];

    public function getProductsAttribute($value)
    {
        return json_decode($value);
    }    

    public function getLastCountProductsAttribute()
    {
        $number = 0;
        if($this->products){
            foreach($this->products as $key=>$item){
                if($key>$number)
                    $number = $key;
            }
        }        
        return $number+1;
    }
}
