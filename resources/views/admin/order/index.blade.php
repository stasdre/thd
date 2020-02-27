@extends('admin.layouts.master')

@section('title', 'Orders')

@section('content')
<div class="box box-default">
    <div class="box-header">

    </div>
    <div class="box-body">
        <table class="table table-bordered table-striped" id="orders-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>PayPal ID</th>
                    <th>Cost</th>
                    <th>Paid</th>
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
        $('#orders-table').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: true,
            order: [ 4, 'desc' ],
            ajax: '{!! route('order.data') !!}',
            columns: [
                { data: 'id', name: 'id', className: "dt-center" },
                { data: 'payd_id', name: 'payd_id', className: "dt-center" },
                { data: 'total', name: 'total', className: "dt-center" },
                { data: 'pay_status', name: 'pay_status', orderable: false, searchable: false, className: "dt-center" },
                { data: 'created_at', name: 'created_at', className: "dt-center" },
                { data: 'actions', name: 'actions', orderable: false, searchable: false, className: "dt-center" }
            ]
        });
    });
</script>
@endpush