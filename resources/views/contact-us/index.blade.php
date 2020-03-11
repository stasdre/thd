@extends('layouts.index')
@section('title', 'For house plan questions, contact us')
@section('description', 'Contact us about home designs and house plans and for help finding and customizing your dream
home plan from David Wiggins, Architect')

@section('content')
<div class="px-5 mt-3 no-margins-on-mobile no-margin-top">

    <div class="row">
        <div class="col-sm-12 col-md-8">
            <h4 class="center" style="margin-top : 10px;"> <b>Contact Us Form </b></h4>
            <div class="center blue-text font-weight-bold font-10">Questions about our house plans and services? <br>
                Simply fill out the form below and we’ll get back to you quickly.</div>
            <hr class="underline">
            <h5 class="save-paln-red-heading center"> <a style="color:inherit" href="/faq">Frequently Asked
                    Questions</a></h5>
            {{-- <div class="center mt-2 mt-20 font-weight-bold font-10"><a href=""
          style="color :black;text-decoration:underline;">Read these commonly asked house plan questions</a></div> --}}
            <div class="tab-content mt-20  contact-form" id="myTabContent">
                <div class="tab-pane fade show active" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                    {!! Form::model($user, ['route' => 'contact-us.send', 'class' => 'form-horizontal', 'method' =>
                    'post']) !!}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                {{ Form::label('first_name', 'First Name', ['for' => 'first_name']) }}
                                {{ Form::text('first_name', null, ['class'=>'form-control rounded-0']) }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('lastt_name') ? 'has-error' : '' }}">
                                {{ Form::label('lastt_name', 'Last Name', ['for' => 'lastt_name']) }}
                                {{ Form::text('lastt_name', null, ['class'=>'form-control rounded-0']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                {{ Form::label('email', 'Email', ['for' => 'email']) }}
                                {{ Form::text('email', null, ['class'=>'form-control rounded-0']) }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                {{ Form::label('phone', 'Phone', ['for' => 'phone']) }}
                                &nbsp;&nbsp;{{ Form::checkbox('text_me', 1) }}<span
                                    class="font-weight-bold font-10 blue-text" style="font-size : 12px;"> Text me house
                                    plan information</span>
                                {{ Form::text('phone', null, ['class'=>'form-control rounded-0', 'placeholder'=>'Enter cell if applicable']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
                                {{ Form::label('subject', 'Subject, select a topic', ['for' => 'subject']) }}
                                {{ Form::select('subject', $subject, null, ['class'=>'form-control rounded-0']) }}
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('plan_number') ? 'has-error' : '' }}">
                                {{ Form::label('plan_number', 'House Plan Number (if known)', ['for' => 'plan_number']) }}
                                {{ Form::text('plan_number', null, ['class'=>'form-control rounded-0']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group {{ $errors->has('question') ? 'has-error' : '' }}">
                                {{ Form::label('question', 'Type your questions/comments here', ['for' => 'question']) }}
                                {{ Form::textarea('question', null, ['class'=>'form-control rounded-0', 'cols'=>'', 'rows'=>'']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('land') ? 'has-error' : '' }}">
                                {{ Form::label('land', 'Do you have land?', ['for' => 'land']) }}
                                {{ Form::select('land', $land, null, ['class'=>'form-control rounded-0']) }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('when') ? 'has-error' : '' }}">
                                {{ Form::label('when', 'When are you planning to build?', ['for' => 'when']) }}
                                {{ Form::select('when', $when, null, ['class'=>'form-control rounded-0']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('builder') ? 'has-error' : '' }}">
                                {{ Form::label('builder', 'Do you have a builder?', ['for' => 'builder']) }}
                                {{ Form::select('builder', $builder, null, ['class'=>'form-control rounded-0']) }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('how') ? 'has-error' : '' }}">
                                {{ Form::label('how', 'How did you hear about us?', ['for' => 'how']) }}
                                {{ Form::select('how', $how, null, ['class'=>'form-control rounded-0']) }}
                            </div>
                        </div>
                    </div>
                    <div class="center">
                        {{ Form::button('Submit your request', ['class'=>'btn btn-primary rounded-0 mb-3 px-4 red-button', 'type'=>'submit']) }}
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="row desktop-off">
                    <div class="col-6 col-sm-6 set-left center">
                        <button class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding"
                            type="button"> Quick
                            <br>Plan Search</button>
                    </div>
                    <div class="col-6 col-sm-6 set-left center">
                        <button class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding"
                            type="button">
                            Advanced <br>Plan Search</button>
                    </div>
                    <br>
                </div>
                <div class="row mobile-off">
                    <div class="col-sm-6 text-right">
                        <a href="{{ route('advanced-search') }}" class="btn btn-primary rounded-0 mb-3 px-4"
                            style="padding-left : 39px !important;padding-right : 39px !important;">
                            Quick Plan Search</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('advanced-search') }}" class="btn btn-primary rounded-0 mb-3 px-4">
                            Advanced Plan Search</a>
                    </div>
                </div>
                <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                    <h4 class="font-weight-bold mt-2">2. Billing</h4>
                </div>
                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">...</div>
            </div>
        </div>

        @include('layouts.best-seller-sidebar')
    </div>
</div>

@endsection