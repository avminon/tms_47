@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-7 col-md-offset-2 text-center">
                            <h4>{{ $course->name }}</h4>
                        </div>
                        <div class="col-md-2 text-right">
                            {!! Html::decode(link_to_route('trainee.courses.members',
                                '<i class="fa fa-btn fa-search"></i> ' .
                                trans('courses.view') . ' ' . trans('courses.members'),
                                $course->id, [
                                    'class' => 'btn btn-primary'
                                ])) !!}
                        </div>
                    </div>
                </div>
                <br />
                <br />
                <div class="panel-body">
                    <div class="col-md-10 col-md-offset-1">
                    @foreach ($course->subjects as $subject)
                        @if ($subject->userSubjects->first()->status == \App\Models\UserSubject::STATUS_FINISH)
                        <div class="col-sm-3">
                            <div class="panel panel-success">
                                <div class="panel-heading text-left">
                                    {!! Html::decode(link_to_route('trainee.subjects.show',
                                            $subject->name, $subject->id))
                                    !!}
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="col-sm-3">
                                <div class="panel panel-warning">
                                    <div class="panel-heading text-left">
                                        {!! Html::decode(link_to_route('trainee.subjects.show',
                                                $subject->name, $subject->id))
                                        !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-10 col-md-offset-1">
                        {{ $course->description }} <br/>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-10">
                       <strong>{{ trans('message.activity_log') }}</strong> <br/>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-10 col-md-offset-1">
                    @if (!$activities->isEmpty())
                        @foreach ($activities as $activity)
                            <li class="list-group-item col-md-12 col-med-offset-1">
                                <div class="col-md-3">
                                    {{ $activity->created_at->diffForHumans() }}
                                </div>
                                <div class="col-md-9">
                                    {{ $activity->description }}
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li class="list-group-item col-md-12 col-med-offset-1">
                            {{ trans('message.no_record_activities') }}
                        </li>
                    @endif
                    </div>
                </div>
                <div class="panel-footer panel-primary">
                    <h6>{{ trans('courses.created') }}: {{ $course->created_at->format('M d, Y') }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
