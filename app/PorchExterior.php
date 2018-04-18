<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class PorchExterior extends Model
{
    public function plans()
    {
        return $this->belongsToMany('Thd\Plan');
    }
}
