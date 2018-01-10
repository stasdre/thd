<form class="form-horizontal">
    <div class="box-body">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>

            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" placeholder="Name">
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Description</label>

            <div class="col-sm-10">
                <textarea id="description" class="form-control tinymce-editor" placeholder="Description ..."></textarea>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <a class="btn btn-default" href="{{ route('house-plan.index') }}" role="button">Cancel</a>
        <button type="submit" class="btn btn-success pull-right">Save</button>
    </div>
    <!-- /.box-footer -->
</form>