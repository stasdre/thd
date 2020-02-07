<?php

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

function uploadFile($file, $options)
{
  if (!file_exists(storage_path('app/public/' . $options['dir'] . '/'))) {
    Storage::makeDirectory('public/' . $options['dir']);
  }

  if (!file_exists(storage_path('app/public/' . $options['dir'] . '/thumb/'))) {
    Storage::makeDirectory('public/' . $options['dir'] . '/thumb');
  }

  $image = $file;
  $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
  $path = storage_path('app/public/' . $options['dir'] . '/' . $filename);

  $img = Image::make($image->getRealPath());
  $img->fit($options['width'], $options['height']);
  $img->save($path, $options['quality']);


  $pathThumb = storage_path('app/public/' . $options['dir'] . '/thumb/' . $filename);

  $imgThumb = Image::make($image->getRealPath());
  $imgThumb->fit($options['thumb_width'], $options['thumb_height']);
  $imgThumb->save($pathThumb);

  if (!file_exists(storage_path('app/public/' . $options['dir'] . '/original/'))) {
    Storage::makeDirectory('public/' . $options['dir'] . '/original');
  }

  $pathOriginal = storage_path('app/public/' . $options['dir'] . '/original/' . $filename);
  $imgOriginal = Image::make($image->getRealPath());
  $imgOriginal->save($pathOriginal, 100);

  return $filename;
}
