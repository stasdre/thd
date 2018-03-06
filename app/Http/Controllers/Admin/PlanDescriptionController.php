<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;

use Thd\Plan;

class PlanDescriptionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $plan = Plan::findOrFail($id);

        return view('admin.plan-description.create', ['plan'=>$plan]);
    }
}
