@if(Route::currentRouteName() == 'user.edit')
    {{ Form::model($user, ['route' => ['user.update', $user->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) }}
@else
    {!! Form::open(['route' => 'user.store', 'class' => 'form-horizontal', 'method' => 'post']) !!}
@endif
<div class="box-body">
    <div class="form-group">
        {{ Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('alt_email', 'Alternate Email', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::email('alt_email', null, ['class'=>'form-control', 'placeholder'=>'Email']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('role_user', 'User Role', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {!! Form::select('role_user', $roles, 5, ['class' => 'form-control', 'id' => 'role-select']) !!}
        </div>
    </div>
    <hr>
    <h4>Enter Contact</h4>
    <div class="form-group">
        {{ Form::label('first_name', 'First Name', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('first_name', null, ['class'=>'form-control', 'placeholder'=>'First Name']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('last_name', 'Last Name', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('last_name', null, ['class'=>'form-control', 'placeholder'=>'Last Name']) }}
        </div>
    </div>
    <div class="form-group hidden" id="company-input">
        {{ Form::label('company', 'Company', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('company', null, ['class'=>'form-control', 'placeholder'=>'Company']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('phone', 'Phone', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('phone', null, ['class'=>'form-control', 'placeholder'=>'Phone']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('alt_phone', 'Alternate Phone', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('alt_phone', null, ['class'=>'form-control', 'placeholder'=>'Phone']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('mob_phone', 'Mobile Phone', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('mob_phone', null, ['class'=>'form-control', 'placeholder'=>'Mobile Phone']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('fax', 'Fax', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('fax', null, ['class'=>'form-control', 'placeholder'=>'Fax']) }}
        </div>
    </div>
    <hr>
    <h4>Enter Contact Address</h4>
    <div class="form-group">
        {{ Form::label('zip', 'Zip', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('zip', null, ['class'=>'form-control', 'placeholder'=>'Zip']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('country', 'Country', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {!! Form::select('country', $countries, 'USA', ['class' => 'form-control', 'id' => 'country-select']) !!}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('state', 'State', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {!! Form::select('state', $states, null, ['class' => 'form-control', 'id' => 'state-select']) !!}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('city', 'City', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('city', null, ['class'=>'form-control', 'placeholder'=>'City']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('address_1', 'Address Line 1', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('address_1', null, ['class'=>'form-control', 'placeholder'=>'Address Line 1']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('address_2', 'Address Line 2', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('address_2', null, ['class'=>'form-control', 'placeholder'=>'Address Line 2']) }}
        </div>
    </div>
</div>
<div class="box-footer">
    {{ link_to_route('styles.index', 'Cancel', [], ['class'=>'btn btn-default', 'role'=>'button']) }}
    {{ Form::button('Save', ['class'=>'btn btn-success pull-right', 'type'=>'submit']) }}
</div>
<!-- /.box-footer -->
{!! Form::close() !!}

@push('scripts')
<script>
    $(function(){
       $("#role-select").on('change', function(){
          if( $(this).val() == '3' || $(this).val() == '4' ){
              $("#company-input").removeClass('hidden');
          }else{
              $("#company-input").addClass('hidden');
          }
       });

       $('#country-select').on('change', function(){
          $.ajax({
              dataType: 'json',
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: 'post',
              data: {country: $("#country-select").val()},
              url: '{{ route('getCountryState') }}',
              beforeSend: function(){
                  $("#state-select").prop('disabled', true);
                  $("#state-select").empty();
              },
              success: function(data){
                $.each( data, function( key, value ) {
                    $("#state-select").append('<option value="'+key+'">'+value+'</option>');
                });
                  $("#state-select").prop('disabled', false);
              }
          })
       });
    });
</script>
@endpush
