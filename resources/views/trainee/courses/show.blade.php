@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10 text-left">
                            <h4>{{ $course->name }}</h4>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    {{ $course->description }} <br>
                 </div>
                 <div class="panel-footer">
                     <h6>{{ trans('courses.created') }}: {{ $course->created_at->format('M d, Y') }}</h6>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
