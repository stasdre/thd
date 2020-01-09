<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class PlanImage extends Model
{
    protected $fillable = ['title', 'file_name', 'description', 'sort_number', 'first_image', 'for_search', 'alt_text'];

    public function plan()
    {
        return $this->belongsTo('Thd\Plan');
    }
}
