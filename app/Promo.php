<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = ['name', 'value', 'level', 'code'];
}
