@extends('admin.layouts.master')

@section('title', 'Edit '.$page->name)

@section('content')
<div class="box box-default">
  <div class="box-header with-border">
  </div>
  @include('admin.pages._form')
</div>
@endsection