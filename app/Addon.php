<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    protected $fillable = ['name', 'description', 'short_desc'];
}
