@extends('layouts.app')
@section('title')
    {{ trans('message.subjects_details_page') }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading panel-info">
                            {{ trans('message.subjects_details_page') }}
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('name', trans('message.name')) }}
                                {{ $subject->name }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('description', trans('message.description')) }}
                                {{ $subject->description }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            {!! $courses->render()!!}
                            <h4>{{ trans('message.belongs_to_courses') }}:</h4>
                            @foreach ($courses as $course)
                                <div class="form-group">
                                    <ul class="list-group">
                                        <li class="list-group-item list-group-item-success">
                                            {{ $course->name }}
                                        </li>
                                    </ul>


                                </div>

                            @endforeach
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
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'type' => 'submit'
                                                    ])
                                                !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="col-md-1">
                                            {!! Html::decode(link_to_route('supervisor.tasks.edit',
                                                '<i class="fa fa-btn fa-pencil"> </i>', $task->id, [
                                                    'class' => 'btn btn-warning btn-sm'
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
