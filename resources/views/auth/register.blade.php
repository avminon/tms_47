@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-btn fa-book"></i> {{ trans('common.main.register') }}</div>
                <div class="panel-body">
                    {!! Form::open(['method' => 'post'], [
                            'class' => 'form-horizontal',
                            'role' => 'form',
                            'action' => "url('/login')",
                        ])
                    !!}
                         <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', trans('common.main.name'), ['class' => 'col-md-4']); !!}

                            <div class="col-md-6">
                                {!! Form::text('name', '', [
                                        'required' => 'required',
                                        'placeholder' => trans('common.main.enterNameHere'),
                                        'class' => 'form-control',
                                        'value' => old('name')
                                    ])
                                !!}

                                @include('errors.user_register_input', ['field' => 'name'])
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', trans('common.main.email'), ['class' => 'col-md-4']); !!}

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
                            {!! Form::label('password', trans('common.main.password'), ['class' => 'col-md-4']); !!}

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
                            {!! Form::label('password_confirmation', trans('common.main.confirmPassword'), [
                                    'class' => 'col-md-4'
                                ])
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
                                {!! Form::button('<i class="fa fa-btn fa-sign-in"></i> '.trans('common.main.login'), [
                                        'name' => trans('common.main.login'),
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
