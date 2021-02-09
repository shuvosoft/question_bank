@extends('layouts.backend.app')

@section('title','question')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('author.post.store') }}" method="POST" >
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card ">
                        <div class="header">
                            <h2>
                                CREATE NEW QUESTION
                            </h2>
                        </div>
                        <a  class="btn btn-danger m-t-35  waves-effect" href="{{ route('author.post.index') }}">BACK</a>
                        <button type="submit" class="btn btn-primary m-r--45 m-t-35 waves-effect">SAVE QUESTION</button>


                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="title" class="form-control" name="title">
                                    <label class="form-label">Write your question Title....</label>
                                </div>
                            </div>



                            <div class="form-group">

                                <input type="checkbox" id="publish" class="filled-in" name="status" value="1">
                                <label for="publish">Publish Question to Exam Committee   </label><br>
                                {{--<label class="form-label">If you want submit your question to exam committee then checkout  Publish field </label>--}}

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              Select Question Options ::-
                            </h2>
                        </div>
                        <div class="body">
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('subjects') ? 'focused error' : '' }}">
                                    <label for="subject">Select Subject</label>
                                    <select name="subjects[]" id="subject" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('semesters') ? 'focused error' : '' }}">
                                    <label for="semester">Select Semester</label>
                                    <select name="semesters[]" id="semester" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($semesters as $semester)
                                            <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('terms') ? 'focused error' : '' }}">
                                    <label for="term">Select Term</label>
                                    <select name="terms[]" id="term" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($terms as $term)
                                            <option value="{{ $term->id }}">{{ $term->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('sections') ? 'focused error' : '' }}">
                                    <label for="term">Select Section</label>
                                    <select name="sections[]" id="section" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($sections as $section)
                                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('marks') ? 'focused error' : '' }}">
                                    <label for="mark">Select Marks</label>
                                    <select name="marks[]" id="mark" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($marks as $mark)
                                            <option value="{{ $mark->id }}">{{ $mark->mark }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('times') ? 'focused error' : '' }}">
                                    <label for="time">Select Time</label>
                                    <select name="times[]" id="time" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($times as $time)
                                            <option value="{{ $time->id }}">{{ $time->time }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            </div>
                            <button ></button>

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
                            <textarea id="tinymce" name="body"></textarea>
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