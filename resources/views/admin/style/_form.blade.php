{{ Route::currentRouteName() }}
<form class="form-horizontal" method="post" action="{{ route('styles.store') }}">
    {{ csrf_field() }}
    <div class="box-body">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>

            <div class="col-sm-10">
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Name">
            </div>
        </div>
        <div class="form-group">
            <label for="short_name" class="col-sm-2 control-label">Short Name</label>

            <div class="col-sm-10">
                <input type="text" value="{{ old('short_name') }}" name="short_name" class="form-control" id="short_name" placeholder=" Short Name">
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Description</label>

            <div class="col-sm-10">
                <textarea name="description" id="description" class="form-control tinymce-editor" placeholder="Description ...">{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="in_filter"> Show in filter for search
                </label>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <a class="btn btn-default" href="{{ route('styles.index') }}" role="button">Cancel</a>
        <button type="submit" class="btn btn-success pull-right">Save</button>
    </div>
    <!-- /.box-footer -->
</form>