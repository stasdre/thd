<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Thd\AboutDavid;
use Thd\Collection;
use Thd\DesktopBest;
use Thd\DesktopFavorite;
use Thd\Gallery;
use Thd\MobileBest;
use Thd\MobileFavorite;
use Thd\MobileNew;
use Thd\Style;
use Thd\TextContent;
use Jenssegers\Agent\Agent;
use Thd\MobileGallery;


class HomeController extends Controller
{
  /**
   * Show the index page.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $agent = new Agent();

    $styles = Style::where('in_filter', 1)->where('is_active', 1)->orderBy('short_name', 'asc')->limit(18)->get();
    $collections = Collection::where('in_filter', 1)->where('is_active', 1)->orderBy('short_name', 'asc')->limit(18)->get();
    $aboutData = AboutDavid::find(1);
    $descDesctop = TextContent::find(1);
    $deckBest = DesktopBest::find(1);
    $deskFavor = DesktopFavorite::find(1);

    if ($agent->isMobile()) {
      $deskMob = TextContent::find(2);
      $favorMob = MobileFavorite::all();
      $newMob = MobileNew::all();
      $bestMob = MobileBest::find(1);
      $gallery = MobileGallery::all();
    } else {
      $deskMob = null;
      $favorMob = null;
      $newMob = null;
      $bestMob = null;
      $gallery = Gallery::orderBy('order', 'asc')->get();
    }
    //dd($aboutData);
    return view('home', [
      'gallery' => $gallery,
      'aboutData' => $aboutData,
      'styles' => $styles,
      'collections' => $collections,
      'descDesctop' => $descDesctop,
      'deckBest' => $deckBest,
      'deskFavor' => $deskFavor,
      'deskMob' => $deskMob,
      'favorMob' => $favorMob,
      'newMob' => $newMob,
      'bestMob' => $bestMob
    ]);
  }
}
