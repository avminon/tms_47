@extends('layouts.app')
@section('title')
    {{ trans('common.main.tasks') }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-12">{{ trans('common.main.tasks') }}
                            <div class="list-group">
                                @foreach($tasks as $task)
                                    <li class="list-group-item col-md-12">
                                        <div class="col-md-1">
                                            {!! Form::open(['method' => 'delete', 'route' => [
                                                    'supervisor.tasks.destroy', $task->id
                                                ]])
                                            !!}
                                                {!! Form::hidden('subject_id', $task->subject_id) !!}
                                                {!! Form::button('<i class="fa fa-btn fa-trash-o"></i>',[
                                                        'class' => 'btn btn-danger',
                                                        'type' => 'submit'
                                                    ])
                                                !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="col-md-1">
                                            {!! Html::decode(link_to_route('supervisor.tasks.edit',
                                                '<i class="fa fa-btn fa-pencil"> </i>', $task->id, [
                                                    'class' => 'btn btn-warning'
                                                ]))
                                            !!}
                                        </div>
                                        <div class="col-md-10">
                                            {{ $task->description }}
                                        </div>
                                    </li>
                                @endforeach
                                {!! $tasks->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
