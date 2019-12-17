@extends('layouts.builders')

@section('title', "Search Builders")

@section('content')
<div class="builders">
  <div class="d-flex justify-content-end">
    <div>
      <b>{{$builders->currentPage()}}</b> - <b>{{$builders->count()}}</b> of <b>{{$builders->total()}}</b> builders
    </div>
  </div>
  @foreach ($builders as $item)
  <div class="row builder__item">
    <div class="col-md-4 builder__img-container">
      <div class="embed-responsive embed-responsive-16by9">
        <img class="embed-responsive-item" src="{{asset('/storage/builders/'.$item->img)}}" alt="" class="builder__img">
      </div>
    </div>
    <div class="col-md-8">
      <div class="row builder__row">
        <div class="col-md-9 d-flex flex-column builder__desc-container">
          <h3>{{$item->name}}</h3>
          <div class="builder__desc">
            {!!$item->description!!}
          </div>
          <div>
            <i class="fas fa-map-marker-alt"></i> {{$item->city}}, {{$item->state}}
          </div>
        </div>
        <div class="col-md-3 d-flex justify-content-sm-start justify-content-md-end builder__contact-container">
          <div class="orange_btn"><a href="{{$item->link}}">Contact</a></div>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  <div class="row builder__pagination d-flex justify-content-center">
    {{ $builders->links('pagination') }}
  </div>
</div>
@endsection