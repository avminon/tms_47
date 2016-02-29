@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h4>{{ trans('courses.members_of') }} <b>{{ $course->name }}</b></h4>
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
                                            @if($trainee->id == auth()->id())
                                            <span class="glyphicon glyphicon-user">
                                            </span>
                                            @endif
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
                                        <div class="col-md-12">
                                            {{ $supervisor->name }}
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
@endsection
