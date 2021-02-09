@extends('layouts.backend.app')

@section('title','question')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('admin.post.update',$question->id) }}" method="POST" >
            @csrf
            @method('PUT')

            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADD NEW POST
                            </h2>
                        </div>
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="title" class="form-control" name="title" value="{{$question->title}}">
                                    <label class="form-label">Pquestion Title</label>
                                </div>
                            </div>



                            {{--<div class="form-group">--}}
                                {{--<input type="checkbox" id="publish" class="filled-in" name="status" value="1"--}}
                                {{--{{$question->status == true ? 'checked' : ''}}>--}}
                                {{--<label for="publish">Publish</label>--}}
                            {{--</div>--}}

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Question Options
                            </h2>
                        </div>
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('subjects') ? 'focused error' : '' }}">
                                    <label for="subject">Select Subject</label>
                                    <select name="subjects[]" id="subject" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($subjects as $subject)
                                            <option
                                                    @foreach($question->subjects as $questionSubject)

                                                            {{$questionSubject->id == $subject->id ? 'selected' : ''}}

                                                            @endforeach

                                                    value="{{ $subject->id }}">{{ $subject->name }}

                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('semesters') ? 'focused error' : '' }}">
                                    <label for="semester">Select Semester</label>
                                    <select name="semesters[]" id="semester" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($semesters as $semester)
                                            <option
                                                    @foreach($question->semesters as $questionSemester)

                                                            {{$questionSemester->id == $semester->id ? 'selected' : ''}}

                                                            @endforeach

                                                    value="{{ $semester->id }}">{{ $semester->name }}

                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('terms') ? 'focused error' : '' }}">
                                    <label for="term">Select Term</label>
                                    <select name="terms[]" id="term" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($terms as $term)
                                            <option
                                                    @foreach($question->terms as $questionTerm)
                                                            {{$questionTerm->id == $term->id ? 'selected' : '' }}

                                                    @endforeach
                                                    value="{{ $term->id }}">{{ $term->name }}

                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('sections') ? 'focused error' : '' }}">
                                    <label for="term">Select Section</label>
                                    <select name="sections[]" id="section" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($sections as $section)
                                            <option
                                                    @foreach($question->sections as $questionSection)
                                                            {{$questionSection->id == $section->id ? 'selected' : ''}}

                                                    @endforeach

                                                    value="{{ $section->id }}">{{ $section->name }}

                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('marks') ? 'focused error' : '' }}">
                                    <label for="mark">Select Marks</label>
                                    <select name="marks[]" id="mark" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($marks as $mark)
                                            <option
                                                    @foreach($question->marks as $questionMark)
                                                            {{$questionMark->id == $mark->id ? 'selected' : ''}}

                                                            @endforeach

                                                    value="{{ $mark->id }}">{{ $mark->mark }}

                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('times') ? 'focused error' : '' }}">
                                    <label for="time">Select Time</label>
                                    <select name="times[]" id="time" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($times as $time)
                                            <option
                                                    @foreach($question->times as $questionTime)
                                                            {{$questionTime->id == $time->id ? 'selected' : ''}}

                                                            @endforeach

                                                    value="{{ $time->id }}">{{ $time->time }}

                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>





                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.post.index') }}">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BODY
                            </h2>
                        </div>
                        <div class="body">
                            <textarea id="tinymce" name="body">{{$question->body}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
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
    </script>

@endpush