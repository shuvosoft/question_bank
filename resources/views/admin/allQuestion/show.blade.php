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

<section class="no-print comment-section" style="margin-bottom: 100px; text-align: center">
    <div class="container">
        <h4><b>QUESTION FEEDBACK</b></h4>
        <div class="row">

            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="comment-form">

                        <form method="post" action="{{route('feedback.store',$question->id)}}">
                            @csrf

                            <div class="row">
                                <div class="col-sm-12">
                                        <textarea name="feedback" rows="2" class="text-area-messge form-control"
                                                  placeholder="Enter your feedback" aria-required="true" aria-invalid="false" style="width: 500px; height: 100px"></textarea >
                                </div><!-- col-sm-12 -->
                                <div class="col-sm-12">
                                    <button class="submit-btn bg-grey " type="submit" id="form-submit"
                                            style="margin: 20px; padding: 10px; border-radius: 5px"><b>QUESTION FEEDBACK</b></button>
                                </div><!-- col-sm-12 -->


                            </div><!-- row -->
                        </form>

                    </div><!-- comment-form -->
                </div>



                <h4><b>ALL FEEDBACK ({{ $question->feedbacks()->count() }})</b></h4>

                @if($question->feedbacks->count() >0)

                    @foreach($question->feedbacks as $feedback)


                        <div class="commnets-area ">

                            <div class="comment">
                                <div class="card" style="margin:0px 50px">

                                    <div class="post-info" style="padding:10px 30px ">

                                        <div class="left-area">

                                            <img src="{{ Storage::disk('public')->url('profile/'.Auth::user()->image) }}" width="48" height="48" alt="User" />
                                        </div>

                                        <div class="middle-area">
                                            <a class="name" href="#"><b>{{ $feedback->user->name }}</b></a>
                                            <h6 class="date">on {{ $feedback->created_at->diffForHumans()}}</h6>
                                        </div>


                                    </div><!-- post-info -->

                                    <p style="padding:10px 30px ">{{$feedback->feedback}}</p>




                                </div>

                            </div><!-- commnets-area -->
                        </div>

                    @endforeach
                @else



                    <div class="commnets-area ">

                        <div class="card" style="padding: 10px">
                            <div class="comment">
                                <p>No Feedback yet. Be the first :)</p>
                            </div>

                        </div>
                    </div>
                @endif







            </div><!-- row -->

        </div><!-- container -->
    </div>
</section>

</body>

</html>
