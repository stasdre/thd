<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
     public function index(){
		return view('plan');
	}
}
