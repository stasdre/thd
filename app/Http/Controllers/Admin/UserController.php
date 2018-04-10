<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Thd\Http\Controllers\Controller;
use Thd\Http\Requests\UserRequest;
use Thd\Role;

use PragmaRX\Countries\Package\Countries;
use Thd\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $roles = Role::orderBy('display_name')->pluck('display_name', 'id')->toArray();

        if(!$user->hasRole('owner')){
            unset($roles[1]);
        }elseif(!$user->hasRole('admin')){
            unset($roles[2]);
        }

        $countries = new Countries();

        return view('admin.user.create',[
            'roles' => $roles,
            'countries' => $countries->all()->sortBy('name.common')->pluck('name.common', 'iso_a3'),
            'states' => $countries->where('cca3', 'USA')->first()->hydrateStates()->states->pluck('name', 'postal')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $inputs = $request->except('_token', 'role_user');
        $inputs['password'] = bcrypt(str_random(8));
        dump($inputs);

        $user = new User();
        $user->fill($inputs);
        $user->save();

        $user->roles()->attach($request->input('role_user'));

        return redirect()->route('user.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$user->name.' was added',
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
