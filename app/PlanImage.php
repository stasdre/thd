<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class PlanImage extends Model
{
    protected $fillable = ['label', 'file_name', 'plan_id'];

    public function plan()
    {
        return $this->belongsTo('Thd\Plan');
    }
}
