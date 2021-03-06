@extends('admin.layouts.master')

@section('title', 'Shipping Methods')

@section('content')
    <div class="box box-default">
        <div class="box-header">
            <a class="btn btn-primary" href="{{ route('shipping.create') }}" role="button">Create new shipping</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="styles-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Cost</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush
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
            ajax: '{!! route('shipping.data') !!}',
            columns: [
                { data: 'id', name: 'id', className: "dt-center" },
                { data: 'name', name: 'name' },
                { data: 'cost', name: 'cost' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false, className: "dt-center" }
            ]
        });
        $(".delete-file").on('click', function(e){
            e.preventDefault();
            $(this).parent('.file-name').hide();
            $(this).parent('.file-name').parent('.input-group').find(".file-input").removeClass('hidden');
        });
    });
</script>
@endpush
