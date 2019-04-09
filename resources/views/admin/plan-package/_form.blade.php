<input type="hidden" name="redirect" id="redirect" value="next">

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#packages" data-toggle="tab">Packages</a></li>
        <li><a href="#options" data-toggle="tab">Foundation Options</a></li>
        <li><a href="#addons" data-toggle="tab">Add-Ons</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="packages" style="padding-left: 50px;">
            <img class="img-responsive galery_loader" style="margin: 0 auto; display: none" src="/img/load_horizontal.gif">
            <div class="form-group">
                @foreach($packages as $n => $package)
                        <div class="checkbox">
                            <label>{{ Form::checkbox('package['.$package->id.']', $package->id, $plan->packages->contains($package->id), ['class'=>'use-package']) }} Use {{ $package->name }}</label>
                        </div>
                        @if(old('package'))
                            <div id="package_files_{{ $package->id }}" class="row plan-packages" {!! !old('package.'.$package->id) ? 'style="display: none"' : '' !!}>
                        @else
                            <div id="package_files_{{ $package->id }}" class="row plan-packages" {!! !$plan->packages->contains($package->id) ? 'style="display: none"' : '' !!}>
                        @endif
                            <div class="col-sm-4">
                                <div class="input-group input-group-sm package-price {{ $errors->has('package_price.'.$package->id.'.'.$n) ? 'has-error' : '' }}">
                                    <span class="input-group-addon">$</span>
                                    @if(old('package_price'))
                                        {{ Form::text('package_price['.$package->id.']', old('package_price.'.$package->id.'.'.$n), ['class'=>'form-control']) }}
                                    @else
                                        {{ Form::text('package_price['.$package->id.']', $plan->packages->contains($package->id) ? $plan->packages->find($package->id)->pivot->price : '', ['class'=>'form-control']) }}
                                    @endif
                                </div>
                                <div class="radio" style="margin-bottom:20px;">
                                    <label>
                                        @if(!$plan->packages->find($package->id))
                                            <input type="radio" name="default_package" value="{{$package->id}}"> Use Default
                                        @else
                                            <input type="radio" name="default_package" value="{{$package->id}}" {{$plan->packages->find($package->id)->pivot->default ? 'checked' : ''}}> Use Default
                                        @endif
                                    </label>
                                </div>
                                <div class="files-fields">
                                    <div id="files-package-{{ $package->id }}" class="dropzone needsclick dz-clickable">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="options" style="padding-left: 50px;">
            <img class="img-responsive galery_loader" style="margin: 0 auto; display: none" src="/img/load_horizontal.gif">
            <div class="form-group">
                @foreach($foundations as $n => $option)
                    <div class="checkbox">
                        <label>{{ Form::checkbox('foundation['.$option->id.']', $option->id, $plan->foundationOptions->contains($option->id), ['class'=>'use-foundation']) }} Use {{ $option->name }}</label>
                    </div>
                    @if(old('foundation'))
                        <div id="foundation_files_{{ $option->id }}" class="row plan-foundations" {!! !old('foundation.'.$option->id) ? 'style="display: none"' : '' !!}>
                    @else
                        <div id="foundation_files_{{ $option->id }}" class="row plan-foundations" {!! !$plan->foundationOptions->contains($option->id) ? 'style="display: none"' : '' !!}>
                    @endif
                        <div class="col-sm-4">
                            <div class="input-group input-group-sm foundation-price {{ $errors->has('foundation_price.'.$option->id.'.'.$n) ? 'has-error' : '' }}">
                                <span class="input-group-addon">$</span>
                                @if(old('foundation_price'))
                                    {{ Form::text('foundation_price['.$option->id.']', old('foundation_price.'.$option->id.'.'.$n), ['class'=>'form-control']) }}
                                @else
                                    {{ Form::text('foundation_price['.$option->id.']', $plan->foundationOptions->contains($option->id) ? $plan->foundationOptions->find($option->id)->pivot->price : '', ['class'=>'form-control']) }}
                                @endif
                            </div>
                            <div class="radio" style="margin-bottom:20px;">
                                <label>
                                    @if(!$plan->foundationOptions->find($option->id))
                                        <input type="radio" name="default_option" value="{{$option->id}}"> Use Default
                                    @else
                                        <input type="radio" name="default_option" value="{{$option->id}}" {{$plan->foundationOptions->find($option->id)->pivot->default ? 'checked' : ''}}> Use Default
                                    @endif
                                </label>
                            </div>
                            <div class="files-fields">
                                <div id="files-foundation-{{ $option->id }}" class="dropzone needsclick dz-clickable">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="addons" style="padding-left: 50px;">
            <img class="img-responsive galery_loader" style="margin: 0 auto; display: none" src="/img/load_horizontal.gif">
            <div class="form-group">
                @foreach($addons as $n => $addon)
                    <div class="checkbox">
                        <label>{{ Form::checkbox('addon['.$addon->id.']', $addon->id, $plan->addons->contains($addon->id), ['class'=>'use-addon']) }} Use {{ $addon->name }}</label>
                    </div>
                    @if(old('addon'))
                        <div id="addon_files_{{ $addon->id }}" class="row plan-addon" {!! !old('addon.'.$addon->id) ? 'style="display: none"' : '' !!}>
                    @else
                        <div id="addon_files_{{ $addon->id }}" class="row plan-addon" {!! !$plan->addons->contains($addon->id) ? 'style="display: none"' : '' !!}>
                    @endif
                    <div class="col-sm-4">
                        <div class="input-group input-group-sm addon-price {{ $errors->has('addon_price.'.$addon->id.'.'.$n) ? 'has-error' : '' }}">
                            <span class="input-group-addon">$</span>
                            @if(old('addon_price'))
                                {{ Form::text('addon_price['.$addon->id.']', old('addon_price.'.$addon->id.'.'.$n), ['class'=>'form-control']) }}
                            @else
                                {{ Form::text('addon_price['.$addon->id.']', $plan->addons->contains($addon->id) ? $plan->addons->find($addon->id)->pivot->price : '', ['class'=>'form-control']) }}
                            @endif
                        </div>
                        <div class="files-fields">
                            <div id="files-addon-{{ $addon->id }}" class="dropzone needsclick dz-clickable">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
