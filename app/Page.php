<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
  protected $fillable = ['title', 'link', 'text'];
}
