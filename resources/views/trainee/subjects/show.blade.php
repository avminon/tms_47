@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">{{ trans('message.basic_information') }}</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6 text-right">
                                        {{ trans('message.start_date') }}
                                    </div>
                                    <div class="col-sm-6 text-left">
                                        {{ $subject->start_date }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 text-right">
                                        {{ trans('message.end_date') }}
                                    </div>
                                    <div class="col-sm-6 text-left">
                                        {{ $isFinish ? $userSubject->end_date : trans('message.training') }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 text-right">
                                        {{ trans('message.status') }}
                                    </div>
                                    <div class="col-sm-6 text-left">
                                        {{ $isFinish ? trans('message.finish') : trans('message.training') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">{{ trans('message.activity_log') }}</div>
                            <div class="panel-body">
                                @if(!$activities->isEmpty())
                                    @foreach($activities as $activity)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                {{ $activity->description }}
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    {{ trans('message.no_record_activities') }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">{{ $subject->name }}</div>
                        <div class="panel-body text-center">
                            {{ Form::open(['route' => ['trainee.user-tasks.batchUpdate', $subject->id], 'method' => 'post']) }}
                                @if($tasks->isEmpty())
                                    {{ trans('message.no_record_activities') }}
                                @else
                                    @foreach($tasks as $task)
                                        @if($task->pivot->status == $statusFinish)
                                            <div class="col-sm-3">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading text-left">
                                                        {{ $task->description }}
                                                    </div>
                                                    <div class="panel-body">
                                                        {{ Form::checkbox('taskId[]', $task->id, true, ['disabled' => 'disabled']) }}
                                                        {{ trans('message.finish') }}
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-sm-3">
                                                <div class="panel panel-success">
                                                    <div class="panel-heading text-left">
                                                        {{ $task->description }}
                                                    </div>
                                                    <div class="panel-body">
                                                        {{ Form::checkbox('taskId[]', $task->id, false) }}
                                                        {{ trans('message.finish') }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        {{ Form::submit(trans('message.update'), ['class' => 'btn btn-primary']) }}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12 text-left">
                                        <h3>{{ trans('message.instruction') }}
                                            <small>
                                                <a href="#" data-toggle="collapse" data-target="#instruction">{{ trans('labels.hide_show') }}</a>
                                            </small>
                                        </h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-left">
                                        <div id="instruction" class="collapse in">
                                            {{ $subject->description }}
                                        </div>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection