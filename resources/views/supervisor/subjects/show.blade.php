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
                    </div>
                    <div class="panel-body">
                    <table class="col-md-12" >
                        <thead>
                            <tr>
                                <th class="col-md-12 text-center" colspan="3">
                                    {!! $tasks->render()!!}
                                </th>
                            </tr>
                            <tr>
                                <th class="col-md-12 text-center" colspan="3">
                                    <h4>{{ trans('message.has_tasks') }}:</h4>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="col-md-12">
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-warning">
                                                {{ $task->description }}
                                            </li>
                                        </ul>
                                    </td>
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
