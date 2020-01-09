@extends('admin.layouts.master')

@section('title', 'Edit '.$style->name)

@section('breadcrumbs', Breadcrumbs::render('style-edit', $style))

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-sm-12 text-right">
                    @isset($style)
                        @if($style->is_active == 1)
                            <a class="btn btn-danger btn-lg" href="{{ route('style.unpublish', $style->id) }}" role="button">Unpublish Style</a>
                        @else
                            <a class="btn btn-success btn-lg" href="{{ route('style.publish', $style->id) }}" role="button">Publish Style</a>
                        @endif
                    @endisset
                </div>
            </div>
        </div>
        <div class="box-body">
            {{ Form::model($style, ['route' => ['styles.update', $style->id], 'class' => 'form-horizontal', 'id'=>'styles-form', 'method' => 'PATCH', 'files' => true]) }}
            @include('admin.style._form')
            {!! Form::close() !!}
        </div>
        <div class="box-footer">
            <div class="col-sm-9">
                <a class="btn btn-default" href="{{ route('styles.index') }}" role="button">Cancel</a>
            </div>
            <div class="col-sm-3" style="padding-top: 5px;">
                <a role="button" id="styles-submit-close" href="#" class="btn btn-warning">Save & Close</a>
                <a role="button" id="styles-submit-next" href="#" class="btn btn-success">Save</a>
            </div>
        </div>
    </div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush
