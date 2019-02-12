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
        'garage',
        'youtube_url',
        'video_file'
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

    public function kitchens()
    {
        return $this->belongsToMany('Thd\Kitchen', 'kitchen_plan');
    }

    public function beds()
    {
        return $this->belongsToMany('Thd\Bed', 'bed_plan');
    }

    public function roomsInterior()
    {
        return $this->belongsToMany('Thd\RoomInterior', 'room_interiors_plan');
    }

    public function images()
    {
        return $this->hasMany('Thd\PlanImage');
    }

    public function images_first()
    {
        return $this->hasMany('Thd\PlanImageFirst');
    }

    public function images_second()
    {
        return $this->hasMany('Thd\PlanImageSecond');
    }

    public function images_basement()
    {
        return $this->hasMany('Thd\PlanImageBasement');
    }

    public function images_bonus()
    {
        return $this->hasMany('Thd\PlanImageBonus');
    }

    public function packages()
    {
        return $this->belongsToMany('Thd\Package')->withPivot('id', 'price', 'files');
    }

    public function foundationOptions()
    {
        return $this->belongsToMany('Thd\FoundationOption', 'package_foundation_options', 'plan_id', 'foundation_options_id')->withPivot('id', 'price', 'files');
    }

    public function addons()
    {
        return $this->belongsToMany('Thd\Addon')->withPivot('id', 'price', 'files');
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

    public function getYoutubeAttribute()
    {
        return $this->video_file ? 'file' : 'link';
    }

    public function garages()
    {
        return $this->belongsToMany('Thd\Garage', 'garage_plan');
    }

    public function outdoors()
    {
        return $this->belongsToMany('Thd\Outdoor', 'outdoor_plan');
    }

}
