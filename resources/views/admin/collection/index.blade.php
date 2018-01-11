@extends('admin.layouts.master')

@section('title', 'Specialty Collections')

@section('breadcrumbs', Breadcrumbs::render('style'))

@section('content')
    <div class="box box-default">
        <div class="box-header">
            <a class="btn btn-primary" href="{{ route('collections.create') }}" role="button">Create new Collection</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="styles-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Short name</th>
                    <th>In search</th>
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
            ajax: '{!! route('collections.data') !!}',
            columns: [
                { data: 'id', name: 'id', className: "dt-center" },
                { data: 'name', name: 'name' },
                { data: 'short_name', name: 'short_name' },
                { data: 'in_filter', name: 'in_filter', orderable: false, searchable: false, className: "dt-center" },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false, className: "dt-center" }
            ]
        });
    });
</script>
@endpush
