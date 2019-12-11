<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class FooterBlock extends Model
{
  public function footer_items()
  {
    return $this->hasMany('Thd\FooterItem');
  }
}
