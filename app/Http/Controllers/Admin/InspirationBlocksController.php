<?php

namespace Thd\Http\Controllers\Admin;

use Thd\InspirationBloks;
use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Storage;

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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = InspirationBloks::findOrFail(1);

        $validator = Validator::make($request->all(), [
            'img_l_t' => 'nullable|image|dimensions:min_width=450,min_height=350',
            'img_r_t' => 'nullable|image|dimensions:min_width=450,min_height=350',
            'img_b_l' => 'nullable|image|dimensions:min_width=450,min_height=350',
            'img_b_r' => 'nullable|image|dimensions:min_width=450,min_height=350',

            'link_name_l_t'=>'required_with:link_l_t',
            'link_l_t'=>'required_with:link_name_l_t',

            'link_name_r_t'=>'required_with:link_r_t',
            'link_r_t'=>'required_with:link_name_r_t',

            'link_name_b_l'=>'required_with:link_b_l',
            'link_b_l'=>'required_with:link_name_b_l',

            'link_name_b_r'=>'required_with:link_b_r',
            'link_b_r'=>'required_with:link_name_b_r',
        ]);

        if ($validator->fails()) {
            return redirect(route('inspiration-blocks.edit'))
                ->withErrors($validator)
                ->withInput();
        }  
        
        $dataRequest = $request->except(['_token', '_method']);        

        if ($request->file('img_l_t')) {
            $img_l_t = uploadFile($request->file('img_l_t'), [
                'dir' => 'inspiration-blocks',
                'width' => 450,
                'height' => null,
                'quality' => 90,
                'thumb_width' => 210,
                'thumb_height' => null
            ]);
            $dataRequest['img_l_t'] = $img_l_t;

            if($data->img_l_t){
                Storage::delete('public/inspiration-blocks/' . $data->img_l_t);
                Storage::delete('public/inspiration-blocks/thumb/' . $data->img_l_t);
                Storage::delete('public/inspiration-blocks/original/' . $data->img_l_t);
            }
        }

        if ($request->file('img_r_t')) {
            $img_r_t = uploadFile($request->file('img_r_t'), [
                'dir' => 'inspiration-blocks',
                'width' => 450,
                'height' => null,
                'quality' => 90,
                'thumb_width' => 210,
                'thumb_height' => null
            ]);
            $dataRequest['img_r_t'] = $img_r_t;

            if($data->img_r_t){
                Storage::delete('public/inspiration-blocks/' . $data->img_r_t);
                Storage::delete('public/inspiration-blocks/thumb/' . $data->img_r_t);
                Storage::delete('public/inspiration-blocks/original/' . $data->img_r_t);
            }
        }

        if ($request->file('img_b_l')) {
            $img_b_l = uploadFile($request->file('img_b_l'), [
                'dir' => 'inspiration-blocks',
                'width' => 450,
                'height' => null,
                'quality' => 90,
                'thumb_width' => 210,
                'thumb_height' => null
            ]);
            $dataRequest['img_b_l'] = $img_b_l;

            if($data->img_b_l){
                Storage::delete('public/inspiration-blocks/' . $data->img_b_l);
                Storage::delete('public/inspiration-blocks/thumb/' . $data->img_b_l);
                Storage::delete('public/inspiration-blocks/original/' . $data->img_b_l);
            }
        }

        if ($request->file('img_b_r')) {
            $img_b_r = uploadFile($request->file('img_b_r'), [
                'dir' => 'inspiration-blocks',
                'width' => 450,
                'height' => null,
                'quality' => 90,
                'thumb_width' => 210,
                'thumb_height' => null
            ]);
            $dataRequest['img_b_r'] = $img_b_r;

            if($data->img_b_r){
                Storage::delete('public/inspiration-blocks/' . $data->img_b_r);
                Storage::delete('public/inspiration-blocks/thumb/' . $data->img_b_r);
                Storage::delete('public/inspiration-blocks/original/' . $data->img_b_r);
            }
        }

        $data->update($dataRequest);

        return redirect()->route('inspiration-blocks.edit')
            ->with('message', [
                'type' => 'success',
                'title' => 'Success!',
                'message' => 'Blocks was updated',
                'autoHide' => 1
            ]);
    }
}
