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
    <div class="container-fluid">
        <div class="block-header">
            <a class="btn btn-primary waves-effect" href="{{route('admin.manageQuestion.index')}}">
                <i class="material-icons">add</i>
                <span> BACK</span>
            </a>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="body">
                        <div class="container mt-sm-5 my-1">
                            <div class="question ml-sm-5 pl-sm-5 pt-2">
{{--                                <input type="checkbox" id="publish" class="filled-in" name="status" value="1">--}}
{{--                                <label for="publish">Q. {{$question->main_question}}?  </label><br>--}}
{{--                                --}}
                                <div class="py-2 h5"><input type="radio" name="radio"><b>Q. {{$question->main_question}}? <span  style="float: right"> Mark : {{$question->question_mark}}</span></b></div>
                                <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                                    @foreach($question_details as $row)
                                        <label class="options"><span>{{$row->q_option_no}} . </span>
                                            {{$row->question_option}}

                                        </label>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection

@push('js')

@endpush
