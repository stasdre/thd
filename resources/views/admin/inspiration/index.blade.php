@extends('admin.layouts.master')

@section('title', 'Inspiration pages')

@section('content')
    <div class="box box-default">
        <div class="box-header">
            <a class="btn btn-primary" href="{{ route('inspiration.create') }}" role="button">Create new page</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="inspiration-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Link</th>
                    <th>Order</th>
                    <th>In Menu</th>
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
        $('#inspiration-table').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: true,
            order: [ 2, 'asc' ],
            ajax: '{!! route('inspiration.data') !!}',
            columns: [
                { data: 'name', name: 'name', className: "dt-center" },
                { data: 'link', name: 'link', className: "dt-center" },
                { data: 'order', name: 'order', searchable: false, className: "dt-center" },
                { data: 'in_menu', name: 'in_menu', searchable: false, className: "dt-center" },
                { data: 'created_at', name: 'created_at', className: "dt-center" },
                { data: 'updated_at', name: 'updated_at', className: "dt-center" },
                { data: 'actions', name: 'actions', orderable: false, searchable: false, className: "dt-center" }
            ]
        });
    });
</script>
@endpush

