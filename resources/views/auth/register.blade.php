@extends('layouts.index')
@section('title', 'Create an Account')
@section('content')
    <div class="py-2 px-sm-5 mx-sm-3 no-margins-on-mobile">


        <div class="row">

            <!-- SideBar Left -->
            @include('layouts.search-sidebar-short')
            <!-- SideBar Left -->

            <!-- Content Right -->
            <div class="col-md-7 col-lg-9 order-md-2 order-1" style="margin-bottom : 20px;">
                <div class="save_plan_page center">
                    <h4 class="save-plan-heading"> Create an Account</h4>
                    <h5 class="save-paln-red-heading"> Frequently Asked Questions</h5>
                    <div class="center mt-2 mt-20 font-weight-bold font-10"><span class="mobile-off bottom-line">Read these commonly asked house plan questions</span>
                        <span class="desktop-off mobile-sub-heading">Commonly asked house plan questions</span>
                    </div>
                    <div class="row"  style="margin-left : 0; margin-right : 0;">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-5	 create-box text-left" style="max-height: 350px">
                            <div class="blue-heading"> HAVE AN ACCOUNT<span style="font-weight : normal;font-size : 13px;"> (sign in here) </span> </div>
                            {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    {{ Form::label('email', 'Email', ['for' => 'first_name']) }}
                                    {{ Form::text('email', null, ['class'=>'form-control rounded-0']) }}
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    {{ Form::label('password', 'Password', ['for' => 'password']) }}
                                    {{ Form::password('password', ['class'=>'form-control rounded-0']) }}
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div> <a href="{{ route('password.request') }}">Forget your password?</a></div>
                                <div class="form-group center">
                                    <br>
                                    {{ Form::button('Sign In', ['class'=>'btn btn-primary rounded-0 mb-3 px-4 red-button sign-in', 'type'=>'submit']) }}
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-5 create-box text-left">
                            <div class="blue-heading"> CREATE AN ACCOUNT </div>
                            {!! Form::open(['route' => 'register', 'method' => 'post']) !!}
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    {{ Form::label('name', 'First Name', ['for' => 'name']) }}
                                    {{ Form::text('name', null, ['class'=>'form-control rounded-0']) }}
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                    {{ Form::label('last_name', 'Last Name', ['for' => 'last_name']) }}
                                    {{ Form::text('last_name', null, ['class'=>'form-control rounded-0']) }}
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    {{ Form::label('email', 'Email', ['for' => 'email']) }}
                                    {{ Form::text('email', null, ['class'=>'form-control rounded-0']) }}
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    {{ Form::label('password', 'Password', ['for' => 'password']) }}
                                    {{ Form::password('password', ['class'=>'form-control rounded-0', 'placeholder'=>'Password must have at least 8 characters']) }}
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                    {{ Form::label('password_confirmation', 'Verify Password', ['for' => 'password_confirmation']) }}
                                    {{ Form::password('password', ['class'=>'form-control rounded-0']) }}
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group center">
                                    {{ Form::button('Sign Up', ['class'=>'btn btn-primary rounded-0 mb-3 px-4 red-button sign-up', 'type'=>'submit']) }}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <!-- Content Right -->
            </div>
        </div>



<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
