@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('message.list_of_subjects') }}
                    </div>
                        <div class="panel-body">
                            {!! Form::open(['method' => 'patch', 'route' => ['supervisor.subjects.update', $subject->id]]) !!}
                                <div class="form-group">
                                    {{ Form::label('name', trans('message.update_subject')) }}<br/>
                                    {{ Form::label('name', trans('message.name')) }}
                                    {!! Form::text('name', $subject->name, [
                                        'required' => 'required',
                                        'placeholder' => trans('message.subject_name_placeholder'),
                                        'class' => 'form-control'])
                                    !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('description', trans('message.description')) }}
                                    {!! Form::textarea('description', $subject->description, [
                                        'required' => 'required',
                                        'placeholder' => trans('message.subject_description_placeholder'),
                                        'class' => 'form-control'])
                                    !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit(trans('message.form_update'), ['class' => 'btn btn-success']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    <div class="panel-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
