@extends('admin.layouts.master')

@section('title', 'Edit '.$builderPreferred->name)

@section('content')
<div class="box box-default">
  <div class="box-header with-border">
  </div>
  @include('admin.builder-preferred._form')
</div>
@endsection