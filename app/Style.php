<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $fillable = ['name', 'short_name', 'description', 'in_filter'];
}
