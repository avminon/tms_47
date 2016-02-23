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
                        {{ Form::open(['route' => ['supervisor.subjects.store']]) }}
                            <div class="form-group">
                                {{ Form::label('name', trans('message.create_subject')) }}<br/>
                                {{ Form::label('name', trans('message.name')) }}
                                {{ Form::text('name', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('description', trans('message.description')) }}
                                {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {!! Form::button(
                                    '<i class="fa fa-btn fa-save"></i>'.trans('message.save'),
                                    [
                                        'class' => 'btn btn-success',
                                        'type' => 'submit'
                                    ])
                                !!}
                            </div>
                        {{ Form::close() }}
                    </div>
                    <div class="panel-body">
                    <table class="col-md-12" >
                        <thead>
                            <tr>
                                <th class="col-md-12 text-center" colspan="3">
                                    {!! $subjects->render()!!}
                                </th>
                            </tr>
                            <tr>
                                <th class="col-md-3">
                                    &nbsp;
                                </th>
                                <th class="col-md-3">
                                    {{ trans('message.name') }}
                                </th>
                                <th class="col-md-6">
                                    {{ trans('message.description') }}
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($subjects as $subject)
                                <tr>
                                    <td>
                                        <div class="col-md-2">
                                            {!! Form::open(['method' => 'delete', 'route' => [
                                                    'supervisor.subjects.destroy', $subject->id
                                                ]])
                                            !!}
                                                {!! Form::hidden('subject_id',$subject->id) !!}
                                                {!! Form::button('<i class="fa fa-btn fa-trash-o"></i>',[
                                                        'class' => 'btn btn-danger',
                                                        'type' => 'submit'
                                                    ])
                                                !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="col-md-2">
                                            {!! Html::decode(link_to_route('supervisor.subjects.edit',
                                                '<i class="fa fa-btn fa-pencil"></i> ' ,
                                                    $subject->id,
                                                    [
                                                        'class' => 'btn btn-primary btn-warning',
                                                    ]
                                                ))
                                            !!}
                                        </div>
                                        <div class="col-md-1">
                                            {!! Html::decode(link_to_route('supervisor.subjects.show',
                                                '<i class="fa fa-btn fa-book"></i> ' ,
                                                    $subject->id,
                                                    [
                                                        'class' => 'btn btn-primary btn-success',
                                                    ]
                                                ))
                                            !!}
                                        </div>
                                    </td>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->description }}</td>
                                </tr>
                                <tr colspan="3">
                                    <td><br/></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
