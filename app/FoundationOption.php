<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class FoundationOption extends Model
{
    protected $fillable = ['name', 'description', 'short_desc'];
}
