<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class Asp extends Model
{
  protected $guarded = [];

  protected $casts = [
    'meta' => 'array'
  ];
}
