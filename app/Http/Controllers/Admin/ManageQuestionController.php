<?php

namespace App\Http\Controllers\Admin;

use App\QuestionBank;
use App\QuestionBankDetails;
use App\Subject;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question = QuestionBank::select('question_banks.*','sub.name')
                   ->join('subjects as sub','sub.id','=','question_banks.subject_id')
                   ->get();
        return view('admin.single_question.index',compact('question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('admin.single_question.create',compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $data = $request->only('subject_id', 'question_mark', 'main_question');
//        $data = $request->only($request->all());
//        $data['created_at'] = date('Y-m-d h:i:s');
        $data = new QuestionBank();
        $data->subject_id = $request->subject_id ;
        $data->question_mark = $request->question_mark ;
        $data->main_question = $request->main_question ;
//        $save = QuestionBank::insert($data);
        //return $save;
        if($data->save()){
            $id = QuestionBank::max('id');
            foreach ($request->question_option as $key=>$v){
                $Q_data =array('question_bank_id'=> $id,
                    'question_option'=>$request->question_option[$key],
                    'q_option_no'=>$request->q_option_no[$key],
                );
                QuestionBankDetails::insert($Q_data);
            }
        }
        Toastr::success('Successfully Saved :)','Success');

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
               $question  = QuestionBank::find($id);
        $question_details = QuestionBankDetails::where('question_bank_id',$id)->get();
        return view('admin.single_question.show',compact('question','question_details'));
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
        $q_details = QuestionBankDetails::where('question_bank_id',$id)->delete();
        $data = QuestionBank::find($id)->delete();
        Toastr::success('Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
