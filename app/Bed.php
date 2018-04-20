<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    public function plans()
    {
        return $this->belongsToMany('Thd\Plan');
    }
}
