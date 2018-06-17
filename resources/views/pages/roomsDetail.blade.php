@extends('layouts.default')

@section('meta_title', $RoomsData->room_title)
@section('content')
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image:url('{{ asset('uploads') . '/'.  $RoomsData->room_photo }}');">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="list">
					<li><a href="/">@lang('common.home')</a></li>
					<li><a href="/rooms">@lang('common.rooms')</a></li>
				</ul>
				<h2>{{ $RoomsData->room_title }}</h2>
			</div>
		</div>
	</div>
</div>
<section id="trip-single" class="trip-single blog-area single section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="trip-details">
					<div class="trip-gallery">
						<div class="gallery-slider">
							@foreach($RoomsData->getMedia('room_gallery') as $media)
							<div class="single-slider">
								<img src="{{ Image::url($media->getUrl(),750,450,array('crop')) }}" alt="{{ $RoomsData->room_title }} {{ $media->name }}" />
							</div>
							@endforeach
						</div>
					</div>
					<div class="trip-content">
						<div class="trip-head">
							<h2>{{ $RoomsData->room_title }}</h2>
							<p>@lang('common.price')<br />
								@if (! empty($RoomsData->room_price))
								<span class="price">{{ $RoomsData->room_price }} <i class="fas fa-ruble-sign"></i></span><span> / @lang('common.forHour')</span><br />
								@endif
								<!--
								@if (! empty($RoomsData->room_price_night))
								<span class="price">{{ $RoomsData->room_price_night }} <i class="fas fa-ruble-sign"></i></span><span> / @lang('common.forNight')</span><br />
								@endif
								@if (! empty($RoomsData->room_price_24))
								<span class="price">{{ $RoomsData->room_price_24 }} <i class="fas fa-ruble-sign"></i></span><span> / @lang('common.for24')</span>
								@endif
							-->
							</p>
						</div>
						<div>{!! $RoomsData->room_text !!}</div>
					</div>
					<div class="trip-tab">
						<div class="trip-tab-inner">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#t-tab8" role="tab">@lang('common.leaveAReview')</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#t-tab9" role="tab">@lang('common.reviews')</a></li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="t-tab8" role="tabpanel">
									@include('includes.comment-form')
								</div>
								<div class="tab-pane fade" id="t-tab9" role="tabpanel" >
									<div class="blog-comments">
										<div class="comments-body">
											@forelse($RoomComments as $value)
											<div class="single-comments">
												<div class="main">
													<div class="body">
														<h4>{{ $value->comment_name }}<span class="meta">{{ Carbon\Carbon::parse($value->created_at)->formatLocalized('%d %b %Y') }}</span></h4>
														<p>{{ $value->comment_text }}</p>
													</div>
												</div>
												@if ($value->comment_admin)
												<div class="comment-list">
													<div class="body">
														<h4>@lang('common.admin')</h4>
														<p>{{ $value->comment_admin }}</p>
													</div>
												</div>
												@endif
											</div>
											@empty
											<p>@lang('common.noReviews')</p>
											@endforelse
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-12">
				<div class="sidebar-main">
					<div class="single-widget booking">
						<h2>@lang('common.booking')</h2>
						{!! Form::open(array('url' => 'order', 'class' => 'form')) !!}
						<input type="hidden" name="rooms_id" value="{{ $RoomsData->id }}">
						<div class="form-group date">
							<h4>@lang('common.arrival')</h4>
							<input type="text" name="order_user_arrival" class="datetimepicker-input" id="datetimepicker" data-toggle="datetimepicker" data-target="#datetimepicker" autocomplete="off"/>
							<i class="fa fa-calendar"></i>
						</div>
						<div class="form-group date">
							<h4>@lang('common.departure')</h4>
							<input type="text" name="order_user_departure" class="datetimepicker-input" id="datetimepicker2" data-toggle="datetimepicker" data-target="#datetimepicker2" autocomplete="off"/>
							<i class="fa fa-calendar"></i>
						</div>
						<div class="form-group button">
							<button type="submit" class="btn">@lang('common.book')</button>
						</div>
						{!! Form::close() !!}
						<div class="ajax-response text-center" id="book-response">
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
					<div class="single-widget categories">
						<h2>@lang('common.roomsCategories')</h2>
						@include('includes.roomsCatWidget')
					</div>
					<div class="single-widget other-trips">
						<h2>@lang('common.lookAtRooms')</h2>
						<div class="trips">
							@include('includes.roomsWidget')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop
