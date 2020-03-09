<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $imgPath = parse_url(str_replace("/storage", "", $request->post('src')));

        $img = Image::make($request->image);
        $img->save(storage_path('app/public' . $imgPath['path']), 100);

        return response()->json([
            'success' => 'ok',
            'path' => $imgPath['path'],
            'size' => $img->filesize(),
            'fileName' => basename($request->post('src'))
        ], 200);
    }
}
