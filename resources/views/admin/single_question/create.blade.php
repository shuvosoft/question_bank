@extends('layouts.backend.app')

@section('title','question')

@push('css')

@endpush

@section('content')
 <div class="container-fluid">
        <form action="{{ route('admin.manageQuestion.store') }}" method="POST" >
            @csrf
            <section>

                <div class="panel panel-header  mt-5">

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                       Select Subject
                                    </h2>
                                </div>
                                <div class="body">
                                    <select name="subject_id" id="subject_id" class="form-control " data-live-search="true" style="width: 100%;">
                                        <option value="">Please select Subject</option>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                       Question Mark
                                    </h2>
                                </div>
                                <div class="body">
                                    <input type="number" name="question_mark" class="form-control" required="" style=" width: 100%; ">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                       Main Question
                                    </h2>
                                </div>
                                <div class="body">
                                    <textarea type="text"  name="main_question" class="form-control" style="width: 100%"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="panel panel-footer" >
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30%;">Q. Option No</th>
                                <th style="width: 53%">Write Question Options</th>

                                <th><a href="javascript:void()" class="addRow"><i class="glyphicon glyphicon-plus" style="background: #0f9d58;color: white; padding: 11px 17px; border-radius: 10px">ADD </i></a></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><input type="text" name="q_option_no[]" class="form-control" required="" style=" width: 94px;"></td>

                                <td ><textarea type="text"  name="question_option[]" class="form-control "></textarea></td>

                                <td><a href="javascript:void()" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
                            </tr>

                        </tbody>

                        <tfoot>
                        <tr>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript">

        $('.addRow').on('click',function(){
            var tr='<tr>'+
                '<td><input type="text" name="q_option_no[]" class="form-control" required="" style=" width: 94px;"></td>'+
                '<td ><textarea type="text"  name="question_option[]" class="form-control "></textarea></td>'+

                '<td><a href="javascript:void()" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
                '</tr>';
            $('tbody').append(tr);

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
{{--    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>--}}


@endsection

@push('js')

@endpush
