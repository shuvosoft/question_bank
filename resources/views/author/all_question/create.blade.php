<!DOCTYPE html>
<html>
<head>
    <title>Exam-committee-process-for-DIU</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/js/i18n/defaults-*.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js">
    </script>

    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
</head>
<body>
<div class="header" style="background: #0f9d58; padding: 20px 0px; margin-bottom: 30px; text-align: center">
    <a href="{{route('author.question.index')}}"><button class="btn btn-info" style="float: left; margin-left:  115px"><- back</button></a>
   CREATE EXAM QUESTION PRAPER
</div>
<div class="container">
    <form action="{{ route('author.question.store') }}" method="POST" >
        {{csrf_field()}}
        <section>

            <div class="panel panel-header  mt-5">

                <div class="row">
                    <div class="header">
                        <h2>

                            <input type="checkbox" id="publish" class="filled-in" name="status" value="1" style="font-size: 40px">
                            <label for="publish">Publish Question to Exam Committee   </label><br>

                        </h2>
                    </div>
                    <div class="body">
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('subjects') ? 'focused error' : '' }}">
                                    <label for="subject">Select Subject</label>
                                    <select name="subject_id" id="subject_id" class="form-control " data-live-search="true" >
                                        <option value="">Please select Subject</option>
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
                                    <select name="semester_id" id="semester_id" class="form-control show-tick" data-live-search="true" >
                                        <option value="">Please select semester</option>
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
                                    <select name="term_id" id="term_id" class="form-control show-tick" data-live-search="true" >
                                        <option value="">Please select term</option>
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
                                    <select name="section_id" id="section_id" class="form-control show-tick" data-live-search="true" >
                                        <option value="">Please select section</option>
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
                                    <select name="mark_id" id="mark_id" class="form-control show-tick" data-live-search="true" >
                                        <option value="">Please select mark</option>
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
                                    <select name="time_id" id="time_id" class="form-control show-tick" data-live-search="true" >
                                        <option value="">Please select time</option>
                                        @foreach($times as $time)
                                            <option value="{{ $time->id }}">{{ $time->time }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>


            <div class="panel panel-footer" >
                <table class="table table-bordered">
                    <thead>
                    <td style="background: #BBBBBB">Question Mark :</td>
                    <td><b class="total" style="background: #FFFFFF; padding: 10px; font-size: 20px; border-radius: 100%"></b> </td>
                    <tr>
                        <th>Q. No</th>
                        <th>Body</th>
                        {{--<th>Quantity</th>--}}
                        <th>Q. Mark</th>

                        <th><a href="javascript:void()" class="addRow"><i class="glyphicon glyphicon-plus" style="background: #0f9d58;color: white; padding: 11px 17px; border-radius: 10px">ADD </i></a></th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td><input type="number" name="q_no[]" class="form-control" required="" style=" width: 65%;"></td>


                        <td ><textarea type="text"  name="body[]" class="form-control my_class"></textarea></td>


                        <td><input type="text" name="q_mark[]" class="form-control q_mark"></td>

                        <td><a href="javascript:void()" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
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
    </form>
</div>
<div class="footer" style="background: #0f9d58; padding: 20px ; margin-top: 30px; text-align: center">
    © 2018Design By-Shuvosarker.com.
</div>
<!-- Select Plugin Js -->
<script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>




<script type="text/javascript">


    $('tbody').delegate('.quantity,.q_mark','keyup',function(){
        var tr=$(this).parent().parent();
        // var quantity=tr.find('.quantity').val();
        var q_mark=tr.find('.q_mark').val();
        var amount=(q_mark);
        // tr.find('.amount').val(amount);
        total();
    });


    function total(){
        var total=0;

        $('.q_mark').each(function(i,e){
            var amount=$(this).val()-0;
            total +=amount;
        });

        $('.total').html(total+"");

    }


    $('.addRow').on('click',function(){
        var tr='<tr>'+
            '<td><input type="number" name="q_no[]" class="form-control" required="" style=" width: 65%;"></td>'+
            '<td ><textarea type="text"  name="body[]" class="form-control editor"></textarea></td>'+
            // '<td><input type="text" name="quantity[]" class="form-control quantity" required=""></td>'+
            '<td><input type="text" name="q_mark[]" class="form-control q_mark"></td>'+
            // ' <td><input type="text" name="amount[]" class="form-control amount"></td>'+
            '<td><a href="javascript:void()" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
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
            width:750,
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

<script>
    $(function () {
        //TinyMCE
        tinymce.init({
            mode : "textareas",
            theme : "simple",
            editor_selector : "my_class",
            theme: "modern",
            width:750,
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
</body>
</html>