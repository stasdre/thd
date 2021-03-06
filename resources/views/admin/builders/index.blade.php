@extends('admin.layouts.master')

@section('title', 'Builders')

@section('content')
<div class="box box-default">
  <div class="box-header">
    <a class="btn btn-primary" href="{{ route('builders.create') }}" role="button">Add new builder</a>
  </div>
  <div class="box-body">
    <table class="table table-bordered table-striped" id="builders-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>City</th>
          <th>State</th>
          <th>Zip</th>
          <th>Recently</th>
          <th>Recently big</th>
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
        $('#builders-table').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: true,
            order: [ 1, 'asc' ],
            ajax: '{!! route('builders.data') !!}',
            columns: [
                { data: 'name', name: 'name', className: "dt-center" },
                { data: 'city', name: 'city', className: "dt-center" },
                { data: 'state', name: 'state', className: "dt-center" },
                { data: 'zip', name: 'zip', className: "dt-center" },
                { data: 'show_landing', name: 'show_landing', className: "dt-center" },
                { data: 'recently_built', name: 'recently_built', className: "dt-center" },
                { data: 'created_at', name: 'created_at', className: "dt-center" },
                { data: 'updated_at', name: 'updated_at', className: "dt-center" },
                { data: 'actions', name: 'actions', orderable: false, searchable: false, className: "dt-center" }
            ]
        });
    });
</script>
@endpush