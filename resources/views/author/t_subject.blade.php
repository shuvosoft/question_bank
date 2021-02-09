@extends('layouts.backend.app')

@section('title','question')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('author.subject.store') }}" method="POST" >
            @csrf
            <div class="row clearfix">

                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Question Options
                            </h2>
                        </div>
                        <div class="body">
                            {{--<div class="form-group form-float">--}}
                                {{--<div class="form-line {{ $errors->has('subjects') ? 'focused error' : '' }}">--}}
                                    {{--<label for="subject">Select Subject</label>--}}
                                    {{--<select name="courses[]" id="subject" class="form-control show-tick" data-live-search="true" multiple>--}}
                                        {{--@foreach (App\Subject::orderBy('name', 'asc')->get() as $subject)--}}
                                            {{--<option value="{{ $subject->id }}">{{ $subject->name }}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Brand</label>
                                <select class="form-control" name="brand_id">
                                    <option value="">Please select a brand for the product</option>
                                    @foreach (App\Subject::orderBy('name', 'asc')->get() as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>





                            {{--<a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.post.index') }}">BACK</a>--}}
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>

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