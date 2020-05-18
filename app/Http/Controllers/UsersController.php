<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserPassRequest;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\AdminAccount;
use DB;

class UsersController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:user-list|user-admin-create|user-admin-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-admin-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-admin-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $model=User::all();
        return view('users.index', ['users' => $model]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
		$roles = Role::pluck('name','name')->all();
        return view('users.admin.create',compact('roles'));
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        DB::beginTransaction();
        $admin=new AdminAccount;
        $admin->save();
        $user =$model->create($request->merge(['password' => Hash::make($request->get('password')),'userable_type' => 'App\\AdminAccount','userable_id'=>$admin->id,'api_token' => Str::random(60)])->all());
        $user->assignRole($request->input('roles'));
        DB::commit();
        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.admin.show',compact('user'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
		$roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.admin.edit', compact('user','roles','userRole'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User  $user)
    {
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->save();
		DB::table('model_has_roles')->where('model_id',$user->id)->delete();
		$user->assignRole($request->input('roles'));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }
    public function updatePassword(UserPassRequest $request, User  $user)
    {
        $user->password=Hash::make($request->get('password'));
        $user->save();
        return redirect()->route('user.index')->withStatus(__('password successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