</div>

@push('css')
<link rel="stylesheet" href="{{asset('css/admin/dropzone.min.css')}}">
@endpush
@push('scripts')
<script src="{{ asset('js/admin/dropzone.min.js') }}"></script>
<script>

    Dropzone.autoDiscover = false;

    $( document ).ajaxStart(function() {
        $('#plans-submit-next').prop('disabled', true);
        $('#plans-submit-close').prop('disabled', true);
        $( ".galery_loader" ).show();
    });

    $( document ).ajaxComplete(function() {
        $('#plans-submit-next').prop('disabled', false);
        $('#plans-submit-close').prop('disabled', false);
        $( ".galery_loader" ).hide();
    });

    @foreach($packages as $n => $package)
        var package{{ $package->id }} = new Dropzone("#files-package-{{ $package->id }}", {
            url: '{{ route('plan-packages.upload', ['plan'=>$plan->id, 'package'=>$package->id]) }}',
            addRemoveLinks: true,
            autoProcessQueue: true,
            parallelUploads: 1,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        @if($plan->packages->contains($package->id) && json_decode($plan->packages->find($package->id)->pivot->files))
            init:function() {
                var myDropzone = this;
            @foreach(json_decode($plan->packages->find($package->id)->pivot->files) as $file)
                @php
                    $exet = explode(".", $file);
                @endphp
                var file = {name: '{{ $file }}', size: {{ Storage::size('packages/'.$plan->id.'/'.$file) }} };
                myDropzone.options.addedfile.call(myDropzone, file);
                myDropzone.options.thumbnail.call(myDropzone, file, '/img/files-type/{{ $exet[1] }}.png');
                myDropzone.emit("complete", file);
                myDropzone.files.push( file );
                file.previewElement.classList.add('dz-file-preview');
                file.previewElement.classList.add('dz-success');
                file.previewElement.classList.add('dz-processing');
                $(file.previewElement).attr('data-url','/admin-thd/plan-packages/file-download/{{ $plan->id }}/{{ $package->id }}/{{ $file }}');
            @endforeach
            }
        @endif
        });
        package{{ $package->id }}.on('addedfile', function(file){
            var ext = file.name.split('.').pop();

            $(file.previewElement).find(".dz-image img").attr("src", "/img/files-type/"+ext+".png");
        });

        package{{ $package->id }}.on('removedfile', function(file){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'DELETE',
                url: '/admin-thd/plan-packages/file-destroy/{{ $plan->id }}/{{ $package->id }}/'+$(file.previewElement).find('[data-dz-name]').html(),
            });
        });

        package{{ $package->id }}.on('success', function(file, response){
            $(file.previewElement).find('[data-dz-name]').html(response.file_name);
            $(file.previewElement).attr('data-url','/admin-thd/plan-packages/file-download/'+response.plan_id+'/'+response.package_id+'/'+response.file_name);
        });
    @endforeach

    @foreach($foundations as $n => $option)
        var foundation{{ $option->id }} = new Dropzone("#files-foundation-{{ $option->id }}", {
            url: '{{ route('plan-foundation.upload', ['plan'=>$plan->id, 'foundation'=>$option->id]) }}',
            addRemoveLinks: true,
            autoProcessQueue: true,
            parallelUploads: 1,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
                @if($plan->foundationOptions->contains($option->id) && json_decode($plan->foundationOptions->find($option->id)->pivot->files))
                init:function() {
                    var myDropzone = this;
                            @foreach(json_decode($plan->foundationOptions->find($option->id)->pivot->files) as $file)
                            @php
                                $exet = explode(".", $file);
                            @endphp
                    var file = {name: '{{ $file }}', size: {{ Storage::size('foundation/'.$plan->id.'/'.$file) }} };
                    myDropzone.options.addedfile.call(myDropzone, file);
                    myDropzone.options.thumbnail.call(myDropzone, file, '/img/files-type/{{ $exet[1] }}.png');
                    myDropzone.emit("complete", file);
                    myDropzone.files.push( file );
                    file.previewElement.classList.add('dz-file-preview');
                    file.previewElement.classList.add('dz-success');
                    file.previewElement.classList.add('dz-processing');
                    $(file.previewElement).attr('data-url','/admin-thd/plan-foundation/file-download/{{ $plan->id }}/{{ $option->id }}/{{ $file }}');
                    @endforeach
                }
                @endif
        });
        foundation{{ $option->id }}.on('addedfile', function(file){
            var ext = file.name.split('.').pop();

            $(file.previewElement).find(".dz-image img").attr("src", "/img/files-type/"+ext+".png");
        });

        foundation{{ $option->id }}.on('removedfile', function(file){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'DELETE',
                url: '/admin-thd/plan-foundation/file-destroy/{{ $plan->id }}/{{ $option->id }}/'+$(file.previewElement).find('[data-dz-name]').html(),
            });
        });

        foundation{{ $option->id }}.on('success', function(file, response){
            $(file.previewElement).find('[data-dz-name]').html(response.file_name);
            $(file.previewElement).attr('data-url','/admin-thd/plan-foundation/file-download/'+response.plan_id+'/'+response.package_id+'/'+response.file_name);
        });
    @endforeach

    @foreach($addons as $n => $addon)
        var addon{{ $addon->id }} = new Dropzone("#files-addon-{{ $addon->id }}", {
            url: '{{ route('plan-addon.upload', ['plan'=>$plan->id, 'addon'=>$addon->id]) }}',
            addRemoveLinks: true,
            autoProcessQueue: true,
            parallelUploads: 1,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
                @if($plan->addons->contains($addon->id) && json_decode($plan->addons->find($addon->id)->pivot->files))
                init:function() {
                    var myDropzone = this;
                            @foreach(json_decode($plan->addons->find($addon->id)->pivot->files) as $file)
                            @php
                                $exet = explode(".", $file);
                            @endphp
                    var file = {name: '{{ $file }}', size: {{ Storage::size('addon/'.$plan->id.'/'.$file) }} };
                    myDropzone.options.addedfile.call(myDropzone, file);
                    myDropzone.options.thumbnail.call(myDropzone, file, '/img/files-type/{{ $exet[1] }}.png');
                    myDropzone.emit("complete", file);
                    myDropzone.files.push( file );
                    file.previewElement.classList.add('dz-file-preview');
                    file.previewElement.classList.add('dz-success');
                    file.previewElement.classList.add('dz-processing');
                    $(file.previewElement).attr('data-url','/admin-thd/plan-addon/file-download/{{ $plan->id }}/{{ $addon->id }}/{{ $file }}');
                    @endforeach
                }
                @endif
        });
    addon{{ $addon->id }}.on('addedfile', function(file){
        var ext = file.name.split('.').pop();

        $(file.previewElement).find(".dz-image img").attr("src", "/img/files-type/"+ext+".png");
    });

    addon{{ $addon->id }}.on('removedfile', function(file){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'DELETE',
            url: '/admin-thd/plan-addon/file-destroy/{{ $plan->id }}/{{ $addon->id }}/'+$(file.previewElement).find('[data-dz-name]').html(),
        });
    });

    addon{{ $addon->id }}.on('success', function(file, response){
        $(file.previewElement).find('[data-dz-name]').html(response.file_name);
        $(file.previewElement).attr('data-url','/admin-thd/plan-addon/file-download/'+response.plan_id+'/'+response.package_id+'/'+response.file_name);
    });
    @endforeach

    $(document).on('click', '.dz-preview', function(){
        window.open($(this).data('url'));
    });


    $(document).ready(function(){
        $("#plans-submit-close, #plans-submit-next").on('click', function(e){
            e.preventDefault();
            if( $(this).prop('id') == 'plans-submit-close' )
                $('#redirect').val('close');
            else
                $('#redirect').val('next');

            $('#plans-form').submit();
        });

        $('.use-package').on('click', function(){
            var pacakgeID = $(this).val();

            if($(this).prop('checked') === true){
                $('#package_files_'+pacakgeID).show();
            }else{
                if(confirm('Warning!!! Files for this package will be deleted!')){
                    window['package'+pacakgeID].removeAllFiles(true);
                    $('#package_files_'+pacakgeID).hide();
                }else{
                    $(this).prop('checked', true);
                }
            }
        });

        $('.use-foundation').on('click', function(){
            var pacakgeID = $(this).val();

            if($(this).prop('checked') === true){
                $('#foundation_files_'+pacakgeID).show();
            }else{
                if(confirm('Warning!!! Files for this package will be deleted!')){
                    window['foundation'+pacakgeID].removeAllFiles(true);
                    $('#foundation_files_'+pacakgeID).hide();
                }else{
                    $(this).prop('checked', true);
                }
            }
        });

        $('.use-addon').on('click', function(){
            var pacakgeID = $(this).val();

            if($(this).prop('checked') === true){
                $('#addon_files_'+pacakgeID).show();
            }else{
                if(confirm('Warning!!! Files for this package will be deleted!')){
                    window['addon'+pacakgeID].removeAllFiles(true);
                    $('#addon_files_'+pacakgeID).hide();
                }else{
                    $(this).prop('checked', true);
                }
            }
        });
    });
</script>
@endpush