@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 text-center">
                            <h4>{{ $course->name }}</h4>
                        </div>
                        <div class="col-md-2 text-right">
                            {{ link_to_route(
                                'supervisor.courses.members',
                                trans('common.main.view') . ' ' . trans('courses.members'),
                                $course->id,
                                ['class' => 'btn btn-primary']
                            ) }}
                        </div>
                        <div class="col-md-1 text-right">
                            {{ link_to_route(
                                'supervisor.courses.edit',
                                trans('courses.edit'),
                                $course->id,
                                ['class' => 'btn btn-success']
                            ) }}
                        </div>
                    </div>
                </div>
                <div class="panel-body text-center">
                    <div class="row">
                        @foreach($subjects as $subject)
                        <div class="col-md-2">
                            <div class="well well-sm">
                                {{ $subject->name }} <!-- DON'T FORGET TO CONVERT THIS TO A LINK -->
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-8 col-md-offset-2 text-center">
                        {{ $course->description }}
                    </div>
                 </div>
                 <div class="panel-footer">
                     <h6>{{ trans('courses.created') }}: {{ $course->created_at->format('M d, Y') }}</h6>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
