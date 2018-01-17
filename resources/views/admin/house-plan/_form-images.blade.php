<div id="dZUpload" class="dropzone">
    <div class="dz-default dz-message">
        Drop files here or click to upload.
    </div>
    @if(old('images.file_name'))
        {{ print_r(old('images.file_name')) }}
        @foreach(old('images.file_name') as $key=>$image)
            <div class="dz-preview dz-image-preview dz-processing dz-complete">
                <div class="dz-image">
                    <img data-dz-thumbnail="" alt="" src="{{ storage_path('tmp/'.$image) }}">
                </div>
                <div class="dz-details">
                    <div class="dz-size"><span data-dz-size=""><strong>98.5</strong> KB</span></div>
                    <div class="dz-filename"><span data-dz-name="">Must-read-articles-for-Programmers-and-Software-Developers.jpg</span></div>
                </div>
                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress="" style="width: 100%;"></span></div>
                <div class="form-group" style="margin-top: 10px;">
                    <input type="hidden" name="images[file_name][]" value="XUwruHdJFJvy0B7F3v3dgJ9JFt3AtaGuDkEUhYC4.jpg">
                    <input type="text" class="form-control" placeholder="Label" name="images[label][]">
                </div>
                <div class="dz-error-message"><span data-dz-errormessage=""></span></div>
                <div class="dz-success-mark"></div>
                <div class="dz-error-mark"></div>
            </div>
        @endforeach
    @endif
</div>
@push('css')
<link rel="stylesheet" href="{{asset('css/admin/dropzone.min.css')}}">
@endpush
@push('scripts')
<script src="{{ asset('js/admin/dropzone.min.js') }}"></script>
@endpush
@push('scripts')
<div id="template-container" style="display: none">
    <div class="dz-preview dz-image-preview">
        <div class="dz-image">
            <img data-dz-thumbnail />
        </div>
        <div class="dz-details">
            <div class="dz-size"><span data-dz-size></span></div>
            <div class="dz-filename"><span data-dz-name></span></div>
        </div>
        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
        <div class="form-group" style="margin-top: 10px;">
            <input type="hidden" name="images[file_name][]" value="data-dz-filename">
            <input type="text" class="form-control" placeholder="Label" name="images[label][]">
        </div>
        <div class="dz-error-message"><span data-dz-errormessage></span></div>
        <div class="dz-success-mark"></div>
        <div class="dz-error-mark"></div>
    </div>
</div>
<script>
    Dropzone.autoDiscover = false;

    $(document).ready(function () {
        $("#dZUpload").dropzone({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            maxFiles: 2000,
            url: "{!! route('planImageStore') !!}",
            method: 'post',
            acceptedFiles: 'image/*',
            success: function(file, response) {
                if(response.file_name){
                    file.previewTemplate.innerHTML = file.previewTemplate.innerHTML.replace("data-dz-filename", response.file_name);
                }

                $(".dz-preview.dz-error.dz-complete .form-group").remove();
            },
            previewTemplate: document.querySelector('#template-container').innerHTML
        });
    })</script>
@endpush