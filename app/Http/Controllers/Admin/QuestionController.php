<?php

namespace App\Http\Controllers\Admin;

use App\Mainquestion;
use App\Mark;
use App\Question;
use App\Section;
use App\Semester;
use App\Subject;
use App\Term;
use App\Time;
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
        $m_questions = Mainquestion::latest()->Published()->get();
        return view('admin.all_question.index',compact('m_questions'));
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
        return view('admin.all_question.create', compact('subjects','semesters','terms','sections','marks','times'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


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

        return view('admin.all_question.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
