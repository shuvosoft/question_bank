@extends('layouts.backend.app')

@section('title','question')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <a href="{{ route('admin.post.index') }}" class="btn btn-danger waves-effect">BACK</a>

        <br>
        <br>
        <div class="row clearfix">
            <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header ">


                            <h1 style="    text-align: center; font-size: 14px;">
                                <p style="font-size: 25px">Daffodil International University</p>
                                <p style="font-size: 18px">Department of Software Engineering</p>
                                <p style="font-size: 16px">Faculty of Science And Information Technology ( FSIT )</p>
                                <p >
                                    @foreach($question->terms as $term)
                                        {{$term->name}} ,

                                        @endforeach
                                    <span style="padding: 0px 30px">Semester :

                                        @foreach($question->semesters as $semester)
                                            {{$semester->name}}

                                        @endforeach
                                    </span>


                                </p>
                                <p>
                                    <span>Course Code :

                                        @foreach($question->subjects as $subject)
                                            {{$subject->code}} ,

                                        @endforeach
                                    </span>
                                     <span>Course Title :

                                         @foreach($question->subjects as $subject)
                                             {{$subject->name}}

                                         @endforeach
                                    </span>


                                </p>

                                <p>
                                    <span>Section :

                                        @foreach($question->sections as $section)
                                            {{$section->name}} ,

                                        @endforeach
                                    </span>

                                    <span>Course Teacher :
                                        {{$question->user->name}}
                                    </span>

                                </p>
                            </h1>






                    </div>
                    <div class="body" style="margin: 0px 80px">
                        <span>Time :
                            @foreach($question->times as $time )
                                {{$time->time}}
                                @endforeach
                        </span>
                        <span style="float: right; ">Total Mark :
                            @foreach($question->marks as $mark )
                                {{$mark->mark}}
                            @endforeach
                        </span><br>
                        <p style="padding: 8px 0px">
                            {!! $question->body !!}
                        </p>


                    </div>

                </div>
            </div>



        </div>
    </div>

    <section class="comment-section" style="margin-bottom: 100px">
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
                                                  placeholder="Enter your feedback" aria-required="true" aria-invalid="false"></textarea >
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
@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script>
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce') }}';
        });
        function approvePost(id) {
            swal({
                title: 'Are you sure?',
                text: "You went to approve this post ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('approval-form').submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'The post remain pending :)',
                        'info'
                    )
                }
            })
        }
    </script>

@endpush