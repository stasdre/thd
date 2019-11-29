<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Thd\Plan;
use Thd\SavedPlan;
use Illuminate\Support\Facades\Auth;

class SavedPlanController extends Controller
{

  public function index()
  {
    return view('dashboard.index');
  }

  public function save(Plan $plan)
  {
    $dataSaved = SavedPlan::where('user_id', Auth::id())
      ->where('plan_id', $plan->id)->delete();

    if ($dataSaved) {
      return response()->json([
        'status' => "del"
      ]);
    }

    $saved = new SavedPlan;
    $saved->user_id = Auth::id();
    $saved->plan_id = $plan->id;
    $saved->save();

    return response()->json([
      'status' => "add"
    ]);
  }
}
