<img class="img-responsive galery_loader" style="margin: 0 auto; display: none" src="/img/load_horizontal.gif">
<div id="file_upload_bonus" class="dropzone needsclick dz-clickable">
    <div class="dz-message needsclick">
        Drop files here or click to upload.<br>
    </div>
    <div id="files_sortable_bonus">
        @foreach($planImagesBonus as $image)
            <div class="dz-preview dz-processing sending dz-image-preview file_sortable dz-complete" id="sortable_id_{{ $image->id }}">
                <div class="imag_container downloaded_without_check_bonus" id="image_id_{{ $image->id }}">
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
                <a class="remov_image_bonus" href="#">Remove file</a>
            </div>
        @endforeach
    </div>
</div>

@push('scripts')

@endpush