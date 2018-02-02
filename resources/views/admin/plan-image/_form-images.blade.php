<div id="file_upload" class="dropzone needsclick dz-clickable">
    <div class="dz-message needsclick">
        Drop files here or click to upload.<br>
    </div>
    <div id="files_sortable">
        @foreach($planImages as $image)
            <div class="dz-preview dz-processing sending dz-image-preview file_sortable dz-complete" id="sortable_id_{{ $image->id }}">
                <div class="imag_container downloaded" id="image_id_{{ $image->id }}">
                    <div class="dz-image biggest">
                        <img data-dz-thumbnail alt="{{ $image->title or $image->file_name }}" src="{{ '/storage/plans/'.$image->plan_id.'/thumb/'.$image->file_name }}" />
                    </div>
                    <div class="dz-details">
                        <div class="dz-size" data-dz-size><strong>{{ round(Storage::size('public/plans/'.$image->plan_id.'/thumb/'.$image->file_name) / 1000, 2) }}</strong> KB</div>
                        <div class="dz-filename"><span data-dz-name>{{ $image->title or $image->file_name }}</span></div>
                    </div>
                    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                    <div class="dz-error-message"><span data-dz-errormessage></span></div>
                    <div class="dz-success-mark"></div>
                    <div class="dz-error-mark"></div>
                </div>
                <a class="remov_image" href="#">Remove file</a>
            </div>
        @endforeach
    </div>
</div>

@push('css')
<link rel="stylesheet" href="{{asset('css/admin/dropzone.min.css')}}">
@endpush
@push('scripts')
    <script src="{{ asset('js/admin/dropzone.min.js') }}"></script>
    <script>
        Dropzone.autoDiscover = false;

        $(document).ready(function () {
            $("#file_upload").dropzone({
                url: "{!! route('plan-images.store', ['id' => $plan->id]) !!}",
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                sending: function(file, xhr, formData) {
                    $(file.previewElement).addClass('sending');
                    formData.append("sort_number", $(".sending").length);
                },
                previewTemplate: document.querySelector('#dropzone_tmpl').innerHTML,
                previewsContainer: '#files_sortable',
                acceptedFiles: 'image/*',
                thumbnailWidth: 160,
                thumbnailHeight: 160,
                success: function(file, data){
                    if(data.file_name){
                        file.previewElement.querySelector("img").src = "/storage/plans/" +data.plan_id+ "/thumb/" + data.file_name;
                        $(file.previewElement).find('.imag_container').addClass('downloaded');
                        $(file.previewElement).addClass('file_sortable');
                        $(file.previewElement).prop('id', 'sortable_id_' + data.id);
                        $(file.previewElement).find('.imag_container').prop('id', 'image_id_' + data.id);
                    }
                }
            });

            $( "#files_sortable" ).sortable({
                tolerance: 'pointer',
                revert: 'invalid',
                placeholder: 'dz-preview dz-processing dz-image-preview dz-success dz-complete placeholder',
                //placeholder: 'file_sortable',
                items: '.file_sortable',
                forceHelperSize: true,
                helper: 'clone',
                stop: function(event, ui) {
                    //event.preventDefault();
                },
                update: function (event, ui) {
                    var data = $(this).sortable('serialize');

                    // POST to server using $.post or $.ajax
                    $.ajax({
                        data: data,
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '{!! route('plan-images.sort', ['id' => $plan->id]) !!}'
                    });
                }
            });
        });

        var url = '{{ route('plan-images.edit', ['id'=>'image_id']) }}';

        $(document).on('click', '.downloaded', function () {
            var id = $(this).prop('id').split('_');
            $.ajax({
                method: 'get',
                url: url.replace('image_id', id[2]),
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function(){
                    $("#spin_load").show();
                },
                success: function(data){
                    $("#spin_load").hide();
                    $("#id").val(data.id);
                    $("#title").val(data.title);
                    $("#description").val(data.description);
                },
                error: function(){
                    $("#spin_load").hide();
                }
            });
            $('.modal').modal('show');
        });

        $(document).on('click', '#save_image_data', function(){
            $("#spin_load").show();
            $('.modal .error').html('');
            var url = '{{ route('plan-images.update', ['id'=>'image_id']) }}';
            var id = $("#id").val();
            $.ajax({
                method: 'put',
                url: url.replace('image_id', id),
                dataType: 'json',
                data: {title: $("#title").val(), description: $("#description").val()},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function(){
                    $("#spin_load").show();
                },
                success: function(data){
                    if(data == 'success'){
                        $("#spin_load").hide();
                        $('.modal').modal('hide');
                    }
                },
                error: function(xhr){
                    $("#spin_load").hide();
                    $('.modal .error').html(xhr.responseJSON.error);
                }
            });
        });

        $(document).on('click', '.remov_image', function(event){
            event.preventDefault();
            var element = $(this);
            var id = element.siblings('.imag_container').prop('id').replace('image_id_', '');
            if( id ){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'delete',
                    url: '{{ route('plan-images.destroy', ['image'=>'']) }}' + '/' + id,
                    dataType: 'json',
                    success: function(data){
                        if(data == 'success'){
                            element.parent('.dz-preview').remove();
                        }
                    }
                });
            }else{
                element.parent('.dz-preview').remove();
            }
        });
    </script>
<div id="dropzone_tmpl" style="display: none;">
    <div class="dz-preview dz-file-preview">
        <div class="imag_container">
            <div class="dz-image biggest">
                <img data-dz-thumbnail />
            </div>
            <div class="dz-details">
                <div class="dz-size" data-dz-size></div>
                <div class="dz-filename"><span data-dz-name></span></div>
            </div>
            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
            <div class="dz-error-message"><span data-dz-errormessage></span></div>
            <div class="dz-success-mark"></div>
            <div class="dz-error-mark"></div>
        </div>
        <a class="remov_image" href="#">Remove file</a>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p class="text-danger error"></p>
            </div>
            <div class="modal-body">
                <p id="spin_load" class="text-center" style="display: none">
                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                    <span class="sr-only">Loading...</span>
                </p>
                <div id="image_content">
                    {{ Form::open(['class' => 'form-horizontal']) }}
                    {{ Form::hidden('id', null, ['id'=>'id']) }}
                    <div class="form-group">
                        {{ Form::label('title', 'Title', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-6">
                            {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::textarea('description', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_image_data">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endpush