<?php

namespace Thd\Http\Controllers\Admin;

use Thd\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Requests;
use Thd\FooterItem;
use Validator;

class FooterItemController extends Controller
{
  public function store(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'name' => 'required|max:190',
      'link' => 'required|max:190'
    ]);

    if ($validator->fails()) {
      return [
        'status' => 'error',
        'errors' => $validator->errors()
      ];
    }

    $dataRequest = $request->except(['_token']);

    $data = new FooterItem($dataRequest);
    $data->save();

    return [
      'status' => 'ok',
      'data' => $data
    ];
  }

  public function update(Request $request, FooterItem $footerItem)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required|max:190',
      'link' => 'required|max:190'
    ]);

    if ($validator->fails()) {
      return [
        'status' => 'error',
        'errors' => $validator->errors()
      ];
    }

    $dataRequest = $request->except(['_token', '_method']);

    $footerItem->update($dataRequest);

    return [
      'status' => 'ok',
      'data' => $footerItem
    ];
  }

  public function destroy(FooterItem $footerItem)
  {

    $footerItem->delete();

    return [
      'status' => 'ok',
      'data' => $footerItem
    ];
  }
}
