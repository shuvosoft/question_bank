@extends('layouts.backend.app')

@section('title',' Question')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        body {
            background-color: #fff
        }

        .container {
            background-color: #555;
            color: #ddd;
            border-radius: 10px;
            padding: 20px;
            font-family: 'Montserrat', sans-serif;
            max-width: 700px
        }

        .container>p {
            font-size: 32px
        }

        .question {
            width: 75%
        }

        .options {
            position: relative;
            padding-left: 40px
        }

        #options label {
            display: block;
            margin-bottom: 15px;
            font-size: 14px;
            cursor: pointer
        }

        @media(max-width:576px) {
            .question {
                width: 100%;
                word-spacing: 2px
            }
        }
    </style>
@endpush

@section('content')
  <form action="{{ route('admin.manageQuestionBank.store') }}" method="POST" >
      @csrf
    <div class="card">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="body">
            <select name="question_set" id="question_set" class="form-control " data-live-search="true" style="width: 100%;">
                <option value="">Please select Set</option>
                @foreach($q_set as $row)
                    <option value="{{ $row->name }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
            <div class="card">
                <div class="body">
                    <label> Subject</label>
                    <input type="hidden" hidden name="subject_id" id="subject_id" class="form-control" value="{{$q_subject->id}}" style=" width: 100%; ">{{$q_subject->name}}

                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    @foreach($question as $row)
                        <div class="container mt-sm-5 my-1" style="border-bottom: 2px solid;">
                            <div class="question ml-sm-5 pl-sm-5 pt-2">
                                <input type="checkbox" id="publish_{{$row->id}}" class="filled-in" name="main_question[]" value="{{$row->id}}" >
                                <label for="publish_{{$row->id}}" >Q. {{$row->main_question}}? {{$row->id}}</label><span  style="float: right"> Mark : {{$row->question_mark}}</span> <br>

                                    @php
                                        $question_d = \App\QuestionBankDetails::where('question_bank_id',$row->id)->get();
                                    @endphp

                                    @foreach($question_d as $row)
                                        <label class="options"><span>{{$row->q_option_no}} . </span>
                                            {{$row->question_option}}

                                        </label>
                                    @endforeach
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
      <input type="submit" name="" value="Submit" class="btn btn-success">
  </form>
@endsection

@push('js')

@endpush
