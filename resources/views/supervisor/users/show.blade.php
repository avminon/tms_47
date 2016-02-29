@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel panel-body">
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <h4>{{ trans('labels.user_information') }}
                                    {!! Html::decode(link_to_route('supervisor.users.edit',
                                        '<i class="fa fa-btn fa-pencil"></i>',
                                        $user->id, ['class' => 'btn btn-primary btn-xs']))
                                    !!}
                                    </h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 text-right">
                                    {{ trans('message.name') }}
                                </div>
                                <div class="col-md-8">
                                    {{ $user->name }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 text-right">
                                    {{ trans('message.email') }}
                                </div>
                                <div class="col-md-8">
                                    {{ $user->email }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 text-right">
                                    {{ trans('message.user_type') }}
                                </div>
                                <div class="col-md-8">
                                    {{ $user->userType }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <h4>{{ trans('labels.courses') }}</h4>
                                </div>
                            </div>
                            @if($courses->isEmpty())
                                {{ trans('message.no_course') }}
                            @else
                                <div class="panel-group">
                                    @foreach($courses as $course)
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#subjects{{ $course->id }}">
                                                        {{ $course->name }}
                                                        <span class="badge pull-right">
                                                            {{ $course->status }}
                                                        </span>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="subjects{{ $course->id }}" class="panel-collapse collapse">
                                                @foreach($course->subjects as $subject)
                                                <div class="panel panel-info">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" href="#tasks{{ $subject->id }}">
                                                                {{ $subject->name }}
                                                                <span class="badge pull-right">
                                                                    {{ $subject->status }}
                                                                </span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div id="tasks{{ $subject->id }}" class="panel-collapse collapse">
                                                    <ul class="list-group">
                                                        @foreach($subject->tasks as $task)
                                                            <li class="list-group-item">
                                                                {{ $task->description }}
                                                                <span class="badge pull-right">
                                                                    {{ $task->status }}
                                                                </span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>{{ trans('message.activity_log') }}</h4>
                            </div>
                        </div>
                        <hr>
                        @if($activities->isEmpty())
                            {{ trans('message.no_record_activities') }}
                        @else
                            <ul class="list-group">
                            @foreach($activities as $activity)
                                <li class="list-group-item">
                                    {{ $activity->description }} <br />
                                    <i>({{ $activity->created_at->diffForHumans() }})</i>
                                </li>
                            @endforeach
                            </ul>
                            {!! Html::decode(link_to_route('supervisor.activities.list',
                                '<i class="fa fa-btn fa-search"></i> ' . trans('common.main.viewAll'),
                                $user->id, ['class' => 'btn btn-primary btn-block']))
                            !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection