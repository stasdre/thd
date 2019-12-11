@extends('admin.layouts.master')

@section('title', 'Footer')

@section('content')
<div class="box box-default">
  <div class="box-header">
  </div>
  <div class="box-body" id="footer-blocks">
    <div>
      <ul class="nav nav-tabs" role="tablist">
        @foreach ($blocks as $item)
        <li role="presentation" @if($loop->iteration === 1) class="active" @endif>
          <a href="#b{{$item->id}}" aria-controls="general" role="tab" data-toggle="tab">Block {{$loop->iteration}}</a>
        </li>
        @endforeach
      </ul>
      <div class="tab-content">
        @foreach ($blocks as $item)
        <div role="tabpanel" class="tab-pane fade in @if($loop->iteration === 1) active @endif" id="b{{$item->id}}">
          <footer-block block-id="{{$item->id}}" :items="{{$item->footer_items}}" block-name="{{$item->name}}">
          </footer-block>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection

@push('datatables')
<script src="{{ asset('js/admin/datatables.js') }}"></script>
@endpush

@push('scripts')
<script src="{{ asset('js/admin/footer.js') }}"></script>
@endpush