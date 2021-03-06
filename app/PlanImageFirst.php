<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class PlanImageFirst extends Model
{
    protected $fillable = ['title', 'file_name', 'description', 'sort_number', 'alt_text'];

    public function plan()
    {
        return $this->belongsTo('Thd\Plan');
    }
}
