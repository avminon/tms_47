@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ trans('message.edit_user') }}</div>
                    <div class="panel-body">
                        {{ Form::open(['method' => 'PUT', 'route' => [
                                'trainee.users.update', $user->id], 'files' => true
                            ])
                        }}
                        <div class="form-group">
                            {{ Form::label('name', trans('message.name')) }}
                            {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', trans('message.email')) }}
                            {{ Form::text('email', $user->email, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('image', trans('message.profile_pic')) }}
                            {{ Form::file('image') }}
                        </div>
                        <div class="col-md-2">
                            {!! link_to(URL::previous(), trans('common.main.back'),
                                ['class' => 'btn btn-warning btn-block'])
                            !!}
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                {{ Form::submit(trans('message.save'), ['class' => 'btn btn-block btn-primary']) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
