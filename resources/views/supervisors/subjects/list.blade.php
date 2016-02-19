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
