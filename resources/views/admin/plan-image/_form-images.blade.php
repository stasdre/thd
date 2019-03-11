<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#slideshow" aria-controls="slideshow" role="tab" data-toggle="tab">Slideshow images</a></li>
    <li role="presentation"><a href="#first-floor-tab" aria-controls="first-floor-tab" role="tab" data-toggle="tab">First floor plans</a></li>
    <li role="presentation"><a href="#second-floor-tab" aria-controls="second-floor-tab" role="tab" data-toggle="tab">Second floor plans</a></li>
    <li role="presentation"><a href="#basement-floor-tab" aria-controls="basement-floor-tab" role="tab" data-toggle="tab">Basement floor plans</a></li>
    <li role="presentation"><a href="#bonus-floor-tab" aria-controls="bonus-floor-tab" role="tab" data-toggle="tab">Bonus floor plans</a></li>
</ul>

<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="slideshow">
        <img class="img-responsive galery_loader" style="margin: 0 auto; display: none" src="/img/load_horizontal.gif">
        <div id="file_upload" class="dropzone needsclick dz-clickable">
            <div class="dz-message needsclick">
                Drop files here or click to upload.<br>
            </div>
            <div id="files_sortable">
                @foreach($planImages as $image)
                    <div class="dz-preview dz-processing sending dz-image-preview file_sortable dz-complete" id="sortable_id_{{ $image->id }}">
                        <div class="imag_container downloaded" id="image_id_{{ $image->id }}">
                            <div class="dz-image biggest">
                            <img data-dz-thumbnail alt="{{ $image->title or $image->file_name }}" src="{{ '/storage/plans/'.$image->plan_id.'/thumb/'.$image->file_name }}?rnd={{rand()}}" />
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
    </div>
    <div role="tabpanel" class="tab-pane fade" id="first-floor-tab">
        @include('admin.plan-image._first-floor')
    </div>
    <div role="tabpanel" class="tab-pane fade" id="second-floor-tab">
        @include('admin.plan-image._second-floor')
    </div>
    <div role="tabpanel" class="tab-pane fade" id="basement-floor-tab">
        @include('admin.plan-image._basement-floor')
    </div>
    <div role="tabpanel" class="tab-pane fade" id="bonus-floor-tab">
        @include('admin.plan-image._bonus-floor')
    </div>
</div>

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


