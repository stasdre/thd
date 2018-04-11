<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Thd\Http\Controllers\Controller;
use Thd\Http\Requests\UserRequest;
use Thd\Role;

use PragmaRX\Countries\Package\Countries;
use Thd\User;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $userAuth = Auth::user();
        $roles = Role::orderBy('display_name')->pluck('display_name', 'id')->toArray();

        if(!$userAuth->hasRole('owner')){
            unset($roles[1]);
        }elseif(!$userAuth->hasRole('admin')){
            unset($roles[2]);
        }

        $user->load('roles');

        $countries = new Countries();

        return view('admin.user.edit', [
            'user'=>$user,
            'roles' => $roles,
            'selected_role' => $user->roles[0]->id,
            'countries' => $countries->all()->sortBy('name.common')->pluck('name.common', 'iso_a3'),
            'states' => $countries->where('cca3', old('country') ? old('country') : $user->country)->first()->hydrateStates()->states->pluck('name', 'postal')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $inputs = $request->except('_token', 'role_user');

        $user->fill($inputs);
        $user->update();

        $user->roles()->sync([$request->input('role_user')]);

        return redirect()->route('user.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$user->name.' was updated',
                'autoHide'=>1]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$user->name.' was deleted',
                'autoHide'=>1]);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $users = User::with('roles')->select('users.*');
        return Datatables::of($users)
            ->addColumn('actions', function($user){
                return '<a class="btn btn-info btn-sm" href="'.route('user.edit', ['user'=>$user->id]).'" role="button">Edit</a> <form style="display: inline-block" action="'.route('user.destroy', ['user'=>$user->id]).'" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="'.csrf_token().'"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
            })
            ->addColumn('role', function (User $user) {
                return $user->roles->map(function($role) {
                    return $role->display_name;
                })->implode('<br>');
            })
            ->rawColumns(['role', 'actions'])
            ->make(true);
    }

}
