@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10 text-left">
                            <h4>{{ trans('courses.course') }}</h4>
                        </div>
                        <div class="col-md-2 text-right">
                            {{ link_to_route(
                                'supervisor.courses.create',
                                trans('courses.new') . ' ' . trans('courses.course'),
                                null,
                                ['class' => 'btn btn-success']
                            ) }}
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-condensed">
                        <tbody>
                            <tr>
                                <th>{{ trans('courses.course') . ' ' . trans('courses.name') }}</th>
                                <th>{{ trans('courses.description') }}</th>
                                <th>{{ trans('courses.created') . ' ' . trans('courses.at')}}</th>
                                <th>{{ trans('courses.status') }}</th>
                                <th colspan="2">{{ trans('courses.actions') }}</th>
                            </tr>
                            @foreach($courses as $course)
                            <tr>
                                <td>
                                    {{ link_to_route('supervisor.courses.show', $course->name, $course->id) }}
                                </td>
                                <td>{{ $course->description }}</td>
                                <td>{{ $course->created_at->format('m-d-Y') }}</td>
                                <td>{{ $statuses[$course->status] }}</td>
                                <td>
                                    {{ link_to_route(
                                        'supervisor.courses.edit',
                                        trans('courses.edit'),
                                        $course->id,
                                        ['class' => 'btn btn-success']
                                    ) }}
                                </td>
                                <td>
                                    {{ Form::open(['method' => 'delete', 'route' => [
                                        'supervisor.courses.destroy',
                                        $course->id
                                    ]]) }}
                                        {{ Form::submit(trans('courses.delete'), ['class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $courses->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
