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
                        <div class="col-md-12"><h5><strong>{{ $subject->name }}</strong></h5>
                                <div class="form-group">
                                    <ul class="list-group col-md-12">
                                        {{ trans('common.main.description') . ":" }}
                                        <li class="list-group-item col-md-12">
                                            {{  $subject->description }}
                                        </li>
                                    </ul>
                                </div>
                        </div>
                        <div class="col-md-12"><h5>{{ trans('common.main.addNewTask') }}</h5>
                            {!! Form::open(['method' => 'post', 'route' => 'supervisor.tasks.store']) !!}
                                <div class="form-group">
                                    {!! Form::hidden('subject_id', $subject->id) !!}
                                    {!! Form::text('description', '', [
                                            'required' => 'required',
                                            'placeholder' => trans('common.main.enterDescriptionHere'),
                                            'class' => 'form-control'
                                        ])
                                    !!}
                                </div>
                                {!! Form::button('<i class="fa fa-btn fa-plus"></i> ' . trans('common.main.add'), [
                                        'name' => 'submit',
                                        'type' => 'submit',
                                        'class' => 'btn btn-large btn-success'
                                    ])
                                !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">{{ trans('common.main.tasks') }}
                            <div class="list-group">
                                <ul class="list-group col-md-12">
                                @foreach($tasks as $task)
                                    <li class="list-group-item col-md-12">
                                        <div class="col-md-1">
                                            {!! Form::open(['method' => 'delete', 'route' => [
                                                    'supervisor.tasks.destroy', $task->id
                                                ]])
                                            !!}
                                                {!! Form::hidden('subject_id', $subject->id) !!}
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
                                </ul>
                            </div>
                            {{ link_to('supervisor/subjects', trans('common.main.back'), [
                                    'class' => 'btn btn-primary'])
                            }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
