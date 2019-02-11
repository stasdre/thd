<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    public function plans()
    {
        return $this->belongsToMany('Thd\Plan');
    }
}
