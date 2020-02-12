@extends('admin.layouts.master')

@section('title', 'Home Page Gallery')

@section('breadcrumbs', Breadcrumbs::render('gallery'))

@section('content')
<div class="box box-default">
  <div class="box-header">
    <a class="btn btn-primary" href="{{ route('gallery.create') }}" role="button">Create new slide</a>
  </div>
  <div class="box-body">
    <table class="table table-bordered table-striped" id="styles-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Order</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Actions</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
@endsection

@push('datatables')
<script src="{{ asset('js/admin/datatables.js') }}"></script>
@endpush

@push('scripts')
<script>
  $(function() {
        $('#styles-table').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: true,
            order: [[ 2, "asc" ]],
            ajax: '{!! route('gallery.data') !!}',
            columns: [
                { data: 'id', name: 'id', className: "dt-center" },
                { data: 'name', name: 'name' },
                { data: 'order', name: 'order' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false, className: "dt-center" }
            ]
        });
    });
</script>
@endpush