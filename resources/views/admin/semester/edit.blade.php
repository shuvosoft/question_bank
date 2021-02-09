@extends('layouts.backend.app')

@section('title','Edit Semester')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            EDIT SEMESTER
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.semester.update',$semester->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" value="{{$semester->name}}">

                                </div>

                            </div>



                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.semester.index') }}">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush