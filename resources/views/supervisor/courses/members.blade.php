@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-1 text-right">
                            <h4>{{ trans('courses.members_of') }} <b>{{ $course->name }}</b></h4>
                        </div>
                        <div class="col-md-2">
                            {{ Form::button(trans('common.main.add') . ' ' . trans('courses.members'), [
                                'class' => 'btn btn-success',
                                'data-toggle' => 'modal',
                                'data-target' => '#addMemberModal'
                            ]) }}
                        </div>
                    </div>
                </div>
                <div class="panel-body text-center">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>{{ trans('common.main.trainees') }}</h4>
                            @foreach($trainees as $trainee)
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            {{ $trainee->name }}
                                        </div>
                                        <div class="col-md-2">
                                            {{ Form::open([
                                                'method' => 'delete',
                                                'route' => ['supervisor.courses.deleteMember', $trainee->id]
                                            ]) }}
                                                {{ Form::hidden('course_id', $course->id) }}
                                                {!! Form::submit('&times;', [
                                                        'class' => 'btn btn-danger btn-block'
                                                ]) !!}
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{ $trainees->appends(['tPage' => $tPage, 'sPage' => $sPage])->render() }}
                        </div>
                        <div class="col-md-6">
                            <h4>{{ trans('common.main.supervisors') }}</h4>
                            @foreach($supervisors as $supervisor)
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            {{ $supervisor->name }}
                                        </div>
                                        <div class="col-md-2">
                                            @if($supervisor->id == auth()->id())
                                            <span class="glyphicon glyphicon-user btn btn-default disabled btn-block">
                                            </span>
                                            @else
                                                {{ Form::open([
                                                    'method' => 'delete',
                                                    'route' => ['supervisor.courses.deleteMember', $supervisor->id]
                                                ]) }}
                                                    {{ Form::hidden('course_id', $course->id) }}
                                                    {!! Form::submit('&times;', [
                                                        'class' => 'btn btn-danger btn-block'
                                                    ]) !!}
                                                {{ Form::close() }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{ $supervisors->appends(['tPage' => $tPage, 'sPage' => $sPage])->render() }}
                        </div>
                    </div>
                 </div>
                 <div class="panel-footer">
                     <h6>{{ trans('courses.created') }}: {{ $course->created_at->format('M d, Y') }}</h6>
                 </div>
            </div>
        </div>
    </div>
</div>

@include('modals.modalStart', [
    'modalId' => 'addMemberModal',
    'modalTitle' => trans('common.main.add') . ' ' . trans('courses.members'),
])
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="pill" href="#trainees">
                    {{ trans('common.main.trainees') }}
                </a>
            </li>
            <li>
                <a data-toggle="pill" href="#supervisors">
                    {{ trans('common.main.supervisors') }}
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="trainees" class="tab-pane fade in active">
            {{ Form::open(['method' => 'post', 'route' => ['supervisor.courses.addMember', $course->id]]) }}
                <p>
                {{ Form::select('user_id', $traineesNotInCourse, null, [
                    'placeholder' => trans('common.main.select') . ' ' . trans('common.main.trainee'),
                    'class' => 'form-control'
                ]) }}
                </p>
                <div class="row">
                    <div class="col-md-12 text-center">
                        {{ Form::submit(
                            trans('common.main.add') . ' ' . trans('common.main.trainee'),
                            ['class' => 'btn btn-success']
                        ) }}
                    </div>
                </div>
            {{ Form::close() }}
            </div>
            <div id="supervisors" class="tab-pane fade in">
            {{ Form::open(['method' => 'post', 'route' => ['supervisor.courses.addMember', $course->id]]) }}
                <p>
                {{ Form::select('user_id', $supervisorsNotInCourse, null, [
                    'placeholder' => trans('common.main.select') . ' ' . trans('common.main.supervisor'),
                    'class' => 'form-control'
                ]) }}
                </p>
                <div class="row">
                    <div class="col-md-12 text-center">
                        {{ Form::submit(
                            trans('common.main.add') . ' ' . trans('common.main.supervisor'),
                            ['class' => 'btn btn-success']
                        ) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('modals.modalEnd')

@endsection
