@if(Route::currentRouteName() == 'inspiration.edit')
    {{ Form::model($inspiration, ['route' => ['inspiration.update', $inspiration->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files' => true]) }}
@else
    {!! Form::open(['route' => 'inspiration.store', 'class' => 'form-horizontal', 'method' => 'post', 'files' => true]) !!}
@endif

<div class="box-body">
    <fieldset>
    <legend>General:</legend>
        <div class="form-group">
            {{ Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name', 'id'=>'name']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('in_menu', 'Show in inspiration menu', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>{{ Form::checkbox('in_menu', 1) }}</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('link', 'Link', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                @if(Route::currentRouteName() == 'inspiration.edit')
                    {{ Form::text('link', null, ['class'=>'form-control', 'placeholder'=>'Link', 'id'=>'slug', 'readonly']) }}
                @else
                    {{ Form::text('link', null, ['class'=>'form-control', 'placeholder'=>'Link', 'id'=>'slug']) }}
                @endif
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('title', 'Title', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('desc', 'Descripton', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {{ Form::textarea('desc', null, ['class'=>'form-control tinymce-editor']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('order', 'Order', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('order', old('order') ? old('order') : isset($order) ? $order : null, ['class'=>'form-control', 'placeholder'=>'Order']) }}
            </div>
        </div>        
    </fieldset>
    <fieldset>
    <legend>Company:</legend>        
        <div class="form-group">
            {{ Form::label('img_above_logo', 'Image above logo', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4 input-file">
                @if(isset($inspiration->img_above_logo))
                    {{ Form::file('img_above_logo', ['class'=>'form-control hidden']) }}
                    <p class="file-name">/inspiration/{{ $inspiration->img_above_logo }} <a href="#" class="delete-file" style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                    <div class="edit-img"><a href="{{asset('/storage/inspiration/'.$inspiration->img_above_logo)}}" target="_blank"><img src="{{asset('/storage/inspiration/'.$inspiration->img_above_logo)}}" data-origin="/storage/inspiration/original/{{$inspiration->img_above_logo}}" class="img-responsive" alt=""></a></div>                    
                @else
                    {{ Form::file('img_above_logo', ['class'=>'form-control']) }}
                @endif
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('img_above_logo_link', 'Above image link', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('img_above_logo_link', null, ['class'=>'form-control', 'placeholder'=>'Above image link']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('logo_img', 'Logo image', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4 input-file">
                @if(isset($inspiration->logo_img))
                    {{ Form::file('logo_img', ['class'=>'form-control hidden']) }}
                    <p class="file-name">/inspiration/{{ $inspiration->logo_img }} <a href="#" class="delete-file" style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                    <div class="edit-img"><a href="{{asset('/storage/inspiration/'.$inspiration->logo_img)}}" target="_blank"><img src="{{asset('/storage/inspiration/'.$inspiration->logo_img)}}" data-origin="/storage/inspiration/original/{{$inspiration->logo_img}}" class="img-responsive" alt=""></a></div>                    
                @else
                    {{ Form::file('logo_img', ['class'=>'form-control']) }}
                @endif
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('short_desc', 'Short descripton', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {{ Form::textarea('short_desc', null, ['class'=>'form-control tinymce-editor']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('brochure_link', 'Brochure link', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('brochure_link', null, ['class'=>'form-control', 'placeholder'=>'Brochure link']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('locator_link', 'Locator link', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('locator_link', null, ['class'=>'form-control', 'placeholder'=>'Locator link']) }}
            </div>
        </div>
    </fieldset>        
    <fieldset>
        <legend>Images:</legend>    
        <div class="form-group">
            {{ Form::label('main_img', 'Main image', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4 input-file">
                @if(isset($inspiration->main_img))
                    {{ Form::file('main_img', ['class'=>'form-control hidden']) }}
                    <p class="file-name">/inspiration/{{ $inspiration->main_img }} <a href="#" class="delete-file" style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                    <div class="edit-img"><a href="{{asset('/storage/inspiration/'.$inspiration->main_img)}}" target="_blank"><img src="{{asset('/storage/inspiration/'.$inspiration->main_img)}}" data-origin="/storage/inspiration/original/{{$inspiration->main_img}}" class="img-responsive" alt=""></a></div>                    
                @else
                    {{ Form::file('main_img', ['class'=>'form-control']) }}
                @endif
            </div>
        </div>        
        <div class="form-group">
            {{ Form::label('main_img_link', 'Main image link', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('main_img_link', null, ['class'=>'form-control', 'placeholder'=>'Main image link']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('first_img', 'First image', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4 input-file">
                @if(isset($inspiration->first_img))
                    {{ Form::file('first_img', ['class'=>'form-control hidden']) }}
                    <p class="file-name">/inspiration/{{ $inspiration->first_img }} <a href="#" class="delete-file" style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                    <div class="edit-img"><a href="{{asset('/storage/inspiration/'.$inspiration->first_img)}}" target="_blank"><img src="{{asset('/storage/inspiration/'.$inspiration->first_img)}}" data-origin="/storage/inspiration/original/{{$inspiration->first_img}}" class="img-responsive" alt=""></a></div>                    
                @else
                    {{ Form::file('first_img', ['class'=>'form-control']) }}
                @endif                
            </div>
        </div>        
        <div class="form-group">
            {{ Form::label('first_img_link', 'First image link', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('first_img_link', null, ['class'=>'form-control', 'placeholder'=>'First image link']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('second_img', 'Second image', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4 input-file">
                @if(isset($inspiration->second_img))
                    {{ Form::file('second_img', ['class'=>'form-control hidden']) }}
                    <p class="file-name">/inspiration/{{ $inspiration->second_img }} <a href="#" class="delete-file" style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                    <div class="edit-img"><a href="{{asset('/storage/inspiration/'.$inspiration->second_img)}}" target="_blank"><img src="{{asset('/storage/inspiration/'.$inspiration->second_img)}}" data-origin="/storage/inspiration/original/{{$inspiration->second_img}}" class="img-responsive" alt=""></a></div>                    
                @else
                    {{ Form::file('second_img', ['class'=>'form-control']) }}
                @endif                                
            </div>
        </div>        
        <div class="form-group">
            {{ Form::label('second_img_link', 'Second image link', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('second_img_link', null, ['class'=>'form-control', 'placeholder'=>'Second image link']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('third_img', 'Third image', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4 input-file">
                @if(isset($inspiration->third_img))
                    {{ Form::file('third_img', ['class'=>'form-control hidden']) }}
                    <p class="file-name">/inspiration/{{ $inspiration->third_img }} <a href="#" class="delete-file" style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                    <div class="edit-img"><a href="{{asset('/storage/inspiration/'.$inspiration->third_img)}}" target="_blank"><img src="{{asset('/storage/inspiration/'.$inspiration->third_img)}}" data-origin="/storage/inspiration/original/{{$inspiration->third_img}}" class="img-responsive" alt=""></a></div>                    
                @else
                    {{ Form::file('third_img', ['class'=>'form-control']) }}
                @endif                                                
            </div>
        </div>        
        <div class="form-group">
            {{ Form::label('third_img_link', 'Third image link', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('third_img_link', null, ['class'=>'form-control', 'placeholder'=>'Third image link']) }}
            </div>
        </div>                        
    </fieldset>       
    <fieldset>
        <legend>Products</legend>
        <button type="button" id="add_new_product" class="btn btn-success">+ Add product</button>
        <div class="product__container">
            @if (old('products'))
                @foreach (old('products') as $key=>$item)
                    <div class="form-group">
                        {{ Form::label('products['.$key.'][product_img]', 'Image', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4 input-file">
                            {{ Form::file('products['.$key.'][product_img]', ['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('products['.$key.'][title]', 'Title', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('products['.$key.'][title]', isset($item['title']) ? $item['title'] : null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
                        </div>
                    </div>                        
                    <div class="form-group">
                        {{ Form::label('products['.$key.'][link]', 'Link', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('products['.$key.'][link]', isset($item['link']) ? $item['link '] : null, ['class'=>'form-control', 'placeholder'=>'Link']) }}
                        </div>
                    </div>
                    <hr/>                                        
                @endforeach
            @elseif(isset($inspiration->products))
                @foreach ($inspiration->products as $key=>$item)
                    <div class="form-group">
                        <input type="hidden" name="products[{{$key}}][old_img]" value="{{ $item->product_img }}">
                        {{ Form::label('products['.$key.'][product_img]', 'Image', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4 input-file">
                            @if(isset($item->product_img))
                                {{ Form::file('products['.$key.'][product_img]', ['class'=>'form-control hidden']) }}
                                <p class="file-name">/inspiration/{{ $item->product_img }} <a href="#" class="delete-file" style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                                <div class="edit-img"><a href="{{asset('/storage/inspiration/'.$item->product_img)}}" target="_blank"><img src="{{asset('/storage/inspiration/'.$item->product_img)}}" data-origin="/storage/inspiration/original/{{$item->product_img}}" class="img-responsive" alt=""></a></div>                    
                            @else
                                {{ Form::file('products['.$key.'][product_img]', ['class'=>'form-control']) }}
                            @endif                                                            
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('products['.$key.'][title]', 'Title', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('products['.$key.'][title]', isset($item->title) ? $item->title : null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
                        </div>
                    </div>                        
                    <div class="form-group">
                        {{ Form::label('products['.$key.'][link]', 'Link', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('products['.$key.'][link]', isset($item->link) ? $item->link : null, ['class'=>'form-control', 'placeholder'=>'Link']) }}
                        </div>
                    </div>
                    <hr/>                                        
                @endforeach    
            @endif
        </div>
    </fieldset>              
</div>

<div class="box-footer">
    {{ link_to_route('inspiration.index', 'Cancel', [], ['class'=>'btn btn-default', 'role'=>'button']) }}
    {{ Form::button('Save', ['class'=>'btn btn-success pull-right', 'type'=>'submit']) }}    
</div>
    
{!! Form::close() !!}

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

@push('scripts')
<script>
    $(document).on('focus', '#slug', function(){
        var str = $('#name').val().trim().replace(/[^a-z0-9-]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');

       $(this).val(str.toLowerCase());
    });

    $(".delete-file").on('click', function(e){
            e.preventDefault();
            $(this).parent('.file-name').hide();
            $(this).parent('.file-name').parent('.input-file').find(".file-input").removeClass('hidden');
            $(this).parent('.file-name').parent('.input-file').find(".edit-img").addClass('hidden');
    });

    var iterator = {{$lastProducts}};
    $(document).on('click', '#add_new_product', function(e){
        e.preventDefault();
        var container = $(".product__container");
        var tpl = $("#new_product_tpl");
        container.append(tpl.html().replace(/#iterator#/g, iterator));
        iterator++;
    })
</script>
<script id="new_product_tpl" type="text/template">
    <div class="form-group">
        <label class="col-sm-2 control-label">Image</label>
        <div class="col-sm-4 input-file">
            <input type="file" class="form-control" name="products[#iterator#][product_img]" >
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Title</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="products[#iterator#][title]" placeholder="Title">
        </div>
    </div>                        
    <div class="form-group">
        <label class="col-sm-2 control-label">Link</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="products[#iterator#][link]" placeholder="Link">
        </div>
    </div>
    <hr/>                        
</script>
@endpush