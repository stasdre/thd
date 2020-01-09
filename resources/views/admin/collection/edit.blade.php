@extends('admin.layouts.master')

@section('title', 'Edit '.$collection->name)

@section('breadcrumbs', Breadcrumbs::render('collection-edit', $collection))

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-sm-12 text-right">
                    @isset($collection)
                        @if($collection->is_active == 1)
                            <a class="btn btn-danger btn-lg" href="{{ route('collection.unpublish', $collection->id) }}" role="button">Unpublish Collection</a>
                        @else
                            <a class="btn btn-success btn-lg" href="{{ route('collection.publish', $collection->id) }}" role="button">Publish Collection</a>
                        @endif
                    @endisset
                </div>
            </div>
        </div>
        <div class="box-body">
            {{ Form::model($collection, ['route' => ['collections.update', $collection->id], 'class' => 'form-horizontal', 'id'=>'collection-form', 'method' => 'PATCH', 'files' => true]) }}
            @include('admin.collection._form')
            {!! Form::close() !!}
        </div>
        <div class="box-footer">
            <div class="col-sm-9">
                <a class="btn btn-default" href="{{ route('collections.index') }}" role="button">Cancel</a>
            </div>
            <div class="col-sm-3">
                <a role="button" id="collections-submit-close" href="#" class="btn btn-warning">Save & Close</a>
                <a role="button" id="collections-submit-next" href="#" class="btn btn-success">Save</a>
            </div>
        </div>
    </div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush
