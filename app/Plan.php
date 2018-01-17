<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $guarded = [];
    /**
     * Get the user that owns the house plan.
     */
    public function user()
    {
        return $this->belongsTo('Thd\User');
    }

    public function styles()
    {
        return $this->belongsToMany('Thd\Style', 'style_plan');
    }

    public function collections()
    {
        return $this->belongsToMany('Thd\Collection', 'collection_plan');
    }

    public function images()
    {
        return $this->hasMany('Thd\PlanImage');
    }
}
