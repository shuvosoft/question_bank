<?php

namespace App\Http\Controllers\Admin;

use App\Time;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $x_times = Time::latest()->get();
        return view('admin.time.index', compact('x_times'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.time.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'time' => 'required'
        ]);
        $time = new Time();
        $time->time = $request->time;
        $time->save();
        Toastr::success('Time Successfully Added :)', 'Success');
        return redirect()->route('admin.time.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $time = Time::find($id);
        return view('admin.time.edit', compact('time'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'time' => 'required'
        ]);
        $time = Time::find($id);
        $time->time = $request->time;
        $time->save();
        Toastr::success('Time Successfully updated :)', 'Success');
        return redirect()->route('admin.time.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $time = Time::find($id)->delete();
        Toastr::success('Time Successfully deleted :)', 'Success');
        return redirect()->route('admin.time.index');
    }
}

