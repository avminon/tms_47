@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('message.create_user') }}</div>
                    <div class="panel-body">
                        {{ Form::open(['route' => ['supervisor.users.store'], 'files' => true]) }}
                            <div class="form-group">
                                {{ Form::label('name', trans('message.name')) }}
                                {{ Form::text('name', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('email', trans('message.email')) }}
                                {{ Form::text('email', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('password', trans('message.pass')) }}
                                {{ Form::password('password', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('confirm_password', trans('message.confirm_pass')) }}
                                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('type', trans('message.user_type')) }}
                                    {{ Form::select('type', $userType, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('image', trans('message.profile_pic')) }}
                                {{ Form::file('image') }}
                            </div>
                            <div class="form-group">
                                {{ Form::submit(trans('message.save'), ['class' => 'btn btn-primary']) }}
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection