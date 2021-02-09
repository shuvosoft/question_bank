@extends('layouts.backend.app')

@section('title','Add Subject')

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
                            ADD NEW SUBJECT 
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.subject.store') }}" method="POST">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="name">
                                    <label class="form-label">Subject Name</label>
                                </div>

                            </div>

                            <div class="form-group form-float">

                                <div class="form-line">
                                    <input type="text" id="code" class="form-control" name="code">
                                    <label class="form-label">Subject Code</label>
                                </div>

                            </div>

                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.subject.index') }}">BACK</a>
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