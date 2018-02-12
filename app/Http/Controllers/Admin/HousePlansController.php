<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Thd\Collection;
use Thd\Http\Controllers\Controller;

use Thd\Http\Requests\PlansRequest;
use Thd\Style;
use Thd\Plan;

class HousePlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.house-plan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $styles = Style::orderBy('name')->pluck('name', 'id');
        $collections = Collection::orderBy('name')->pluck('name', 'id');

        return view('admin.house-plan.create')
            ->with('styles', $styles)
            ->with('collections', $collections);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlansRequest $request)
    {
        $dataPlan = $request->except(['_token', 'style_id', 'collection_id']);
        $stylesData = $request->get('style_id');
        $collectionsData = $request->get('collection_id');

        try {
            DB::beginTransaction();

            $plan = new Plan();
            $plan->user()->associate(Auth::user());
            $plan->fill($dataPlan);
            $plan->save();

            $plan->styles()->attach(array_flatten($stylesData));
            $plan->collections()->attach(array_flatten($collectionsData));

            DB::commit();
        }catch(\Exception $e){
            DB::rollback();

            throw $e;
        }

        Storage::makeDirectory('public/plans/'.$plan->id);
        Storage::makeDirectory('public/plans/' . $plan->id . '/thumb');

        return redirect()->route('plan-info.create', ['id'=>$plan->id])
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$plan->name.' was added',
                'autoHide'=>1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $house_plan)
    {
        $styles = Style::orderBy('name')->pluck('name', 'id');
        $collections = Collection::orderBy('name')->pluck('name', 'id');

        //$house_plan->loadMissing('styles');
        //print_r($house_plan->styles);
        return view('admin.house-plan.edit', [
            'plan'=>$house_plan,
            'styles'=>$styles,
            'collections'=>$collections
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlansRequest $request, Plan $house_plan)
    {
        $inputs = $request->except(['_method', '_token', 'style_id', 'collection_id']);

        $house_plan->fill($inputs);
        $house_plan->update();

        $house_plan->styles()->sync($request->input('style_id'));
        $house_plan->collections()->sync($request->input('collection_id'));

        return redirect()->route('house-plan.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$house_plan->name.' was updated',
                'autoHide'=>1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
