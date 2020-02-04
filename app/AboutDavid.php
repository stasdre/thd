<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class AboutDavid extends Model
{
  protected $table = 'about_david';

  protected $guarded = [];

  protected $casts = [
    'meta' => 'array'
  ];
}
