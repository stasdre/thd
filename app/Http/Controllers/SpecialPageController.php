<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Thd\AboutArticle;
use Thd\SpecialPage;

class SpecialPageController extends Controller
{
  public function about()
  {
    $data = SpecialPage::findOrFail('about-us');
    $articles = AboutArticle::all();

    return view('pages.about', [
      'data' => json_decode($data->data),
      'articles' => $articles
    ]);
  }
}
