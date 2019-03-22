<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class MobileGallery extends Model
{
    protected $fillable = ['name', 'url', 'description', 'file', 'caption', 'quote', 'plan'];
}
