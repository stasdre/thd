@extends('admin.layouts.master')

@section('title', 'Customer Managment')

@section('breadcrumbs', Breadcrumbs::render('user'))

@section('content')
    <div class="box box-default">
        <div class="box-header">
            <a class="btn btn-primary" href="{{ route('user.create') }}" role="button">Create new user</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="styles-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
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
            ajax: '{!! route('user.data') !!}',
            columns: [
                { data: 'id', name: 'users.id', className: "dt-center" },
                { data: 'name', name: 'users.name' },
                { data: 'last_name', name: 'users.last_name' },
                { data: 'email', name: 'users.email' },
                { data: 'role', name: 'roles.display_name' },
                { data: 'created_at', name: 'users.created_at' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false, className: "dt-center" }
            ]
        });
    });
</script>
@endpush