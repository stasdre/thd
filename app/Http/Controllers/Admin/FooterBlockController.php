<?php

namespace Thd\Http\Controllers\Admin;

use Thd\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Thd\FooterBlock;

class FooterBlockController extends Controller
{
  public function index()
  {
    $blocks = FooterBlock::with('footer_items')->get();

    return view('admin.footer-blocks.index', [
      'blocks' => $blocks
    ]);
  }

  public function update(FooterBlock $block, Request $request)
  {
    $block->name = $request->input('name');
    $block->update();

    return [
      'status' => 'ok',
      'id' => $block->id,
      'name' => $request->input('name')
    ];
  }
}
