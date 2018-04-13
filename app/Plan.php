<?php

namespace Thd;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'plan_number',
        'designer',
        'designer_id',
        'admin_note',
        'details',
        'rooms',
        'similar',
        'dimensions',
        'square_ft',
        'custom__sq_ft',
        'construction',
        'ceiling',
        'roof',
        'garage'
    ];

    protected $casts = [
        'details' => 'array',
        'rooms' => 'array',
        'similar' => 'array',
        'dimensions' => 'array',
        'square_ft' => 'array',
        'custom__sq_ft' => 'array',
        'construction' => 'array',
        'ceiling' => 'array',
        'roof' => 'array',
        'garage' => 'array',
    ];

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

    public function getLabelAttribute()
    {
        return "{$this->id}:{$this->name}";
    }

    public function getValueAttribute()
    {
        return "{$this->id}";
    }

    public function getDesignerPartnerAttribute()
    {
        return $this->designer == 'designer_partner' ? $this->designer_id : '';
    }

    public function getDesignerAdminAttribute()
    {
        return $this->designer == 'designer' ? $this->designer_id : '';
    }

}
