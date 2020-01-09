<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class PlanImageBonus extends Model
{
    protected $table = 'plan_image_bonus';

    protected $fillable = ['title', 'file_name', 'description', 'sort_number', 'alt_text'];

    public function plan()
    {
        return $this->belongsTo('Thd\Plan');
    }
}
