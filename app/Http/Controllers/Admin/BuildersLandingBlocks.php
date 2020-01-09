<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\BuilderLandingBlock;
use Thd\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Storage;

class BuildersLandingBlocks extends Controller
{
  public function index()
  {
    $data = BuilderLandingBlock::findOrFail(1);
    return view('admin.builders-landing-blocks.index')->with('data', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {
    $data = BuilderLandingBlock::findOrFail(1);

    $validator = Validator::make($request->all(), [
      'img_l' => 'nullable|image|dimensions:min_width=483,min_height=388',
      'img_r' => 'nullable|image|dimensions:min_width=483,min_height=388',

      'link_name_l' => 'required_with:link_l',
      'link_l' => 'required_with:link_name_l',

      'link_name_r' => 'required_with:link_r',
      'link_r' => 'required_with:link_name_r',
    ]);

    if ($validator->fails()) {
      return redirect(route('builder-landing-blocks.edit'))
        ->withErrors($validator)
        ->withInput();
    }

    $dataRequest = $request->except(['_token', '_method']);

    if ($request->file('img_l')) {
      $img_l = uploadFile($request->file('img_l'), [
        'dir' => 'builders',
        'width' => 483,
        'height' => 388,
        'quality' => 90,
        'thumb_width' => 250,
        'thumb_height' => 250
      ]);
      $dataRequest['img_l'] = $img_l;

      if ($data->img_l) {
        Storage::delete('public/builders/' . $data->img_l);
        Storage::delete('public/builders/thumb/' . $data->img_l);
        Storage::delete('public/builders/original/' . $data->img_l);
      }
    }

    if ($request->file('img_r')) {
      $img_r = uploadFile($request->file('img_r'), [
        'dir' => 'builders',
        'width' => 483,
        'height' => 388,
        'quality' => 90,
        'thumb_width' => 250,
        'thumb_height' => 250
      ]);
      $dataRequest['img_r'] = $img_r;

      if ($data->img_r) {
        Storage::delete('public/builders/' . $data->img_r);
        Storage::delete('public/builders/thumb/' . $data->img_r);
        Storage::delete('public/builders/original/' . $data->img_r);
      }
    }

    $data->update($dataRequest);

    return redirect()->route('builder-landing-blocks.edit')
      ->with('message', [
        'type' => 'success',
        'title' => 'Success!',
        'message' => 'Blocks was updated',
        'autoHide' => 1
      ]);
  }
}
