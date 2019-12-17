<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;

class BuildersController extends Controller
{
  public function index()
  {
    return view('builders.index');
  }
}
