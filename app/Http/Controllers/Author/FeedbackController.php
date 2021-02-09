<?php

namespace App\Http\Controllers\Author;

use App\Feedback;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
//    public function index()
//    {
//        $questions = Auth::user()->posts;
//        return view('author.feedBack',compact('questions'));
//    }
    public function index()
    {

//        $feedBacks = Auth::user()->posts()->latest()->get();
        $posts = Auth::user()->posts;
        return view('author.feedBack',compact('posts'));
    }

    public function destroy($id){
        $feedBack = Feedback::findOrFail($id)->delete();
        Toastr::success('FeedBack Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
