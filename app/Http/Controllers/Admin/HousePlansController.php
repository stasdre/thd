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
use Thd\User;

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
        $styles = Style::orderBy('name')->get();
        $collections = Collection::orderBy('name')->get();
        $designAdmin = User::withRole('designer')->get()->pluck('full_name_width_email', 'id');
        $designPartner = User::withRole('designer_partner')->get()->pluck('full_name_width_email', 'id');

        return view('admin.house-plan.create')
            ->with('styles', $styles)
            ->with('collections', $collections)
            ->with('designAdmin', $designAdmin)
            ->with('designPartner', $designPartner);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlansRequest $request)
    {
        $dataPlan = $request->except('_method', '_token', 'style_id', 'collection_id');
        $dataPlan['designer_id'] = $request->input('designer') == 'designer' ? $request->input('designer_admin') : $request->input('designer_partner');
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

        if( $request->input('redirect') == 'next' ){
            return redirect()->route('plan-images.create', ['id'=>$plan->id])
                ->with('message', [
                    'type'=>'success',
                    'title'=>'Success!',
                    'message'=>$plan->name.' was added',
                    'autoHide'=>1]);
        }else{
            return redirect()->route('house-plan.index')
                ->with('message', [
                    'type'=>'success',
                    'title'=>'Success!',
                    'message'=>$plan->name.' was added',
                    'autoHide'=>1]);
        }
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
        $styles = Style::orderBy('name')->get();
        $collections = Collection::orderBy('name')->get();
        $designAdmin = User::withRole('designer')->get()->pluck('full_name_width_email', 'id');
        $designPartner = User::withRole('designer_partner')->get()->pluck('full_name_width_email', 'id');

        return view('admin.house-plan.edit', [
            'plan'=>$house_plan,
            'styles'=>$styles,
            'collections'=>$collections,
            'designAdmin' => $designAdmin,
            'designPartner' => $designPartner
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
        $dataPlan = $request->except('_method', '_token', 'style_id', 'collection_id');
        $dataPlan['designer_id'] = $request->input('designer') == 'designer' ? $request->input('designer_admin') : $request->input('designer_partner');
        $stylesData = $request->get('style_id');
        $collectionsData = $request->get('collection_id');

        try {
            DB::beginTransaction();

            $house_plan->fill($dataPlan);
            $house_plan->update();

            $house_plan->styles()->sync(array_flatten($stylesData));
            $house_plan->collections()->sync(array_flatten($collectionsData));

            DB::commit();
        }catch(\Exception $e){
            DB::rollback();

            throw $e;
        }


        if( $request->input('redirect') == 'next' ){
            return redirect()->route('plan-images.create', ['id'=>$house_plan->id])
                ->with('message', [
                    'type'=>'success',
                    'title'=>'Success!',
                    'message'=>$house_plan->name.' was updated',
                    'autoHide'=>1]);
        }else{
            return redirect()->route('house-plan.index')
                ->with('message', [
                    'type'=>'success',
                    'title'=>'Success!',
                    'message'=>$house_plan->name.' was updated',
                    'autoHide'=>1]);
        }
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

    public function getPlanID($str)
    {
        $plans = Plan::where('name', 'like', '%'.$str.'%')
            ->orWhere('id', 'like', '%'.$str.'%')
            ->orWhere('plan_number', 'like', '%'.$str.'%')
            ->get();
        $responseData = [];
        if($plans){
            foreach ($plans as $plan){
                $responseData[] = [
                    'id' => $plan->plan_number,
                    'label' => $plan->plan_number.':'.$plan->name,
                    'value' => $plan->plan_number
                ];
            }
        }
        return response()->json($responseData);
    }

    public function publish(Plan $plan)
    {
        $plan->is_active = 1;
        $plan->update();

        return redirect()->back()
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$plan->name.' was published',
                'autoHide'=>1]);
    }

    public function unpublish(Plan $plan)
    {
        $plan->is_active = 0;
        $plan->update();

        return redirect()->back()
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$plan->name.' was published',
                'autoHide'=>1]);
    }
}
