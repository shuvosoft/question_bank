<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubAdminAdd extends Controller
{
    public function addSubAdmin(){
    	return view('admin.subAdmin.subAdminAdd');
    }
}
