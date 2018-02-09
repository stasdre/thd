@if(Route::currentRouteName() == 'gallery.edit')
    {{ Form::model($gallery, ['route' => ['gallery.update', $gallery->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'enctype'=>'multipart/form-data']) }}
@else
    {!! Form::open(['route' => 'gallery.store', 'class' => 'form-horizontal', 'method' => 'post', 'enctype'=>'multipart/form-data']) !!}
@endif
<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('url', 'URL', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('url', null, ['class'=>'form-control', 'placeholder'=>'URL']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::textarea('description', null, ['class'=>'form-control tinymce-editor']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('file', 'Image/Video (min. 2400x1092 px)', ['class' => 'col-sm-3 control-label']) }}
        <div class="col-sm-5">
            <div class="input-group input-group-sm">
                @if($gallery->file)
                    <input class="form-control file-input hidden" type="file" name="file">
                    <span class="input-group-addon file-input hidden"> <i class="fa fa-file" aria-hidden="true"></i></span>
                    <p id="file-name">/gallery/{{ $gallery->file }} <a href="#" id="delete-file" style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                @else
                    <input class="form-control" type="file" name="file">
                    <span class="input-group-addon"><i class="fa fa-file" aria-hidden="true"></i></span>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
    {{ link_to_route('gallery.index', 'Cancel', [], ['class'=>'btn btn-default', 'role'=>'button']) }}
    {{ Form::button('Save', ['class'=>'btn btn-success pull-right', 'type'=>'submit']) }}
</div>
<!-- /.box-footer -->
{!! Form::close() !!}
@push('scripts')
<script>
    $(function(){
       $("#delete-file").on('click', function(e){
           e.preventDefault();
           $("#file-name").hide();
           $(".file-input").removeClass('hidden');
       });
    });
</script>
@endpush