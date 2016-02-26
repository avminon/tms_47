@extends('layouts.app')
@section('title')
    {{ trans('common.main.activities') }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-12">{{ $user->name }}'s
                            {{ trans('common.main.activities') }}
                            <div class="list-group">
                                <ul class="list-group col-md-12">
                                @foreach($activities as $activity)
                                    <li class="list-group-item col-md-12">
                                        <div class="col-md-3">
                                            {{ $activity->created_at }}
                                        </div>
                                        <div class="col-md-9">
                                            {{ $activity->description }}
                                        </div>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                            {{ link_to('trainee/home', trans('common.main.back'), ['class' => 'btn btn-primary']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
