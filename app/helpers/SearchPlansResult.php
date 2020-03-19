<?php

namespace Thd\helpers;

use Illuminate\Support\Facades\Auth;
use Thd\Plan;

trait SearchPlansResult
{
    public $views = 24;
    public $order = 'popular';

    public $style;

    public function get_plans()
    {
        $plans = Plan::select(
            'id',
            'name',
            'plan_number',
            'rooms',
            'dimensions',
            'square_ft',
            'garage'
        )->where('is_active', '=', 1);


        if ($this->style) {
            $plans->whereHas('styles', function ($query) {
                $query->where('style_id', '=', $this->style);
            });
        }

        if (Auth::id()) {
            $plans->with(['saved_plans' => function ($query) {
                $query->where('user_id', Auth::id());
            }]);
        }

        switch ($this->order) {
            case 'popular':
                $plans->orderBy('views', 'desc');
                break;
            case 'recent':
                $plans->orderBy('created_at', 'desc');
                break;
            case 's_l':
                $plans->orderBy('square_ft->str_total', 'asc');
                break;
            case 'l_s':
                $plans->orderBy('square_ft->str_total', 'desc');
                break;
        }

        $dataPlans = $plans->with(['images' => function ($query) {
            $query->orderBy('for_search', 'desc');
            $query->orderBy('sort_number', 'asc');
        }])->paginate($this->views);

        return $dataPlans;
    }
}
