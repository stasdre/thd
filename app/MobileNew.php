<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class MobileNew extends Model
{
    protected $fillable = ['name', 'url', 'plan', 'file'];
}
