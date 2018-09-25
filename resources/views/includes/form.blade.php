{!! Form::open(array('url' => 'contacts/store', 'id' => 'form-with-validation', 'class' => 'form')) !!}
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      {!! Form::text('contact_name', old('contact_name'), array('class'=>'form-control','required' => '','placeholder' => __('common.yourname'))) !!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      {!! Form::text('contact_phone', old('contact_phone'), array('class'=>'form-control','required' => '','placeholder' => __('common.yourphone'))) !!}
      {!! Form::text('contact_required_email', old('contact_required_email'), array('class'=>'form-control-required-email')) !!}
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      {!! Form::email('contact_email', old('contact_email'), array('class'=>'form-control','placeholder' => __('common.youremail'))) !!}
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      {!! Form::textarea('contact_text', old('contact_text'), array('class'=>'form-control','rows' => 5,'placeholder' => __('common.yourmessage'))) !!}
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      <label class="control-label required-label">
        <input type="checkbox" required> @lang('common.dataprocessing')
      </label>
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      {!! NoCaptcha::display() !!}
    </div>
  </div>
  <div class="col-md-12">
    <div class="text-center">
      {!! Form::submit( __('common.send') , array('class' => 'btn btn-primary')) !!}
    </div>
  </div>
</div>
{!! Form::close() !!}
<div class="ajax-response text-center" id="contact-response">
  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>{{ trans('quickadmin::auth.whoops') }}</strong> {{ trans('quickadmin::auth.some_problems_with_input') }}
    <br><br>
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
</div>
