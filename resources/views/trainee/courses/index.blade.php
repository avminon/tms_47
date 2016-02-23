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
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>{{ trans('courses.course') . ' ' . trans('courses.name') }}</th>
                                <th>{{ trans('courses.description') }}</th>
                                <th>{{ trans('courses.created') . ' ' . trans('courses.at')}}</th>
                                <th>{{ trans('courses.status') }}</th>
                            </tr>
                            @foreach($courses as $course)
                            <tr>
                                <td>
                                    {{ link_to_route('trainee.courses.show', $course->name, $course->id) }}
                                </td>
                                <td>{{ $course->description }}</td>
                                <td>{{ $course->created_at->format('m-d-Y') }}</td>
                                <td>{{ $statuses[$course->status] }}</td>
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
