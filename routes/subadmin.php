<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('subadmin')->user();

    //dd($users);

    return view('subadmin.home');
})->name('home');

