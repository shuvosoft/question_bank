<?php

namespace App\Http\Controllers\Author;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionLogicController extends Controller
{
    public function index(){
        $questions = Auth::user()->posts()->latest()->Published()->get();
        return view('author.question.publish_post',compact('questions'));
    }

    public function show($id)
    {
        $question = Post::find($id)->Unpublished();
        if ($question->user_id !=  Auth::id())
        {
            Toastr::error('You are not authorized to access this post','Error');
            return redirect()->back();
        }
        return view('author.question.show',compact('question'));
    }
}
