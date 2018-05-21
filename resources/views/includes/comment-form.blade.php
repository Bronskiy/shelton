{!! Form::open(array('url' => 'guestbook/store', 'id' => 'form-with-validation', 'class' => 'form')) !!}
<input type="hidden" name="language_id" value="{{ $lang_id }}">
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      {!! Form::text('comment_name', old('comment_name'), array('class'=>'form-control','required' => '','placeholder' => __('common.yourname'))) !!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      {!! Form::text('comment_phone', old('comment_phone'), array('class'=>'form-control','required' => '','placeholder' => __('common.yourphone'))) !!}
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      {!! Form::text('comment_email', old('comment_email'), array('class'=>'form-control','placeholder' => __('common.youremail'))) !!}
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      {!! Form::textarea('comment_text', old('comment_text'), array('class'=>'form-control','rows'=>5,'placeholder' => __('common.yourmessage'))) !!}
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
    <div class="form-group button">
      {!! Form::submit( __('common.send') , array('class' => 'btn btn-primary')) !!}
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
</div>
