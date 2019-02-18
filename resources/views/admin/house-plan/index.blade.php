@extends('admin.layouts.master')

@section('title', 'House Plans dashboard')

@section('breadcrumbs', Breadcrumbs::render('plans'))

@section('content')
    <div class="box box-default">
        <div class="box-header">
            <a class="btn btn-primary" href="{{ route('house-plan.create') }}" role="button">Create new Plan</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="plans-table">
                <thead>
                <tr>
                    <th>Plan Number</th>
                    <th>Name</th>
                    <th>Published</th>
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
        $('#plans-table').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: '{!! route('house-plan.data') !!}',
            columns: [
                { data: 'plan_number', name: 'plan_number', className: "dt-center" },
                { data: 'name', name: 'name' },
                { data: 'is_active', name: 'is_active', orderable: false, searchable: false, className: "dt-center" },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false, className: "dt-center" }
            ]
        });
    });
</script>
@endpush
