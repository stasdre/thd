<?php

namespace Thd\Http\Controllers\Admin;

use Thd\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FooterBlockController extends Controller
{
  public function index()
  {
    return view('admin.footer-blocks.index');
  }
}
