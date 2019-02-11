<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class Outdoor extends Model
{
    public function plans()
    {
        return $this->belongsToMany('Thd\Plan');
    }
}
