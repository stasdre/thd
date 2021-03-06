<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Thd\Inspiration;
use Thd\InspirationBloks;
use Thd\InspirationProduct;
use Thd\InspirationSlider;

class InspirationController extends Controller
{

    private function _getMenuItems()
    {
        return Inspiration::select('name', 'link')->where('in_menu', '=', 1)->orderBy('order', 'asc')->get();
    }

    public function index()
    {
        $dataSlider = InspirationSlider::select()->orderBy('order', 'asc')->get();
        $dataBlocks = InspirationBloks::find(1);
        $dataProducts = InspirationProduct::all();
        
        return view('inspirations.index', [
            'menu' => $this->_getMenuItems(), 
            'sliders' => $dataSlider, 
            'blocks' => $dataBlocks,
            'products'=>$dataProducts
        ]);
    }

    public function pages($link)
    {

        $inspiration = Inspiration::where('link', $link);
        $data = $inspiration->firstOrFail();

        return view('inspirations.page', ['data' => $data, 'menu' => $this->_getMenuItems()]);
    }
}
