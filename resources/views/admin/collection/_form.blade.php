<input type="hidden" name="redirect" id="redirect" value="next">

<ul class="nav nav-tabs">
    <li class="active"><a href="#main" data-toggle="tab">Main</a></li>
    <li><a href="#meta" data-toggle="tab">Meta Data</a></li>
    {{--<li><a href="#plans" data-toggle="tab">Plans</a></li>--}}
    @isset($collection)
        <li><a target="_blank" href="{{route('collection.slug', $collection->slug)}}" >Preview Collection Page</a></li>
    @endisset
</ul>

<div class="tab-content">
    <div class="tab-pane fade in active" id="main">
        <div class="form-group">
            {{ Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Collection Name']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('slug', 'Slug', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                @if(Route::currentRouteName() == 'collections.edit')
                    {{ Form::text('slug', null, ['class'=>'form-control', 'placeholder'=>'Slug', 'readonly']) }}
                @else
                    {{ Form::text('slug', null, ['class'=>'form-control', 'placeholder'=>'Slug']) }}
                @endif
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('short_name', 'Short Name', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {{ Form::text('short_name', null, ['class'=>'form-control', 'placeholder'=>'Collection Short Name']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('plan', 'Plan', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {{ Form::text('plan', null, ['class'=>'form-control', 'placeholder'=>'Plan']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {{ Form::textarea('description', null, ['class'=>'form-control tinymce-editor']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('image', 'Image', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-5">
                <div class="input-group input-group-sm">
                    @if(isset($collection->image))
                        <input class="form-control file-input hidden" type="file" name="image">
                        <span class="input-group-addon file-input hidden"> <i class="fa fa-file" aria-hidden="true"></i></span>
                        <p class="file-name">/styles/{{ $collection->image }} <a href="#" class="delete-file" style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                    @else
                        <input class="form-control" type="file" name="image">
                        <span class="input-group-addon"><i class="fa fa-file" aria-hidden="true"></i></span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('in_filter', 1) }} Show in filter for search
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="meta">
        <div class="form-group">
            {{ Form::label('meta_title', 'Meta Title', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {{ Form::text('meta_title', null, ['class'=>'form-control', 'placeholder'=>'Meta Title']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('meta_description', 'Meta Description', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {{ Form::textarea('meta_description', null, ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('meta_keywords', 'Meta Key Words', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {{ Form::textarea('meta_keywords', null, ['class'=>'form-control']) }}
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="plans" style="padding-top: 0;">
        <button type="button" class="btn btn-primary" id="add-plans"><i class="fa fa-plus"></i> Add</button>
        <div id="plans-container">
            <input type="hidden" name="deleted_img" id="deleted_img" value="{{ old('deleted_img') }}">
            @if( old('added-plan') )
                @foreach( old('added-plan') as $plan )
                    <div class="added-plan">
                        <input type="hidden" name="added-plan[]" value="1">
                        <h4 class="plan-counter">Plan {{ $loop->iteration }}</h4>
                        <a class="delete-plan" href="#"><i class="fa fa-minus-circle"></i></a>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-4">
                                <input class="form-control" placeholder="Title" name="plan_title[]" type="text" value="{{ old('plan_title.'.$loop->index) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Plan URL</label>
                            <div class="col-sm-4">
                                <input class="form-control" placeholder="URL" name="plan_url[]" type="text" value="{{ old('plan_url.'.$loop->index) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Plan Image</label>
                            <div class="col-sm-4">
                                <input class="form-control" name="plan_img[]" type="file">
                                @if( old('plan_img_old.'.$loop->index) )
                                    <input type="hidden" name="plan_img_old[]" value="{{ old('plan_img_old.'.$loop->index) }}">
                                    <img width="100" height="100" src="/storage/collections/thumb/{{ old('plan_img_old.'.$loop->index) }}" alt="" class="img-thumbnail">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Alt Tag</label>
                            <div class="col-sm-4">
                                <input class="form-control" placeholder="Alt Tag" name="plan_img_alt[]" type="text" value="{{ old('plan_img_alt.'.$loop->index) }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            @elseif( isset($plans) )
                @foreach( $plans as $plan )
                    <div class="added-plan">
                        <input type="hidden" name="added-plan[]" value="1">
                        <h4 class="plan-counter">Plan {{ $loop->iteration }}</h4>
                        <a class="delete-plan" href="#"><i class="fa fa-minus-circle"></i></a>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-4">
                                <input class="form-control" placeholder="Title" name="plan_title[]" type="text" value="{{ $plan->title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Plan URL</label>
                            <div class="col-sm-4">
                                <input class="form-control" placeholder="URL" name="plan_url[]" type="text" value="{{ $plan->url }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Plan Image</label>
                            <div class="col-sm-4">
                                <input class="form-control" name="plan_img[]" type="file">
                                <input type="hidden" name="plan_img_old[]" value="{{ $plan->img }}">
                                <img width="100" height="100" src="/storage/collections/thumb/{{ $plan->img }}" alt="" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Alt Tag</label>
                            <div class="col-sm-4">
                                <input class="form-control" placeholder="Alt Tag" name="plan_img_alt[]" type="text" value="{{ $plan->img_alt }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(function(){
        $("#add-plans").on('click', function(){
            var plansCounter = $("#plans-container").find('.added-plan').length + 1;
            var html = '<div class="added-plan"><input type="hidden" name="added-plan[]" value="1"> <h4 class="plan-counter">Plan '+plansCounter+'</h4> <a class="delete-plan" href="#"><i class="fa fa-minus-circle"></i></a><div class="form-group"><label class="col-sm-2 control-label">Title</label><div class="col-sm-4"><input class="form-control" placeholder="Title" name="plan_title[]" type="text"> </div></div><div class="form-group"><label class="col-sm-2 control-label">Plan URL</label><div class="col-sm-4"><input class="form-control" placeholder="URL" name="plan_url[]" type="text"> </div></div><div class="form-group"><label class="col-sm-2 control-label">Plan Image</label><div class="col-sm-4"><input class="form-control" name="plan_img[]" type="file"> </div></div><div class="form-group"><label class="col-sm-2 control-label">Alt Tag</label><div class="col-sm-4"><input class="form-control" placeholder="Alt Tag" name="plan_img_alt[]" type="text"> </div></div></div>';
            $("#plans-container").append(html);
        });

        $("#collections-submit-close, #collections-submit-next").on('click', function(e){
            e.preventDefault();
            if( $(this).prop('id') == 'collections-submit-close' )
                $('#redirect').val('close');
            else
                $('#redirect').val('next');

            $('#collection-form').submit();
        });
    });

    $(document).on('click', '.delete-plan', function(){
        var plansCounter = 1;
        var carElem = $(this).parents('.added-plan');
        var deletetImages = $("#deleted_img").val();
        var fileName = carElem.find('input[name="plan_img_old[]"]').val();

        if(fileName){
            $("#deleted_img").val(deletetImages+''+fileName+',');
        }

        carElem.remove();

        $(".added-plan").each(function(){
            $(this).find('.plan-counter').text('Plan ' + (plansCounter++));
        });
    });

    $(document).on('focus', '#slug', function(){
        var str = $('#name').val().trim().replace(/[^a-z0-9-]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');

        $(this).val(str.toLowerCase());
    });
</script>
@endpush