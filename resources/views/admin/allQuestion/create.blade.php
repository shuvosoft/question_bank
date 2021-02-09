@extends('layouts.backend.app')

@section('title','question')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>


@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('admin.question.store') }}" method="POST" >
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    {{--<div class="card ">--}}
                       {{----}}
                        {{--<a  class="btn btn-danger m-t-35  waves-effect" href="{{ route('author.post.index') }}">BACK</a>--}}
                        {{--<button type="submit" class="btn btn-primary m-r--45 m-t-35 waves-effect">SAVE QUESTION</button>--}}


                        {{--<div class="body">--}}
                            {{--<div class="form-group form-float">--}}
                                {{--<div class="form-line">--}}
                                    {{--<input type="text" id="title" class="form-control" name="title">--}}
                                    {{--<label class="form-label">Write your question Title....</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}



                            {{--<div class="form-group">--}}

                                {{--<input type="checkbox" id="publish" class="filled-in" name="status" value="1">--}}
                                {{--<label for="publish">Publish Question to Exam Committee   </label><br>--}}
                                {{--<label class="form-label">If you want submit your question to exam committee then checkout  Publish field </label>--}}

                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>

                                <input type="checkbox" id="publish" class="filled-in" name="status" value="1">
                                <label for="publish">Publish Question to Exam Committee   </label><br>
                                Select Question Options ::-
                            </h2>
                        </div>
                        <div class="form-group">


                            {{--<label class="form-label">If you want submit your question to exam committee then checkout  Publish field </label>--}}

                        </div>
                        <div class="body">
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('subjects') ? 'focused error' : '' }}">
                                    <label for="subject">Select Subject</label>
                                    <select name="subject_id" id="subject_id" class="form-control show-tick" data-live-search="true" multiple>
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
                                    <select name="semester_id" id="semester_id" class="form-control show-tick" data-live-search="true" multiple>
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
                                    <select name="term_id" id="term_id" class="form-control show-tick" data-live-search="true" multiple>
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
                                    <select name="section_id" id="section_id" class="form-control show-tick" data-live-search="true" multiple>
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
                                    <select name="mark_id" id="mark_id" class="form-control show-tick" data-live-search="true" multiple>
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
                                    <select name="time_id" id="time_id" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($times as $time)
                                            <option value="{{ $time->id }}">{{ $time->time }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            </div>
                            <button ></button>

                        </div>
                        <section>
                            <div class="panel panel-footer" >
                                <table class="table table-bordered">
                                    <thead>
                                    <td>Total Mark :</td>
                                    <td><b class="total"></b> </td>
                                    <tr>
                                        <th>Q. No</th>
                                        <th>Body</th>
                                        {{--<th>Quantity</th>--}}
                                        <th>Q. Mark</th>

                                        <th><a href="javascript:void()" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td><input type="number" name="q_no[]" class="form-control" required=""></td>
                                        <td ><textarea type="text"  name="body[]" class="form-control my_class"></textarea></td>
                                        <td><input type="number" name="q_mark[]" class="form-control q_mark"></td>

                                        <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>

                                    </tr>

                                    </tbody>

                                    <tfoot>
                                    <tr>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>


                                        <td><input type="submit" name="" value="Submit" class="btn btn-success"></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>


            <td class="mb-5"><input type="submit" name="" value="Submit" class="btn btn-success "></td>
        </form>
    </div>
@endsection

@push('js')

    <script type="text/javascript">


//        $('tbody').delegate('.q_mark','keyup',function(){
//            var tr=$(this).parent().parent();
//
//            var q_mark=tr.find('.q_mark').val();
//            var amount=(q_mark);
//            // tr.find('.amount').val(amount);
//            total();
//        });
//
//
//
//        function total(){
//            var total=0;
//
//            $('.q_mark').each(function(i,e){
//                var amount=$(this).val()-0;
//                total +=q_mark;
//            });
//
//            $('.total').html(total+"");
//
//        }




        $('.addRow').on('click',function(){
            var tr='<tr>'+
                '<td><input type="number" name="q_no[]" class="form-control" required=""></td>'+
                '<td ><textarea type="text"  name="body[]" class="form-control editor"></textarea></td>'+

                '<td><input type="number" name="q_mark[]" class="form-control q_mark"></td>'+

                '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
                '</tr>';
            $('tbody').append(tr);
            tm('editor');
        });


        function tm(editor='editor'){
            tinymce.init({
                mode : "textareas",
                theme : "simple",
                editor_selector : editor,
                theme: "modern",
                width:700,
                height: 100,
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
        }





        // $('.remove').on('click',function(){
        //     var last=$('tbody tr').length;
        //     if(last>1){
        //         alert("you can not remove last row");
        //     }
        //     else{
        //         $(this).parents('tr').remove();
        //         total();
        //     }
        //
        // });

$('.remove').live('click',function(){
    var last=$('tbody tr').length;
    if(last==1){
        alert("you can not remove last row");
    }
    else{
        $(this).parent().parent().remove();
        total();
    }

});




    </script>
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>



    <script>
        $(function () {
            //TinyMCE
            tinymce.init({
                mode : "textareas",
                theme : "simple",
                editor_selector : "my_class",
                theme: "modern",
                width:700,
                height: 100,
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