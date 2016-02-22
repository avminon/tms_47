@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-btn fa-refresh"></i>
                    {{ trans('common.main.resetPassword') }}
                </div>

                <div class="panel-body">
                    {!! Form::open(['method' => 'post'], [
                            'class' => 'form-horizontal',
                            'role' => 'form',
                            'action' => "url('/password/reset')",
                        ])
                    !!}
                        {!! Form::hidden('token', $token) !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', trans('common.main.email'), [
                                    'class' => 'col-md-4 control-label'
                                ]);
                            !!}

                            <div class="col-md-6">
                                {!! Form::email('email', '', [
                                        'required' => 'required',
                                        'placeholder' => trans('common.main.enterEmailHere'),
                                        'class' => 'form-control',
                                        'value' => old('email')
                                    ])
                                !!}

                               @include('errors.user_register_input', ['field' => 'email'])
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', trans('common.main.password'), [
                                    'class' => 'col-md-4 control-label'
                                ]);
                            !!}

                            <div class="col-md-6">
                                {!! Form::password('password', [
                                        'required' => 'required',
                                        'class' => 'form-control'
                                    ])
                                !!}

                                @include('errors.user_register_input', ['field' => 'password'])
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            {!! Form::label('email', trans('common.main.confirmPassword'), [
                                    'class' => 'col-md-4 control-label'
                                ]);
                            !!}
                            <div class="col-md-6">
                                {!! Form::password('password_confirmation', [
                                        'required' => 'required',
                                        'class' => 'form-control'
                                    ])
                                !!}

                                @include('errors.user_register_input', ['field' => 'password_confirmation'])
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <br />
                                {!! Form::button('<i class="fa fa-btn fa-refresh"></i>'.
                                    trans('common.main.resetPassword'), [
                                        'name' => trans('common.main.submit'),
                                        'class' => 'btn btn-primary',
                                        'type' => 'submit'
                                    ])
                                !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
