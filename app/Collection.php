<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = ['name', 'short_name', 'description', 'in_filter'];
}
