@extends('admin.layouts.master')

@section('title', 'Footer')

@section('content')
<div class="box box-default">
  <div class="box-header">
  </div>
  <div class="box-body" id="footer-blocks">
    <div>
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
          <a href="#b1" aria-controls="general" role="tab" data-toggle="tab">
            Block
            1
          </a>
        </li>
        <li role="presentation">
          <a href="#b2" aria-controls="details" role="tab" data-toggle="tab">Block 2</a>
        </li>
        <li role="presentation">
          <a href="#b3" aria-controls="details" role="tab" data-toggle="tab">Block 3</a>
        </li>
      </ul>
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="b1">
          <footer-block block-id="1"></footer-block>
        </div>
        <div role="tabpanel" class="tab-pane fade in" id="b2">
          <footer-block block-id="2"></footer-block>
        </div>
        <div role="tabpanel" class="tab-pane fade in" id="b3">
          <footer-block block-id="3"></footer-block>
        </div>
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