@push('css')
<link rel="stylesheet" href="{{asset('css/admin/dropzone.min.css')}}">
@endpush
@push('scripts')
    <script src="{{ asset('js/admin/dropzone.min.js') }}"></script>
    <script>
        function removeFile(element, url)
        {
            var id = element.siblings('.imag_container').prop('id').replace('image_id_', '');
            if( id ){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'delete',
                    url: url,
                    dataType: 'json',
                    beforeSend: function(){
                        $('.galery_loader').show();
                    },
                    success: function(data){
                        $('.galery_loader').hide();
                        if(data == 'success'){
                            element.parent('.dz-preview').remove();
                        }
                    }
                });
            }else{
                element.parent('.dz-preview').remove();
            }
        }

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
                        url: '{!! route('plan-images.sort', ['id' => $plan->id]) !!}',
                        beforeSend: function(){
                            $(".galery_loader").show();
                        },
                        success: function(){
                            $(".galery_loader").hide();
                        }
                    });
                }
            });

            $("#file_upload_first").dropzone({
                url: "{!! route('plan-images-first.store', ['id' => $plan->id]) !!}",
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                sending: function(file, xhr, formData) {
                    $(file.previewElement).addClass('sending');
                    formData.append("sort_number", $(".sending").length);
                },
                previewTemplate: document.querySelector('#dropzone_tmpl').innerHTML,
                previewsContainer: '#files_sortable_first',
                acceptedFiles: 'image/*',
                thumbnailWidth: 160,
                thumbnailHeight: 160,
                success: function(file, data){
                    if(data.file_name){
                        file.previewElement.querySelector("img").src = "/storage/plans/" +data.plan_id+ "/thumb/" + data.file_name;
                        $(file.previewElement).find('.imag_container').addClass('downloaded_without_check');
                        $(file.previewElement).addClass('file_sortable');
                        $(file.previewElement).prop('id', 'sortable_id_' + data.id);
                        $(file.previewElement).find('.imag_container').prop('id', 'image_id_' + data.id);
                    }
                }
            });
            $( "#files_sortable_first" ).sortable({
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
                        url: '{!! route('plan-images-first.sort', ['id' => $plan->id]) !!}',
                        beforeSend: function(){
                            $(".galery_loader").show();
                        },
                        success: function(){
                            $(".galery_loader").hide();
                        }
                    });
                }
            });

            $("#file_upload_second").dropzone({
                url: "{!! route('plan-images-second.store', ['id' => $plan->id]) !!}",
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                sending: function(file, xhr, formData) {
                    $(file.previewElement).addClass('sending');
                    formData.append("sort_number", $(".sending").length);
                },
                previewTemplate: document.querySelector('#dropzone_tmpl').innerHTML,
                previewsContainer: '#files_sortable_second',
                acceptedFiles: 'image/*',
                thumbnailWidth: 160,
                thumbnailHeight: 160,
                success: function(file, data){
                    if(data.file_name){
                        file.previewElement.querySelector("img").src = "/storage/plans/" +data.plan_id+ "/thumb/" + data.file_name;
                        $(file.previewElement).find('.imag_container').addClass('downloaded_without_check_2');
                        $(file.previewElement).addClass('file_sortable');
                        $(file.previewElement).prop('id', 'sortable_id_' + data.id);
                        $(file.previewElement).find('.imag_container').prop('id', 'image_id_' + data.id);
                    }
                }
            });
            $( "#files_sortable_second" ).sortable({
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
                        url: '{!! route('plan-images-second.sort', ['id' => $plan->id]) !!}',
                        beforeSend: function(){
                            $(".galery_loader").show();
                        },
                        success: function(){
                            $(".galery_loader").hide();
                        }
                    });
                }
            });

            $("#file_upload_basement").dropzone({
                url: "{!! route('plan-images-basement.store', ['id' => $plan->id]) !!}",
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                sending: function(file, xhr, formData) {
                    $(file.previewElement).addClass('sending');
                    formData.append("sort_number", $(".sending").length);
                },
                previewTemplate: document.querySelector('#dropzone_tmpl').innerHTML,
                previewsContainer: '#files_sortable_basement',
                acceptedFiles: 'image/*',
                thumbnailWidth: 160,
                thumbnailHeight: 160,
                success: function(file, data){
                    if(data.file_name){
                        file.previewElement.querySelector("img").src = "/storage/plans/" +data.plan_id+ "/thumb/" + data.file_name;
                        $(file.previewElement).find('.imag_container').addClass('downloaded_without_check_basement');
                        $(file.previewElement).addClass('file_sortable');
                        $(file.previewElement).prop('id', 'sortable_id_' + data.id);
                        $(file.previewElement).find('.imag_container').prop('id', 'image_id_' + data.id);
                    }
                }
            });
            $( "#files_sortable_basement" ).sortable({
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
                        url: '{!! route('plan-images-basement.sort', ['id' => $plan->id]) !!}',
                        beforeSend: function(){
                            $(".galery_loader").show();
                        },
                        success: function(){
                            $(".galery_loader").hide();
                        }
                    });
                }
            });

            $("#file_upload_bonus").dropzone({
                url: "{!! route('plan-images-bonus.store', ['id' => $plan->id]) !!}",
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                sending: function(file, xhr, formData) {
                    $(file.previewElement).addClass('sending');
                    formData.append("sort_number", $(".sending").length);
                },
                previewTemplate: document.querySelector('#dropzone_tmpl').innerHTML,
                previewsContainer: '#files_sortable_bonus',
                acceptedFiles: 'image/*',
                thumbnailWidth: 160,
                thumbnailHeight: 160,
                success: function(file, data){
                    if(data.file_name){
                        file.previewElement.querySelector("img").src = "/storage/plans/" +data.plan_id+ "/thumb/" + data.file_name;
                        $(file.previewElement).find('.imag_container').addClass('downloaded_without_check_bonus');
                        $(file.previewElement).addClass('file_sortable');
                        $(file.previewElement).prop('id', 'sortable_id_' + data.id);
                        $(file.previewElement).find('.imag_container').prop('id', 'image_id_' + data.id);
                    }
                }
            });
            $( "#files_sortable_bonus" ).sortable({
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
                        url: '{!! route('plan-images-bonus.sort', ['id' => $plan->id]) !!}',
                        beforeSend: function(){
                            $(".galery_loader").show();
                        },
                        success: function(){
                            $(".galery_loader").hide();
                        }
                    });
                }
            });

        });

        $(document).on('click', '.downloaded', function () {
            var url = '{{ route('plan-images.edit', ['id'=>'image_id']) }}';
            var saveUrl = '{{ route('plan-images.update', ['id'=>'image_id']) }}';
            var id = $(this).prop('id').split('_');
            $.ajax({
                method: 'get',
                url: url.replace('image_id', id[2]),
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function(){
                    $(".galery_loader").show();
                    $("#image_content .form-group:eq(2)").removeClass('hidden');
                    $("#image_content .form-group:eq(3)").removeClass('hidden');
                    $("#image_content .form-group:eq(4)").removeClass('hidden');
                    $("#image_data_form").prop('action', saveUrl.replace('image_id', id[2]));
                },
                success: function(data){

                    $("#id").val(data.id);
                    $("#title").val(data.title);
                    $("#alt_text").val(data.alt_text);
                    $("#description").val(data.description);
                    
                    $("#img__thumb").prop('src', '/storage/plans/'+data.plan_id+'/thumb/'+data.file_name+'?rnd='+Math.random());
                    $("#img__thumb").data('origin', '/storage/plans/'+data.plan_id+'/original/'+data.file_name);

                    $("#img__origin").prop('src', '/storage/plans/'+data.plan_id+'/'+data.file_name+'?rnd='+Math.random());
                    $("#img__origin").data('origin', '/storage/plans/'+data.plan_id+'/original/'+data.file_name);
                    
                    $("#img_href").prop('href', '/storage/plans/'+data.plan_id+'/'+data.file_name);
                    $("#img_thumb_href").prop('href', '/storage/plans/'+data.plan_id+'/thumb/'+data.file_name);
                    
                    if(data.first_image == 1){
                        $("#first_image").prop('checked', true);
                    }else{
                        $("#first_image").prop('checked', false);
                    }

                    if(data.for_search == 1){
                        $("#for_search").prop('checked', true);
                    }else{
                        $("#for_search").prop('checked', false);
                    }

                    if(data.camera_icon == 1){
                        $("#camera_icon").prop('checked', true);
                    }else{
                        $("#camera_icon").prop('checked', false);
                    }

                    $(".galery_loader").hide();

                    $('.modal').modal('show');
                },
                error: function(){
                    $(".galery_loader").hide();
                }
            });
        });

        $(document).on('click', '.downloaded_without_check, .downloaded_without_check_2, .downloaded_without_check_basement, .downloaded_without_check_bonus', function () {

            if($(this).hasClass('downloaded_without_check')){
                var url = '{{ route('plan-images-first.edit', ['id'=>'image_id']) }}';
                var saveUrl = '{{ route('plan-images-first.update', ['id'=>'image_id']) }}';
            }else if($(this).hasClass('downloaded_without_check_2')){
                var url = '{{ route('plan-images-second.edit', ['id'=>'image_id']) }}';
                var saveUrl = '{{ route('plan-images-second.update', ['id'=>'image_id']) }}';
            }else if($(this).hasClass('downloaded_without_check_basement')){
                var url = '{{ route('plan-images-basement.edit', ['id'=>'image_id']) }}';
                var saveUrl = '{{ route('plan-images-basement.update', ['id'=>'image_id']) }}';
            }else if($(this).hasClass('downloaded_without_check_bonus')){
                var url = '{{ route('plan-images-bonus.edit', ['id'=>'image_id']) }}';
                var saveUrl = '{{ route('plan-images-bonus.update', ['id'=>'image_id']) }}';
            }

            var id = $(this).prop('id').split('_');
            $.ajax({
                method: 'get',
                url: url.replace('image_id', id[2]),
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function(){
                    $(".galery_loader").show();
                    $("#image_content .form-group:eq(2)").addClass('hidden');
                    $("#image_content .form-group:eq(3)").addClass('hidden');
                    $("#image_content .form-group:eq(4)").addClass('hidden');
                    $("#image_data_form").prop('action', saveUrl.replace('image_id', id[2]));
                },
                success: function(data){

                    $("#id").val(data.id);
                    $("#title").val(data.title);
                    $("#alt_text").val(data.alt_text);
                    $("#description").val(data.description);
                    
                    $("#img__thumb").prop('src', '/storage/plans/'+data.plan_id+'/thumb/'+data.file_name+'?rnd='+Math.random());
                    $("#img__thumb").data('origin', '/storage/plans/'+data.plan_id+'/original/'+data.file_name);

                    $("#img__origin").prop('src', '/storage/plans/'+data.plan_id+'/'+data.file_name+'?rnd='+Math.random());
                    $("#img__origin").data('origin', '/storage/plans/'+data.plan_id+'/original/'+data.file_name);
                    
                    $("#img_href").prop('href', '/storage/plans/'+data.plan_id+'/'+data.file_name);
                    $("#img_thumb_href").prop('href', '/storage/plans/'+data.plan_id+'/thumb/'+data.file_name);

                    $(".galery_loader").hide();

                    $('.modal').modal('show');
                },
                error: function(){
                    $(".galery_loader").hide();
                }
            });
        });

        $(document).on('click', '#save_image_data', function(){
            $("#spin_load").show();
            $('.modal .error').html('');
            $.ajax({
                method: 'put',
                url: $("#image_data_form").prop('action'),
                dataType: 'json',
                data: {alt_text: $("#alt_text").val(), title: $("#title").val(), description: $("#description").val(), first_image: $("#first_image").prop('checked') ? 1 : 0, for_search: $("#for_search").prop('checked') ? 1 : 0, camera_icon: $("#camera_icon").prop('checked') ? 1 : 0},
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
            removeFile($(this), '{{ route('plan-images.destroy', ['image'=>'']) }}' + '/' + $(this).siblings('.imag_container').prop('id').replace('image_id_', ''));
        });

        $(document).on('click', '.remov_image_first', function(event){
            event.preventDefault();
            removeFile($(this), '{{ route('plan-images-first.destroy', ['image'=>'']) }}' + '/' + $(this).siblings('.imag_container').prop('id').replace('image_id_', ''));
        });

        $(document).on('click', '.remov_image_second', function(event){
            event.preventDefault();
            removeFile($(this), '{{ route('plan-images-second.destroy', ['image'=>'']) }}' + '/' + $(this).siblings('.imag_container').prop('id').replace('image_id_', ''));
        });

        $(document).on('click', '.remov_image_basement', function(event){
            event.preventDefault();
            removeFile($(this), '{{ route('plan-images-basement.destroy', ['image'=>'']) }}' + '/' + $(this).siblings('.imag_container').prop('id').replace('image_id_', ''));
        });

        $(document).on('click', '.remov_image_bonus', function(event){
            event.preventDefault();
            removeFile($(this), '{{ route('plan-images-bonus.destroy', ['image'=>'']) }}' + '/' + $(this).siblings('.imag_container').prop('id').replace('image_id_', ''));
        });
    </script>

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
                    {{ Form::open(['class' => 'form-horizontal', 'id'=>'image_data_form']) }}
                    {{ Form::hidden('id', null, ['id'=>'id']) }}
                    <div class="form-group">
                        {{ Form::label('alt_text', 'Image Alt Text', ['class' => 'col-sm-3 control-label']) }}
                        <div class="col-sm-6">
                            {{ Form::text('alt_text', null, ['class'=>'form-control', 'placeholder'=>'Image Alt Text']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('title', 'Image Name', ['class' => 'col-sm-3 control-label']) }}
                        <div class="col-sm-6">
                            {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Enter image name here']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Description', ['class' => 'col-sm-3 control-label']) }}
                        <div class="col-sm-9">
                            {{ Form::textarea('description', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="first_image" id="first_image" value="1"> First image in the slideshow
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="for_search" id="for_search" value="1"> Search results page
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="camera_icon" id="camera_icon" value="1"> Camera Icon
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <div class="edit-img"><a href="" target="_blank" id="img_thumb_href"><img src="" data-origin="" class="img-responsive" id="img__thumb" alt=""></a></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="edit-img"><a href="" target="_blank" id="img_href"><img src="" data-origin="" class="img-responsive" id="img__origin" alt=""></a></div>
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