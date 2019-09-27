<?php

namespace Thd\Http\Controllers\Admin;

use Thd\InspirationBloks;
use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;

class InspirationBlocksController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Thd\InspirationBloks  $inspirationBloks
     * @return \Illuminate\Http\Response
     */
    public function edit(InspirationBloks $inspirationBloks)
    {
        $data = InspirationBloks::findOrFail(1);
        return view('admin.inspiration-blocks.edit')->with('data', $data);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Thd\InspirationBloks  $inspirationBloks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InspirationBloks $inspirationBloks)
    {
        //
    }
}
