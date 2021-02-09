@extends('layouts.backend.app')

@section('title','Add Mark')

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
                            ADD NEW QUESTION MARK
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.mark.store') }}" method="POST">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" id="mark" class="form-control" name="mark">
                                    <label class="form-label">Give Question Mark</label>
                                </div>

                            </div>



                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.mark.index') }}">BACK</a>
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