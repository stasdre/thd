<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Thd\TextContent;
use Validator;

class HomePageController extends Controller
{
    public function desktopDream(Request $request)
    {
        $data = TextContent::findOrFail(1);

        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'title' => 'max:190',
            ]);

            if ($validator->fails()) {
                return redirect(route('home-page.desktop-dream'))
                    ->withErrors($validator)
                    ->withInput();
            }else{
                $data->title = $request->input('title');
                $data->description = $request->input('description');
                $data->update();

                return redirect()->route('home-page.desktop-dream')
                    ->with('message', [
                        'type'=>'success',
                        'title'=>'Success!',
                        'message'=>'Data was updated',
                        'autoHide'=>1]);
            }

        }else{
            return view('admin.home-page.desktop-dream')->with('data', $data);
        }
    }

    public function mobile()
    {

    }
}
