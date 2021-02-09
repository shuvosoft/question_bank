<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Subadmin;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Auth::user()->posts()->latest()->Unpublished()->get();
        return view('subadmin.home',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $pass=$request->input('password');
            $addSub = Subadmin::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' =>bcrypt($pass),
        ]);
        Toastr::success('Admin Successfully Add ','Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function show(Subadmin $subadmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function edit(Subadmin $subadmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subadmin $subadmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subadmin $subadmin)
    {
        //
    }

    // public function addSubAdminFilled(Request $request){
    //     $addSub = Subadmin::create([
    //         'name' => $request->input('name'),
    //         'username' => $request->input('username'),
    //         'email' => $request->input('email'),
    //         'password' => $request->input('password'),
    //     ]);
    //     return die('fine');
    // }
}
