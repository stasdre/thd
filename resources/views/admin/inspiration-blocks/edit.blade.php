@extends('admin.layouts.master')

@section('title', 'Inspiration Home Page blocks')

@section('content')
    <div class="box box-default">
        {!! Form::model($data, ['route' => 'inspiration-blocks.update', 'class' => 'form-horizontal', 'method' => 'post', 'enctype'=>'multipart/form-data']) !!}
        <div class="box-body">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tl" aria-controls="general" role="tab" data-toggle="tab">Top left</a></li>
                <li role="presentation"><a href="#tr" aria-controls="details" role="tab" data-toggle="tab">Top right</a></li>
                <li role="presentation"><a href="#bl" aria-controls="details" role="tab" data-toggle="tab">Bottom left</a></li>
                <li role="presentation"><a href="#br" aria-controls="details" role="tab" data-toggle="tab">Bottom right</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="tl">
                    <div class="form-group">
                        {{ Form::label('first_title_l_t', 'First title', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('first_title_l_t', null, ['class'=>'form-control', 'placeholder'=>'Title', 'id'=>'first_title_l_t']) }}
                        </div>
                    </div>                            
                    <div class="form-group">
                        {{ Form::label('title_l_t', 'Title', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('title_l_t', null, ['class'=>'form-control', 'placeholder'=>'Title', 'id'=>'title_l_t']) }}
                        </div>
                    </div>   
                    <div class="form-group">
                        {{ Form::label('desc_l_t', 'Descripton', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::textarea('desc_l_t', null, ['class'=>'form-control tinymce-editor']) }}
                        </div>
                    </div> 
                    <div class="form-group">
                        {{ Form::label('link_name_l_t', 'Link title', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('link_name_l_t', null, ['class'=>'form-control', 'placeholder'=>'Link title']) }}
                        </div>
                    </div>                    
                    <div class="form-group">
                        {{ Form::label('link_l_t', 'Link', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('link_l_t', null, ['class'=>'form-control', 'placeholder'=>'Link']) }}
                        </div>
                    </div>  
                    <div class="form-group">
                        {{ Form::label('img_l_t', 'Image', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4 input-file">
                            @if(isset($data->img_l_t))
                                {{ Form::file('img_l_t', ['class'=>'form-control hidden']) }}
                                <p class="file-name">/inspiration-blocks/{{ $data->img_l_t }} <a href="#" class="delete-file" style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                                <div class="edit-img"><a href="{{asset('/storage/inspiration-blocks/'.$data->img_l_t)}}" target="_blank"><img src="{{asset('/storage/inspiration-blocks/'.$data->img_l_t)}}" data-origin="/storage/inspiration-blocks/original/{{$data->img_l_t}}" class="img-responsive" alt=""></a></div>                    
                            @else
                                {{ Form::file('img_l_t', ['class'=>'form-control']) }}
                            @endif
                        </div>
                    </div>                    
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="tr">
                    <div class="form-group">
                        {{ Form::label('first_title_r_t', 'First title', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('first_title_r_t', null, ['class'=>'form-control', 'placeholder'=>'Title', 'id'=>'first_title_r_t']) }}
                        </div>
                    </div>                            
                    <div class="form-group">
                        {{ Form::label('title_r_t', 'Title', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('title_r_t', null, ['class'=>'form-control', 'placeholder'=>'Title', 'id'=>'title_r_t']) }}
                        </div>
                    </div>   
                    <div class="form-group">
                        {{ Form::label('desc_r_t', 'Descripton', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::textarea('desc_r_t', null, ['class'=>'form-control tinymce-editor']) }}
                        </div>
                    </div> 
                    <div class="form-group">
                        {{ Form::label('link_name_r_t', 'Link title', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('link_name_r_t', null, ['class'=>'form-control', 'placeholder'=>'Link title']) }}
                        </div>
                    </div>                    
                    <div class="form-group">
                        {{ Form::label('link_r_t', 'Link', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('link_r_t', null, ['class'=>'form-control', 'placeholder'=>'Link']) }}
                        </div>
                    </div>  
                    <div class="form-group">
                        {{ Form::label('img_r_t', 'Image', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4 input-file">
                            @if(isset($data->img_r_t))
                                {{ Form::file('img_r_t', ['class'=>'form-control hidden']) }}
                                <p class="file-name">/inspiration-blocks/{{ $data->img_r_t }} <a href="#" class="delete-file" style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                                <div class="edit-img"><a href="{{asset('/storage/inspiration-blocks/'.$data->img_r_t)}}" target="_blank"><img src="{{asset('/storage/inspiration-blocks/'.$data->img_r_t)}}" data-origin="/storage/inspiration-blocks/original/{{$data->img_r_t}}" class="img-responsive" alt=""></a></div>                    
                            @else
                                {{ Form::file('img_r_t', ['class'=>'form-control']) }}
                            @endif
                        </div>
                    </div>                            
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="bl">
                    <div class="form-group">
                        {{ Form::label('first_title_b_l', 'First title', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('first_title_b_l', null, ['class'=>'form-control', 'placeholder'=>'Title', 'id'=>'first_title_b_l']) }}
                        </div>
                    </div>                            
                    <div class="form-group">
                        {{ Form::label('title_b_l', 'Title', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('title_b_l', null, ['class'=>'form-control', 'placeholder'=>'Title', 'id'=>'title_b_l']) }}
                        </div>
                    </div>   
                    <div class="form-group">
                        {{ Form::label('desc_b_l', 'Descripton', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::textarea('desc_b_l', null, ['class'=>'form-control tinymce-editor']) }}
                        </div>
                    </div> 
                    <div class="form-group">
                        {{ Form::label('link_name_b_l', 'Link title', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('link_name_b_l', null, ['class'=>'form-control', 'placeholder'=>'Link title']) }}
                        </div>
                    </div>                    
                    <div class="form-group">
                        {{ Form::label('link_b_l', 'Link', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('link_b_l', null, ['class'=>'form-control', 'placeholder'=>'Link']) }}
                        </div>
                    </div>  
                    <div class="form-group">
                        {{ Form::label('img_b_l', 'Image', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4 input-file">
                            @if(isset($data->img_b_l))
                                {{ Form::file('img_b_l', ['class'=>'form-control hidden']) }}
                                <p class="file-name">/inspiration-blocks/{{ $data->img_b_l }} <a href="#" class="delete-file" style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                                <div class="edit-img"><a href="{{asset('/storage/inspiration-blocks/'.$data->img_b_l)}}" target="_blank"><img src="{{asset('/storage/inspiration-blocks/'.$data->img_b_l)}}" data-origin="/storage/inspiration-blocks/original/{{$data->img_b_l}}" class="img-responsive" alt=""></a></div>                    
                            @else
                                {{ Form::file('img_b_l', ['class'=>'form-control']) }}
                            @endif
                        </div>
                    </div>                            
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="br">
                    <div class="form-group">
                        {{ Form::label('first_title_b_r', 'First title', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('first_title_b_r', null, ['class'=>'form-control', 'placeholder'=>'Title', 'id'=>'first_title_b_r']) }}
                        </div>
                    </div>                            
                    <div class="form-group">
                        {{ Form::label('title_b_r', 'Title', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('title_b_r', null, ['class'=>'form-control', 'placeholder'=>'Title', 'id'=>'title_b_r']) }}
                        </div>
                    </div>   
                    <div class="form-group">
                        {{ Form::label('desc_b_r', 'Descripton', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::textarea('desc_b_r', null, ['class'=>'form-control tinymce-editor']) }}
                        </div>
                    </div> 
                    <div class="form-group">
                        {{ Form::label('link_name_b_r', 'Link title', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('link_name_b_r', null, ['class'=>'form-control', 'placeholder'=>'Link title']) }}
                        </div>
                    </div>                    
                    <div class="form-group">
                        {{ Form::label('link_b_r', 'Link', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('link_b_r', null, ['class'=>'form-control', 'placeholder'=>'Link']) }}
                        </div>
                    </div>  
                    <div class="form-group">
                        {{ Form::label('img_b_r', 'Image', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4 input-file">
                            @if(isset($data->img_b_r))
                                {{ Form::file('img_b_r', ['class'=>'form-control hidden']) }}
                                <p class="file-name">/inspiration-blocks/{{ $data->img_b_r }} <a href="#" class="delete-file" style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                                <div class="edit-img"><a href="{{asset('/storage/inspiration-blocks/'.$data->img_b_r)}}" target="_blank"><img src="{{asset('/storage/inspiration-blocks/'.$data->img_b_r)}}" data-origin="/storage/inspiration-blocks/original/{{$data->img_b_r}}" class="img-responsive" alt=""></a></div>                    
                            @else
                                {{ Form::file('img_b_r', ['class'=>'form-control']) }}
                            @endif
                        </div>
                    </div>                            
                </div>            
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {{ Form::button('Save', ['class'=>'btn btn-success pull-right', 'type'=>'submit']) }}
        </div>
        <!-- /.box-footer -->
        {!! Form::close() !!}
    </div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush
@push('scripts')
<script>
$(".delete-file").on('click', function(e){
    e.preventDefault();
    $(this).parent('.file-name').hide();
    $(this).parent('.file-name').parent('.input-file').find(".file-input").removeClass('hidden');
    $(this).parent('.file-name').parent('.input-file').find(".edit-img").addClass('hidden');
});
</script>
@endpush