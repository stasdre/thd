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
                        <label>{{ Form::checkbox('package[]', $package->id, false, ['class'=>'use-package']) }} Use {{ $package->name }}</label>
                    </div>
                    <div id="package_files_{{ $package->id }}" class="row hidden" style="padding-left: 50px; padding-top: 10px;">
                        <div class="col-sm-4">
                            <div class="input-group input-group-sm">
                                <input class="form-control" type="file">
                                <span class="input-group-addon"><i class="fa fa-file" aria-hidden="true"></i></span>
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

@push('script')
<script>
    $(function(){

    });
</script>
@endpush