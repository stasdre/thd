<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class FooterItem extends Model
{
  protected $guarded = [];

  public function footer_block()
  {
    return $this->belongsTo('Thd\FooterBlock');
  }
}
