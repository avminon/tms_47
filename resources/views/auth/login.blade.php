@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('common.main.login') }}</div>
                <div class="panel-body">
                    {{ Form::open([
                            'action' => ['Auth\AuthController@login', null],
                            'class' => 'form-horizontal',
                            'role' => 'form',
                        ])
                    }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{ Form::label('email', trans('common.main.email'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::email('email', null, [
                                        'required' => 'required',
                                        'placeholder' => trans('common.main.enterEmailHere'),
                                        'class' => 'form-control',
                                        'value' => old('email')
                                    ])
                                }}
                                @include('errors.user_register_input', ['field' => 'email'])
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{ Form::label('password', trans('common.main.password'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{
                                    Form::password('password', [
                                        'required' => 'required',
                                        'placeholder' => trans('common.main.enterNameHere'),
                                        'class' => 'form-control'
                                    ])
                                }}
                                @include('errors.user_register_input', ['field' => 'password'])
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('remember') }}
                                        {{ trans('common.main.rememberMe') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{ Form::button('<i class="fa fa-btn fa-sign-in"></i> '.trans('common.main.login'), [
                                        'name' => 'submit',
                                        'class' => 'btn btn-primary',
                                        'type' => 'submit'
                                    ])
                                }}

                                {{ Html::link('/password/reset', trans('common.main.forgetYourPassword'), [
                                        'class' => 'btn btn-link'
                                    ])
                                }}
                            </div>
                        </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
