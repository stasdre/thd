<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = ['name', 'value', 'level', 'code'];

    public function users()
    {
        return $this->belongsToMany('Thd\User');
    }
}
