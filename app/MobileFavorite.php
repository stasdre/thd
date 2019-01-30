<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class MobileFavorite extends Model
{
    protected $fillable = ['name', 'url', 'plan', 'file'];
}
