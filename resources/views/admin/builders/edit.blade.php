@extends('admin.layouts.master')

@section('title', 'Edit '.$builder->name)

@section('content')
<div class="box box-default">
  <div class="box-header with-border">
  </div>
  @include('admin.builders._form')
</div>
@endsection