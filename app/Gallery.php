<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    protected $fillable = ['name', 'url', 'description', 'file', 'caption', 'quote', 'plan'];
}
