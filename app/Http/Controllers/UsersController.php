<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use DB;
use Session;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
//        $user = DB::table('users')->where('admin', 1)->get();
//        dd($users);
        return view('admin.users.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'email' => 'required',
           'name' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>bcrypt('password')
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/sazzad.jpg'
        ]);

        Session::flash('success', 'User Created Successfully');

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->profile->delete();
        $user->delete();

        Session::flash('success', 'User Deleted Successfully');

        return redirect()->back();
    }

    public function admin(User $user){

        $user->admin = 1;
        $user->save();

        Session::flash('success', 'Permission changed as a Admin');

        return redirect()->back();

    }

    public function not_admin(User $user){

        $user->admin = 0;
        $user->save();

        Session::flash('success', 'Permission changed as a General User');

        return redirect()->back();

    }



}
