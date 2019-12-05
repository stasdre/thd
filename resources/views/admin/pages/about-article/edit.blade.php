@extends('admin.layouts.master')

@section('title', 'Edit '.$data->name)

@section('content')
<div class="box box-default">
  <div class="box-header with-border">
  </div>
  <div class="box-body">
    {{ Form::model($data, ['route' => ['about-article.update', $data->id], 'class' => 'form-horizontal', 'id'=>'styles-form', 'method' => 'PATCH', 'files' => true]) }}
    @include('admin.pages.about-article._form')
    <div class="col-sm-9">
      <a class="btn btn-default" href="{{ route('pages.about') }}" role="button">Cancel</a>
    </div>
    <div class="col-sm-3">
      <button class="btn btn-success" type="submit">Save</button>
    </div>
    {!! Form::close() !!}
  </div>
  <div class="box-footer">
  </div>
</div>
@endsection