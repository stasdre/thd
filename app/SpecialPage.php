<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class SpecialPage extends Model
{
  protected $fillable = ['data'];
  protected $primaryKey = 'url';
}
