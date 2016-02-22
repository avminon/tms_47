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
                        <div class="col-md-12"><h5>{{ trans('common.main.editTask') }}</h5>
                            {!! Form::open(['method' => 'patch', 'route' => ['supervisor.tasks.update', $task->id]]) !!}
                                {!! Form::text('description', $task->description, [
                                        'required' => 'required',
                                        'placeholder' => trans('common.main.enterDescriptionHere'),
                                        'class' => 'form-control'
                                    ])
                                !!}
                                {!! Form::hidden('subject_id', $task->subject_id) !!}
                                <br />
                                {!! Form::button('<i class="fa fa-save"></i>',[
                                        'type' => 'submit',
                                        'class' => 'btn btn-large btn-success'
                                    ])
                                !!}
                                {!! link_to(URL::previous(), trans('common.main.cancel'),
                                    ['class' => 'btn btn-danger'])
                                !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
