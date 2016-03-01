@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('common.main.users') }}
                    </div>
                    <div class="panel-body">
                        {!! Html::decode(link_to_route('supervisor.users.create',
                            '<i class="fa fa-btn fa-plus"></i> ' . trans('message.create_user'),
                            '', ['class' => 'btn btn-success btn-xs']))
                        !!}
                    </div>
                    <div class="panel-body">
                    <table class="col-md-12">
                        <thead>
                            <tr>
                                <th class="col-md-2 text-left" colspan="1">
                                    {{ trans('common.main.supervisors') }}
                                </th>
                                <th class="col-md-10 text-right" colspan="3">
                                    {!! $supervisors->render() !!}
                                </th>
                            </tr>
                            <tr>
                                <th class="col-md-3">
                                    {{ trans('common.main.name') }}
                                </th>
                                <th class="col-md-7">
                                    {{ trans('common.main.email') }}
                                </th>
                                <th class="col-md-2">
                                    {{ trans('common.main.action') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supervisors as $supervisor)
                                @if ($currentUser->id != $supervisor->id)
                                <tr>
                                    <td>{{ $supervisor->name }}</td>
                                    <td>{{ $supervisor->email }}</td>
                                    <td>
                                        {!! Html::decode(link_to_route('supervisor.users.show',
                                            '<i class="fa fa-btn fa-search"></i>',
                                            $supervisor->id, ['class' => 'btn btn-success btn-xs']))
                                        !!}
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="panel-body">
                    <table class="col-md-12">
                        <thead>
                            <tr>
                                <th class="col-md-2 text-left" colspan="1">
                                    {{ trans('common.main.trainees') }}
                                </th>
                                <th class="col-md-10 text-right" colspan="3">
                                    {!! $trainees->render() !!}
                                </th>
                            </tr>
                            <tr>
                                <th class="col-md-3">
                                    {{ trans('common.main.name') }}
                                </th>
                                <th class="col-md-3">
                                    {{ trans('common.main.email') }}
                                </th>
                                <th class="col-md-3">
                                    {{ trans('common.main.currentCourse') }}
                                </th>
                                <th class="col-md-2">
                                    {{ trans('common.main.action') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainees as $trainee)
                                @if ($currentUser->id != $trainee->id)
                                <tr>
                                    <td>{{ $trainee->name }}</td>
                                    <td>{{ $trainee->email }}</td>
                                    <td>
                                        {{ $trainee->course }}
                                    </td>
                                    <td>
                                        {!! Html::decode(link_to_route('supervisor.users.show',
                                            '<i class="fa fa-btn fa-search"></i>',
                                            $trainee->id, ['class' => 'btn btn-success btn-xs']))
                                        !!}
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection