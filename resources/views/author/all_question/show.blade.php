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
    <a href="{{route('author.question.index')}}"  class="no-print"><button class="btn btn-info"
 style="   float: left;
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
            <p >

                {{$question->term->name}} ,


                <span style="padding: 0px 10px">Semester :


                    {{$question->semester->name}} ,


               </span>
                <span>Course Code :


                    {{$question->subject->code}}


                 </span>
            <p>

                <span>Course Title :


                    {{$question->subject->name}}


                            </span>


            </p>

            <p>
                            <span>Section :


                                {{$question->section->name}} ,


                            </span>

                <span>Course Teacher :
                    {{$question->user->name}}
                            </span>

            </p>


            </p>

        </h1>
    </div>
    <div class="body">
        <div class="body " style="margin: 20px 28px; border-top: 1px solid; padding-top: 10px">
                        <span>Time :
                            {{$question->time->time}}
                        </span>
            <span style="float: right; ">Total Mark :
                {{$question->mark->mark}}
                        </span><br>
            {{--<p style="padding: 8px 0px">--}}
                {{--{!! $question->body !!}--}}
            {{--</p>--}}


        </div>
        <div class="table-responsive">
            <table class="table no-border">

                <tbody>
                @foreach($question->questions as $question_no)
                    <tr>
                        <td style="padding-left: 25px">{{$question_no->q_no}}.</td>
                        <td style="width: 580px; margin: 0; padding: 0">{!! ($question_no->body) !!}</td>
                        <td style="padding-right:10px; padding-left: 5px">| {{$question_no->q_mark}} marks |</td>


                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>

</section>

</body>

</html>
