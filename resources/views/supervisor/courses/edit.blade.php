@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('courses.edit') . ' ' . trans('courses.course') }} : {{ $course->name }}</div>
                <div class="panel-body">
                    {{ Form::open(['method' => 'patch', 'route' => ['supervisor.courses.update', $course->id]]) }}
                        {!! Form::label('status', trans('courses.course') . ' ' . trans('courses.status')) !!} <br>
                        {!! Form::select('status', $statuses, $course->status, ['class' => 'form-control']) !!} <br>
                        {!! Form::label('name', trans('courses.course') . ' ' . trans('courses.name')) !!} <br>
                        {!! Form::text('name', $course->name, ['class' => 'form-control']) !!} <br>
                        {!!
                            Form::label('description', trans('courses.course') . ' ' . trans('courses.description'))
                        !!} <br>
                        {!! Form::textarea('description', $course->description, ['class' => 'form-control']) !!}<br>

                        {{ Form::submit(trans('courses.save'), ['class' => 'btn btn-success']) }}
                        {{ link_to_route('supervisor.courses.index', trans('courses.cancel'), null, ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </div>
        </div>
    </div>
@endsection
