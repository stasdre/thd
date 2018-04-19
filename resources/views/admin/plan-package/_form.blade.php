<input type="hidden" name="redirect" id="redirect" value="next">

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#packages" data-toggle="tab">Packages</a></li>
        <li><a href="#options" data-toggle="tab">Foundation Options</a></li>
        <li><a href="#addons" data-toggle="tab">Add-Ons</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="packages" style="padding-left: 50px;">
            <div class="form-group">
                @foreach($packages as $package)
                    <div class="checkbox">
                        <label>{{ Form::checkbox('package[]', $package->id, $plan->packages->contains($package->id), ['class'=>'use-package']) }} Use {{ $package->name }}</label>
                    </div>
                    <div id="package_files_{{ $package->id }}" class="row plan-packages" {!! !$plan->packages->contains($package->id) ? 'style="display: none"' : '' !!}>
                        <div class="col-sm-4">
                            <div class="input-group input-group-sm package-price">
                                <input class="form-control" type="text">
                                <span class="input-group-addon">$</span>
                            </div>
                            <div class="files-fields">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-sm package-file">
                                            <input class="form-control" type="file">
                                            <span class="input-group-addon"><i class="fa fa-file" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <i class="fa fa-plus-circle fa-lg click-icon green-icon add-new-file"></i>
                                    </div>
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

@push('scripts')
<script>
    $(function(){
        $(".add-new-file").on('click', function(){
            var html = '<div class="row">' +
                '<div class="col-sm-10">' +
                '<div class="input-group input-group-sm package-file"><input class="form-control" type="file"><span class="input-group-addon"><i class="fa fa-file" aria-hidden="true"></i></span></div>' +
                '</div>' +
                '<div class="col-sm-2"><i class="fa fa-minus-circle fa-lg click-icon red-icon rem-package-file"></i></div>' +
                '</div>';
            $(this).parents('.files-fields').append(html);
        });

        $('input:checkbox[name="package[]"]').on('click', function(){
            if( $(this).prop('checked') === true ){
                $("#package_files_" + $(this).val()).show();
            }else{
                $("#package_files_" + $(this).val()).hide();
            }
        });
    });

    $(document).on('click', '.rem-package-file', function(){
        $(this).closest('.row').remove();
    });

    $("#plans-submit-close, #plans-submit-next").on('click', function(e){
        e.preventDefault();
        if( $(this).prop('id') == 'plans-submit-close' )
            $('#redirect').val('close');
        else
            $('#redirect').val('next');

        $('#plans-form').submit();
    })
</script>
@endpush