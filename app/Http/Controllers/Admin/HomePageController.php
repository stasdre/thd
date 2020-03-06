<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Thd\DesktopBest;
use Thd\DesktopFavorite;
use Thd\Http\Controllers\Controller;
use Thd\MobileBest;
use Thd\TextContent;
use Validator;
use Intervention\Image\Facades\Image;

class HomePageController extends Controller
{
    public function desktopDream(Request $request)
    {
        $data = TextContent::findOrFail(1);

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'title' => 'max:190',
            ]);

            if ($validator->fails()) {
                return redirect(route('home-page.desktop-dream'))
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $data->title = $request->input('title');
                $data->description = $request->input('description');
                $data->update();

                return redirect()->route('home-page.desktop-dream')
                    ->with('message', [
                        'type' => 'success',
                        'title' => 'Success!',
                        'message' => 'Data was updated',
                        'autoHide' => 1
                    ]);
            }
        } else {
            return view('admin.home-page.desktop-dream')->with('data', $data);
        }
    }

    public function desktopBest(Request $request)
    {
        $data = DesktopBest::findOrFail(1);

        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'main_title' => 'max:190',
                'first_title' => 'max:190',
                'second_title' => 'max:190',
                'third_title' => 'max:190',
                'main_plan' => 'max:190',
                'first_plan' => 'max:190',
                'second_plan' => 'max:190',
                'third_plan' => 'max:190',
                'main_link' => 'max:190',
                'first_link' => 'max:190',
                'second_link' => 'max:190',
                'third_link' => 'max:190',
                'main_file' => 'mimetypes:image/jpeg,image/png,image/bmp,image/gif',
                'first_file' => 'mimetypes:image/jpeg,image/png,image/bmp,image/gif',
                'second_file' => 'mimetypes:image/jpeg,image/png,image/bmp,image/gif',
                'third_file' => 'mimetypes:image/jpeg,image/png,image/bmp,image/gif'
            ]);

            if ($validator->fails()) {
                return redirect(route('home-page.desktop-best'))
                    ->withErrors($validator)
                    ->withInput();
            } else {
                if ($request->file('main_file')) {
                    $image = $request->file('main_file');
                    $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
                    $path = storage_path('app/public/home-page/' . $filename);

                    $img = Image::make($image->getRealPath());
                    $img->resize(1200, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save($path, 90);

                    Storage::delete('public/home-page/' . $data->main_file);

                    $data->main_file = $filename;
                }

                if ($request->file('first_file')) {
                    $image = $request->file('first_file');
                    $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
                    $path = storage_path('app/public/home-page/' . $filename);

                    $img = Image::make($image->getRealPath());
                    $img->resize(null, 220, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save($path, 90);

                    Storage::delete('public/home-page/' . $data->main_file);

                    $data->first_file = $filename;
                }

                if ($request->file('second_file')) {
                    $image = $request->file('second_file');
                    $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
                    $path = storage_path('app/public/home-page/' . $filename);

                    $img = Image::make($image->getRealPath());
                    $img->resize(null, 220, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save($path, 90);

                    Storage::delete('public/home-page/' . $data->main_file);

                    $data->second_file = $filename;
                }

                if ($request->file('third_file')) {
                    $image = $request->file('third_file');
                    $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
                    $path = storage_path('app/public/home-page/' . $filename);

                    $img = Image::make($image->getRealPath());
                    $img->resize(null, 220, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save($path, 90);

                    Storage::delete('public/home-page/' . $data->main_file);

                    $data->third_file = $filename;
                }

                $data->main_title = $request->input('main_title');
                $data->main_desc = $request->input('main_desc');
                $data->main_plan = $request->input('main_plan');
                $data->main_link = $request->input('main_link');
                $data->main_plan_link = $request->input('main_plan_link');

                $data->first_type = $request->input('first_type');
                $data->first_title = $request->input('first_title');
                $data->first_desc = $request->input('first_desc');
                $data->first_plan = $request->input('first_plan');
                $data->first_link = $request->input('first_link');
                $data->first_plan_link = $request->input('first_plan_link');

                $data->second_type = $request->input('second_type');
                $data->second_title = $request->input('second_title');
                $data->second_desc = $request->input('second_desc');
                $data->second_plan = $request->input('second_plan');
                $data->second_link = $request->input('second_link');
                $data->second_plan_link = $request->input('second_plan_link');

                $data->third_type = $request->input('third_type');
                $data->third_title = $request->input('third_title');
                $data->third_desc = $request->input('third_desc');
                $data->third_plan = $request->input('third_plan');
                $data->third_link = $request->input('third_link');
                $data->third_plan_link = $request->input('third_plan_link');

                $data->update();

                return redirect()->route('home-page.desktop-best')
                    ->with('message', [
                        'type' => 'success',
                        'title' => 'Success!',
                        'message' => 'Data was updated',
                        'autoHide' => 1
                    ]);
            }
        } else {
            return view('admin.home-page.desktop-best')->with('data', $data);
        }
    }

    public function desktopFavorite(Request $request)
    {
        $data = DesktopFavorite::findOrFail(1);

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'first_title' => 'max:190',
                'second_title' => 'max:190',
                'third_title' => 'max:190',
                'fourth_title' => 'max:190',
                'first_link_text' => 'max:190',
                'second_link_text' => 'max:190',
                'third_link_text' => 'max:190',
                'fourth_link_text' => 'max:190',
                'first_link' => 'max:190',
                'second_link' => 'max:190',
                'third_link' => 'max:190',
                'fourth_link' => 'max:190',
                'first_file' => 'mimetypes:image/jpeg,image/png,image/bmp,image/gif',
                'second_file' => 'mimetypes:image/jpeg,image/png,image/bmp,image/gif',
                'third_file' => 'mimetypes:image/jpeg,image/png,image/bmp,image/gif',
                'fourth_file' => 'mimetypes:image/jpeg,image/png,image/bmp,image/gif'
            ]);

            if ($validator->fails()) {
                return redirect(route('home-page.desktop-favorite'))
                    ->withErrors($validator)
                    ->withInput();
            } else {

                if ($request->file('first_file')) {
                    $image = $request->file('first_file');
                    $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
                    $path = storage_path('app/public/home-page/' . $filename);

                    $img = Image::make($image->getRealPath());
                    $img->resize(270, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save($path, 90);

                    Storage::delete('public/home-page/' . $data->main_file);

                    $data->first_file = $filename;
                }

                if ($request->file('second_file')) {
                    $image = $request->file('second_file');
                    $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
                    $path = storage_path('app/public/home-page/' . $filename);

                    $img = Image::make($image->getRealPath());
                    $img->resize(270, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save($path, 90);

                    Storage::delete('public/home-page/' . $data->main_file);

                    $data->second_file = $filename;
                }

                if ($request->file('third_file')) {
                    $image = $request->file('third_file');
                    $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
                    $path = storage_path('app/public/home-page/' . $filename);

                    $img = Image::make($image->getRealPath());
                    $img->resize(270, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save($path, 90);

                    Storage::delete('public/home-page/' . $data->main_file);

                    $data->third_file = $filename;
                }

                if ($request->file('fourth_file')) {
                    $image = $request->file('fourth_file');
                    $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
                    $path = storage_path('app/public/home-page/' . $filename);

                    $img = Image::make($image->getRealPath());
                    $img->resize(270, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save($path, 90);

                    Storage::delete('public/home-page/' . $data->main_file);

                    $data->fourth_file = $filename;
                }

                $data->first_title = $request->input('first_title');
                $data->first_desc = $request->input('first_desc');
                $data->first_link_text = $request->input('first_link_text');
                $data->first_link = $request->input('first_link');
                $data->first_plan_link = $request->input('first_plan_link');

                $data->second_title = $request->input('second_title');
                $data->second_desc = $request->input('second_desc');
                $data->second_link_text = $request->input('second_link_text');
                $data->second_link = $request->input('second_link');
                $data->second_plan_link = $request->input('second_plan_link');

                $data->third_title = $request->input('third_title');
                $data->third_desc = $request->input('third_desc');
                $data->third_link_text = $request->input('third_link_text');
                $data->third_link = $request->input('third_link');
                $data->third_plan_link = $request->input('third_plan_link');

                $data->fourth_title = $request->input('fourth_title');
                $data->fourth_desc = $request->input('fourth_desc');
                $data->fourth_link_text = $request->input('fourth_link_text');
                $data->fourth_link = $request->input('fourth_link');
                $data->fourth_plan_link = $request->input('fourth_plan_link');

                $data->update();

                return redirect()->route('home-page.desktop-favorite')
                    ->with('message', [
                        'type' => 'success',
                        'title' => 'Success!',
                        'message' => 'Data was updated',
                        'autoHide' => 1
                    ]);
            }
        } else {
            return view('admin.home-page.desktop-favorite')->with('data', $data);
        }
    }

    public function mobileDream(Request $request)
    {
        $data = TextContent::findOrFail(2);

        if ($request->isMethod('post')) {

            $data->description = $request->input('description');
            $data->update();

            return redirect()->route('home-page.mobile-dream')
                ->with('message', [
                    'type' => 'success',
                    'title' => 'Success!',
                    'message' => 'Data was updated',
                    'autoHide' => 1
                ]);
        } else {
            return view('admin.home-page.mobile-dream')->with('data', $data);
        }
    }

    public function mobileBest(Request $request)
    {
        $data = MobileBest::findOrFail(1);

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'max:190',
                'url' => 'max:190',
                'file' => 'mimetypes:image/jpeg,image/jpg,image/png,image/bmp,image/gif',
            ]);

            if ($validator->fails()) {
                return redirect(route('home-page.mobile-best'))
                    ->withErrors($validator)
                    ->withInput();
            } else {
                if ($request->file('file')) {
                    $image = $request->file('file');
                    $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
                    $path = storage_path('app/public/home-page/' . $filename);

                    $img = Image::make($image->getRealPath());
                    $img->resize(277, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save($path, 90);

                    Storage::delete('public/home-page/' . $data->file);

                    $data->file = $filename;
                }

                $data->name = $request->input('name');
                $data->url = $request->input('url');
                $data->update();

                return redirect()->route('home-page.mobile-best')
                    ->with('message', [
                        'type' => 'success',
                        'title' => 'Success!',
                        'message' => 'Data was updated',
                        'autoHide' => 1
                    ]);
            }
        } else {
            return view('admin.home-page.mobile-best')->with('data', $data);
        }
    }
}
