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
                        {{ Form::open(['route' => ['supervisor.subjects.store'], 'files' => false]) }}
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
                                {{ Form::submit(trans('message.save'), ['class' => 'btn btn-primary']) }}
                            </div>
                        {{ Form::close() }}
                    </div>
                    <div class="panel-body">
                    <table class="col-md-9">
                        <thead>
                            <tr>
                                <th class="col-md-3">
                                    {{ trans('message.name') }}
                                </th>
                                <th class="col-md-6">
                                    {{ trans('message.description') }}
                                </th>
                            </tr>
                            <tr>
                                <th class="col-md-9 text-center" colspan="2">
                                    {!! $subjects->render()!!}
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($subjects as $subject)
                                <tr>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->description }}</td>
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
