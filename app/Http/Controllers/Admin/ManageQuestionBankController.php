<?php

namespace App\Http\Controllers\Admin;

use App\FinalQuestion;
use App\FinalQuestionDetails;
use App\QuestionBank;
use App\QuestionBankDetails;
use App\Section;
use App\Subject;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageQuestionBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        $questions = QuestionBank::all();
        return view('admin.question_bank.index',compact('questions','subjects'));
    }

    public function reportSearch(Request $request){
        $q_set   = Section::all();
        $subject = $request->subject;
       $question = QuestionBank::select('question_banks.*','s.name') ->join('subjects as s','s.id','=','question_banks.subject_id')
                  -> where('question_banks.subject_id',$subject)
                  ->get();

         $q_subject = QuestionBank::select('s.id','s.name')
                    ->join('subjects as s','s.id','=','question_banks.subject_id')
                    -> where('question_banks.subject_id',$subject)
                    ->first();
        return view('admin.question_bank.manage_question',compact('question','q_set','q_subject'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $questions = FinalQuestion::select('final_questions.*','sub.name')
                    ->join('subjects as sub','sub.id','=','final_questions.subject_id')
                    ->get();
        return view('admin.allQuestion.index',compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new FinalQuestion();
        $data->q_set = $request->question_set ;
        $data->subject_id = $request->subject_id ;
        if($data->save()){
            $id = FinalQuestion::max('id');
            foreach ($request->main_question as $key=>$v){
                $Q_data =array('final_question_id'=> $id,
                    'question_no_id'=>$request->main_question[$key],
                );
                FinalQuestionDetails::insert($Q_data);
            }
        }
        Toastr::success('Successfully Saved :)','Success');

        return redirect()->route('admin.manageQuestionBank.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $question = FinalQuestionDetails::select('sub.name as sub_name', 'sub.code as sub_code', 'fq.q_set as q_set',
                    'fq.id as fq_id','qb.id as qb_id', 'qb.main_question as main_question',
                    'qb.question_mark as question_mark' )
                    ->join('final_questions as fq', 'fq.id', 'final_question_details.final_question_id')
                    ->join('subjects as sub', 'sub.id', 'fq.subject_id')
                    ->join('question_banks as qb', 'qb.id', 'final_question_details.question_no_id')
                    ->where('fq.id',$id)
                    ->get();

        return view('admin.allQuestion.view',compact('question'));

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
