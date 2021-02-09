<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>A4</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>@page { size: A4 }

        tr td p {
            margin: 0px;
            padding: 8px 0px;
            line-height: 21px;
        }
        @media print
        {
            #pager,
            form,
            .no-print
            {
                display: none !important;
                height: 0;
            }


            .no-print, .no-print *{
                display: none !important;
                height: 0;

    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">
<div class="no-print">
    <a href="{{route('admin.manageQuestionBank.create')}}"  class="no-print"><button class="btn btn-info" style="   float: left;
    margin-left: 89px;
    background: #EA9D9D;
     color: #fff;
    padding: 5px 10px;
    margin-right: 83px;"><- BACK</button></a>



    <form>
        <input  class="no-print btn btn-danger" type = "button"  value = "Print" onclick = "window.print()"
                style="background: #EA9D9D;
    padding: 5px 18px;
    color: #fff;
    float: right;
    margin: 0px 109px;"/>
    </form>
</div>

<!-- Each sheet element should have the class "sheet" -->
<!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
<section class="sheet padding-10mm">

    <div class="header">

        <h1 style="    text-align: center; font-size: 14px;">
            <p style="font-size: 25px; line-height: 0px">Daffodil International University</p>
            <p style="font-size: 18px;  line-height: 10px">Department of Software Engineering</p>
            <p style="font-size: 16px;  line-height: 0px">Faculty of Science And Information Technology ( FSIT )</p>
        </h1>
    </div>
    <div class="body">
        <div class="body " style="margin: 20px 28px; border-top: 1px solid; padding-top: 10px">
{{--                        <span>Time :--}}
{{--                            {{$question->time->time}}--}}
{{--                        </span>--}}
{{--            <span style="float: right; ">Total Mark :--}}
{{--                {{$question->mark->mark}}--}}
{{--                        </span><br>--}}



        </div>
        <div class="table-responsive">
            <table class="table no-border">

                <tbody>
{{--                @foreach($question as $key=>$row)--}}
{{--                    <tr>--}}
{{--                        <td style="padding-left: 25px;width: 100%">Q.{{$key + 1}} {{$row->main_question}}</td>--}}
{{--                        <td style="width: 580px; margin: 0; padding: 0"></td>--}}
{{--                        <td style="padding-right:10px; padding-left: 5px"></td>--}}
{{--                    </tr>--}}

{{--                @endforeach--}}
                    <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @foreach($question as $row)
        <div class="body" style="margin-bottom: 22px;">

                <div class="container mt-sm-5 my-1" style="margin-bottom: 10px">
                    <div class="question ml-sm-5 pl-sm-5 pt-2" style=" margin-bottom: 9px;font-size: 22px;">
                        <div class="py-2 h5">Q. {{$row->main_question}}? <span  style="float: right;font-size: 14px;padding-top: 13px;"> Mark : {{$row->question_mark}}</span></b></div>
                        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                            @php
                                $question_d = \App\QuestionBankDetails::where('question_bank_id',$row->qb_id)->get();
                            @endphp

                            @foreach($question_d as $row)
                                <label class="options" style="padding-left: 21px;"><span>{{$row->q_option_no}} . </span>
                                   <span style="font-size: 17px;">{{$row->question_option}}<br></span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

        </div>
        @endforeach
    </div>
</div>

                </tbody>
            </table>
        </div>
    </div>

</section>



</body>

</html>
