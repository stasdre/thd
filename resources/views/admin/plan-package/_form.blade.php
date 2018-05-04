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
                                    @if(old('package_price'))
                                        {{ Form::text('package_price['.$package->id.']', old('package_price.'.$package->id.'.'.$n), ['class'=>'form-control']) }}
                                    @else
                                        {{ Form::text('package_price['.$package->id.']', $plan->packages->contains($package->id) ? $plan->packages->find($package->id)->pivot->price : '', ['class'=>'form-control']) }}
                                    @endif
                                    <span class="input-group-addon">$</span>
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
        <div class="tab-pane" id="options">
            The European languages are members of the same family. Their separate existence is a myth.
            For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
            in their grammar, their pronunciation and their most common words. Everyone realizes why a
            new common language would be desirable: one could refuse to pay expensive translators. To
            achieve this, it would be necessary to have uniform grammar, pronunciation and more common
            words. If several languages coalesce, the grammar of the resulting language is more simple
            and regular than that of the individual languages.
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="addons">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            It has survived not only five centuries, but also the leap into electronic typesetting,
            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
            sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
            like Aldus PageMaker including versions of Lorem Ipsum.
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
                    console.log(window['package'+pacakgeID]);
                    window['package'+pacakgeID].removeAllFiles(true);
                    $('#package_files_'+pacakgeID).hide();
                }else{
                    $(this).prop('checked', true);
                }
            }
        });
    });
</script>
@endpush