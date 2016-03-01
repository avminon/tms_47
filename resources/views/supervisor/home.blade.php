@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $users->count() }}</div>
                            <div>{{ trans('message.trainees') }}</div>
                        </div>
                    </div>
                </div>
                {!!  html_entity_decode(link_to_route(
                        'supervisor.users.index',
                        '<div class="panel-footer"><span class="pull-left">' . trans('message.view_details') . '</span>
                                <span class="pull-right">
                                <i class="fa fa-arrow-circle-right"></i>
                                </span>
                            <div class="clearfix"></div>
                        </div>',
                        null,
                        null
                    ))
                !!}
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-globe fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $courses->count() }}</div>
                            <div>{{ trans('message.courses') }}</div>
                        </div>
                    </div>
                </div>
                {!!  html_entity_decode(link_to_route(
                        'supervisor.courses.index',
                        '<div class="panel-footer"><span class="pull-left">' . trans('message.view_details') . '</span>
                                <span class="pull-right">
                                <i class="fa fa-arrow-circle-right"></i>
                                </span>
                            <div class="clearfix"></div>
                        </div>',
                        null,
                        null
                    ))
                !!}
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-book fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $subjects->count() }}</div>
                            <div>{{ trans('message.subjects') }}</div>
                        </div>
                    </div>
                </div>
                {!!  html_entity_decode(link_to_route(
                        'supervisor.subjects.index',
                        '<div class="panel-footer"><span class="pull-left">' . trans('message.view_details') . '</span>
                                <span class="pull-right">
                                <i class="fa fa-arrow-circle-right"></i>
                                </span>
                            <div class="clearfix"></div>
                        </div>',
                        null,
                        null
                    ))
                !!}
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $tasks->count() }}</div>
                            <div>{{ trans('message.tasks') }}</div>
                        </div>
                    </div>
                </div>
                {!!  html_entity_decode(link_to_route(
                        'supervisor.tasks.index',
                        '<div class="panel-footer"><span class="pull-left">' . trans('message.view_details') . '</span>
                                <span class="pull-right">
                                <i class="fa fa-arrow-circle-right"></i>
                                </span>
                            <div class="clearfix"></div>
                        </div>',
                        null,
                        null
                    ))
                !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-align-left fa-fw"></i>{{ trans('message.activity_log') }}</div>
                <div class="panel-body">
                    <ul class="media-list">
                        @foreach($activities as $activity)
                            <li class="media">
                                <div class="media-left">
                                    <a href="#">
                                        {{ Html::image($activity->user->avatar, $activity->user->name, ['class' => 'media-object']) }}
                                    </a>
                                </div>
                                <div class="media-body">
                                    <p>{{ $activity->description }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="panel-footer">
                    {{ $activities->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-book fa-fw"></i>{{ trans('message.subject_progress') }}
                </div>
                <div class="panel-body">
                    <div class="col-sm-12">
                        @foreach($computedSubjects as $subject)
                            <div class="row">
                                <div class="col-sm-12">
                                    {{ $subject->name }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="{{ $subject->percent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $subject->percent }}">
                                            {{ $subject->percent }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
