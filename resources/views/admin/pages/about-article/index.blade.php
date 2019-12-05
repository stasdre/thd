<table class="table table-bordered table-striped" id="styles-table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Created At</th>
      <th>Updated At</th>
      <th>Actions</th>
    </tr>
  </thead>
</table>
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
            ajax: '{!! route('about-article.data') !!}',
            columns: [
                { data: 'id', name: 'id', className: "dt-center" },
                { data: 'name', name: 'name' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false, className: "dt-center" }
            ]
        });
    });
</script>
@endpush