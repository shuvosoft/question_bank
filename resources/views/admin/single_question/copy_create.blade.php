<!DOCTYPE html>
<html>
<head>
    <title>QUESTION BANK MANAGEMENT SYSTEM</title>
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
<div class="header" style="background: #F44336; padding: 20px 0px;  text-align: center">
    <h3 style="text-align: center; color:white;margin: 0px !important;">QUESTION BANK MANAGEMENT SYSTEM</h3>
</div>
<div class="container">
    <div class="header">
        <h2>

            <label for="publish">Add question</label><br>

        </h2>
    </div>
    <form action="{{ route('author.question.store') }}" method="POST" >
        {{csrf_field()}}
        <section>

            <div class="panel panel-header  mt-5">

                <div class="row">

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
                    </div>

                </div>
            </div>


            <div class="panel panel-footer" >
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 20%;">Question No</th>
                            <th style="width: 63%">Write Question </th>

                            <th><a href="javascript:void()" class="addRow"><i class="glyphicon glyphicon-plus" style="background: #0f9d58;color: white; padding: 11px 17px; border-radius: 10px">ADD </i></a></th>
                        </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td><input type="number" name="q_no[]" class="form-control" required="" style=" width: 65%;"></td>


                        <td ><textarea type="text"  name="body[]" class="form-control "></textarea></td>


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

<!-- Select Plugin Js -->
<script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>




<script type="text/javascript">

    $('.addRow').on('click',function(){
        var tr='<tr>'+
            '<td><input type="number" name="q_no[]" class="form-control" required="" style=" width: 65%;"></td>'+
            '<td ><textarea type="text"  name="body[]" class="form-control "></textarea></td>'+

            '<td><a href="javascript:void()" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
            '</tr>';
        $('tbody').append(tr);
        tm('editor');
    });

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

</body>
</html>
