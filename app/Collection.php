<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = ['name', 'slug', 'short_name', 'description', 'in_filter', 'meta_title', 'meta_description', 'meta_keywords', 'plans'];

    public function plans()
    {
        return $this->belongsToMany('Thd\Plan');
    }

}
