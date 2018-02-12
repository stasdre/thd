<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\AboutDavid;
use Validator;
use Thd\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AboutDavidController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = AboutDavid::findOrFail(1);
        return view('admin.about-david.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = AboutDavid::findOrFail(1);

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:190',
            'photo' => 'mimetypes:image/jpeg,image/png,image/bmp,image/gif'
        ]);

        if ($validator->fails()) {
            return redirect(route('about-david.edit'))
                ->withErrors($validator)
                ->withInput();
        }

        if($request->file('photo')){
            $file = $request->file('photo');
            $filename  = str_random(40) . '.' . $file->getClientOriginalExtension();
            $pathThumb = storage_path('app/public/about/' . $filename);

            $imgThumb = Image::make($file->getRealPath());
            $imgThumb->resize(636, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imgThumb->save($pathThumb);

            //Storage::putFileAs('public/about/', $file, $filename);

            if($data->photo)
                Storage::delete('public/about/'.$data->photo);

            $data->photo = $filename;
        }

        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $data->url = $request->input('url');

        $data->update();

        return redirect()->route('about-david.edit')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>'Data was updated',
                'autoHide'=>1]);
    }
}
