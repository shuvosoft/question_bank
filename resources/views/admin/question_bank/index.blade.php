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
    <h3 style="margin-top: 0px; text-align: center;margin-top: -26px !important;">Manage Question </h3>
    <div class="container-fluid">

        <div class="block-header">
            <form  action="{{route('admin.manageQuestionBankSearch')}}"  method="get" >
                <div class="row" style="background: black">
                    <div class="col-md-8" >
                        <div class="form-group">
                            <label for="division " class="ml-2" ></label>
                            <select class="form-control ml-2" name="subject" id="subject" >
                                <option selected disabled>Select Your Subject</option>
                                @foreach($subjects as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <div class="form-group">
                            <button class="btn  " style=" background: beige;height: 47px;margin-top: 20px;width: 80%;float: right;" type="submit">Manage Full Question</button>
                        </div>
                    </div>

                </div>
            </form >
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    @foreach($questions as $row)
                    <div class="container mt-sm-5 my-1" style="border-bottom: 2px solid;">
                        <div class="question ml-sm-5 pl-sm-5 pt-2">
                            <div class="py-2 h5"><input type="radio" name="radio"><b>Q. {{$row->main_question}}? <span  style="float: right"> Mark : {{$row->question_mark}}</span></b></div>
                            <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
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
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection

@push('js')

@endpush
