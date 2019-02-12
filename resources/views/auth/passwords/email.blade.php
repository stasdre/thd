@extends('layouts.index')
@section('title', 'Reset Password')
@section('content')
<div class="py-2 px-sm-5 mx-sm-3 no-margins-on-mobile">
    <div class="row">
        <!-- SideBar Left -->
    @include('layouts.search-sidebar-short')
    <!-- SideBar Left -->
        <div class="col-md-7 col-lg-9 order-md-2 order-1" style="margin-bottom : 20px;">
            <div class="save_plan_page center">
                <h4 class="save-plan-heading">Reset Password</h4>
                <h5 class="save-paln-red-heading"> Frequently Asked Questions</h5>
                <div class="center mt-2 mt-20 font-weight-bold font-10"><span class="mobile-off bottom-line">Read these commonly asked house plan questions</span>
                    <span class="desktop-off mobile-sub-heading">Commonly asked house plan questions</span>
                </div>
                <div class="row"  style="margin-left : 0; margin-right : 0;">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 center-block create-box text-left" style="max-height: 350px">
                        {!! Form::open(['route' => 'password.email', 'method' => 'post']) !!}
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            {{ Form::label('email', 'Email', ['for' => 'email']) }}
                            {{ Form::text('email', null, ['class'=>'form-control rounded-0']) }}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group center">
                            <br>
                            {{ Form::button('Send Password Reset Link', ['class'=>'btn btn-primary rounded-0 mb-3 px-4 red-button', 'type'=>'submit']) }}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
