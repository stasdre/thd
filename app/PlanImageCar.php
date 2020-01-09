<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class PlanImageCar extends Model
{
    protected $table = 'plan_image_car';

    protected $fillable = ['title', 'file_name', 'description', 'sort_number', 'alt_text'];

    public function plan()
    {
        return $this->belongsTo('Thd\Plan');
    }    
}
