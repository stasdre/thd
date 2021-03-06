@extends('admin.layouts.master')

@section('title', 'Home Page Mobile New Gallery')

@section('content')
    <div class="box box-default">
        <div class="box-header">
            <a class="btn btn-primary" href="{{ route('mobile-new.create') }}" role="button">Create new slide</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="gallery">
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
        </div>
    </div>
@endsection

@push('datatables')
<script src="{{ asset('js/admin/datatables.js') }}"></script>
@endpush

@push('scripts')
<script>
    $(function() {
        $('#gallery').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: '{!! route('mobile-new.data') !!}',
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