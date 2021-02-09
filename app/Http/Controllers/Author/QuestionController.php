<?php

namespace App\Http\Controllers\Author;

use App\Mainquestion;
use App\Mark;
use App\Question;
use App\Section;
use App\Semester;
use App\Subject;
use App\Term;
use App\Time;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $m_questions = Auth::user()->mainquestions()->latest()->Unpublished()->get();
        return view('author.all_question.index',compact('m_questions'));
    }

    public function public()
    {
        $m_questions = Auth::user()->mainquestions()->latest()->published()->get();
        return view('author.all_question.publics',compact('m_questions'));
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
        return view('author.all_question.create', compact('subjects','semesters','terms','sections','marks','times'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//return $request;

        $data = new Mainquestion();
        $data->user_id = Auth::id();
        $data->semester_id = $request->semester_id;
        $data->subject_id = $request->subject_id;
        $data->section_id = $request->section_id;
        $data->mark_id = $request->mark_id;
        $data->term_id = $request->term_id;
        $data->time_id = $request->time_id;
        if (isset($request->status)){
            $data->status = true;
        }else{
            $data->status = false;
        }
//        $id=$data->save();

        if($data->save()){
            $id = $data->id;
            foreach ($request->q_no as $key=>$v){
                $Q_data =array('mainquestion_id'=> $id,

                    'q_no'=>$request->q_no[$key],
                    'body'=>$request->body[$key],
                    'q_mark'=>$request->q_mark[$key],

                );
                Question::insert($Q_data);
            }
        }

        Toastr::success('Question Successfully Saved :)','Success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Mainquestion::find($id);

        return view('author.all_question.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $question = Mainquestion::find($id);
        $subjects = Subject::all();
        $semesters = Semester::all();
        $terms = Term::all();
        $sections = Section::all();
        $marks = Mark::all();
        $times = Time::all();

        return view('author.all_question.edit',compact('question','subjects','semesters','terms','sections','marks','times'));
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
        $data = Mainquestion::find($id);
        $data->user_id = Auth::id();
        $data->semester_id = $request->semester_id;
        $data->subject_id = $request->subject_id;
        $data->section_id = $request->section_id;
        $data->mark_id = $request->mark_id;
        $data->term_id = $request->term_id;
        $data->time_id = $request->time_id;
        if (isset($request->status)){
            $data->status = true;
        }else{
            $data->status = false;
        }
//        $id=$data->save();

        if($data->save()){
            $id = $data->id;
            foreach ($request->q_no as $key=>$v){

                $Q_data =array('mainquestion_id'=> $id,

                    'q_no'=>$request->q_no[$key],
                    'body'=>$request->body[$key],
                    'q_mark'=>$request->q_mark[$key],

                );
                $Q_data = Question::find($id);
                $Q_data->save();

//                Question::updated($Q_data);
//                $question->$Q_data[] = $request->$Q_data;
//                $question->save();

            }
        }

        Toastr::success('Question Successfully Saved :)','Success');

        return redirect()->route('author.question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
