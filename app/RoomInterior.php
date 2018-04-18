<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class RoomInterior extends Model
{
    public function plans()
    {
        return $this->belongsToMany('Thd\Plan');
    }
}
