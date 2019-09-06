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
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Link</th>
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
        $('#inspiration-table').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: true,
            order: [ 3, 'asc' ],
            ajax: '{!! route('inspiration.data') !!}',
            columns: [
                { data: 'logo_img', name: 'logo_img', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'link', name: 'link' },
                { data: 'order', name: 'order', searchable: false },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false, className: "dt-center" }
            ]
        });
    });
</script>
@endpush

