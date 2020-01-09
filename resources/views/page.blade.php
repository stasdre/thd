@extends('layouts.index')

@section('title', $page->title)

@section('content')
<div class="container align-items-center style-desc-container">
  {!! $page->text !!}
</div>
@endsection