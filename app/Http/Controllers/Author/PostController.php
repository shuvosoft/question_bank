<?php

namespace App\Http\Controllers\Author;

use App\Mark;
use App\Post;
use App\Section;
use App\Semester;
use App\Subject;
use App\Term;
use App\Time;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Auth::user()->posts()->latest()->Unpublished()->get();
        return view('author.question.index',compact('questions'));
    }

   public function public()
    {
        $questions = Auth::user()->posts()->latest()->published()->get();
        return view('author.question.public',compact('questions'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        $semesters = Semester::all();
        $terms = Term::all();
        $sections = Section::all();
        $marks = Mark::all();
        $times = Time::all();
        return view('author.question.create', compact('subjects','semesters','terms','sections','marks','times'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'     => 'required',
            'semesters' => 'required',
            'subjects'  => 'required',
            'terms'     => 'required',
            'sections'  => 'required',
            'marks'     => 'required',
            'times'     => 'required',
            'body'      => 'required',
        ]);
        $question          =  new Post();
        $question->user_id =  Auth::id();
        $question->title   =  $request->title;
        $question->slug    =  str_slug($request->title);
        $question->body    =  $request->body;

        if (isset($request->status)) {
            $question->status = true;

        }else{
            $question->status = false;
        }
        $question->save();
        $question->semesters()->attach($request->semesters);
        $question->subjects()->attach($request->subjects);
        $question->terms()->attach($request->terms);
        $question->sections()->attach($request->sections);
        $question->marks()->attach($request->marks);
        $question->times()->attach($request->times);

        Toastr::success('Question Successfully Saved :)','Success');
        return redirect()->route('author.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Post::find($id);
        if ($question->user_id !=  Auth::id())
        {
            Toastr::error('You are not authorized to access this post','Error');
            return redirect()->back();
        }
        return view('author.question.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $question = Post::find($id);
        if ($question->user_id !=  Auth::id())
        {
            Toastr::error('You are not authorized to access this post','Error');
            return redirect()->back();
        }
        $subjects = Subject::all();
        $semesters = Semester::all();
        $terms = Term::all();
        $sections = Section::all();
        $marks = Mark::all();
        $times = Time::all();
        return view('author.question.edit',compact('question','subjects','semesters','terms',
            'sections','marks','times'));
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
        $this->validate($request,[
            'title'     => 'required',
            'semesters' => 'required',
            'subjects'  => 'required',
            'terms'     => 'required',
            'sections'  => 'required',
            'marks'     => 'required',
            'times'     => 'required',
            'body'      => 'required',
        ]);
        $question          =  Post::find($id);

        $question->user_id =  Auth::id();
        $question->title   =  $request->title;
        $question->slug    =  str_slug($request->title);
        $question->body    =  $request->body;

        if (isset($request->status)) {
            $question->status = true;

        }else{
            $question->status = false;
        }
        $question->save();
        $question->semesters()->sync($request->semesters);
        $question->subjects()->sync($request->subjects);
        $question->terms()->sync($request->terms);
        $question->sections()->sync($request->sections);
        $question->marks()->sync($request->marks);
        $question->times()->sync($request->times);

        Toastr::success('Question Successfully Updated :)','Success');
        return redirect()->route('author.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Post::find($id);
        if ($question->user_id !=  Auth::id())
        {
            Toastr::error('You are not authorized to access this post','Error');
            return redirect()->back();
        }
        $question->subjects()->detach();
        $question->semesters()->detach();
        $question->terms()->detach();
        $question->sections()->detach();
        $question->marks()->detach();
        $question->times()->detach();
        $question->delete();
        Toastr::success('Question Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
