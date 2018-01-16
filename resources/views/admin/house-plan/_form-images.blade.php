<div id="dZUpload" class="dropzone">
    <div class="dz-default dz-message">
        Drop files here or click to upload.
    </div>
</div>
<input type="hidden" name="images" id="plan_images" value="">
@push('css')
<link rel="stylesheet" href="{{asset('css/admin/dropzone.min.css')}}">
@endpush
@push('scripts')
<script src="{{ asset('js/admin/dropzone.min.js') }}"></script>
@endpush
@push('scripts')
<script>
    Dropzone.autoDiscover = false;

    $(document).ready(function () {
        $("#dZUpload").dropzone({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            maxFiles: 2000,
            url: "{!! route('planImageStore') !!}",
            method: 'post',
            acceptedFiles: 'image/*',
            //addRemoveLinks: true,
            success: function(file, response) {
                $("#plan_images").val($("#plan_images").val() + response.file_name + ',');
            }
        });
    })</script>
@endpush