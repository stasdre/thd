<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class SavedPlan extends Model
{
  protected $fillable = ['user_id', 'plan_id'];

  public function plan()
  {
    return $this->belongsTo('Thd\Plan');
  }
}
