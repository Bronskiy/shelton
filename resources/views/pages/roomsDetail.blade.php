@extends('layouts.default')

@section('meta_title', __('common.rooms'))
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
<section id="trip-single" class="trip-single section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="trip-details">
					<div class="trip-gallery">
						<div class="gallery-slider">
							@foreach($RoomsData->getMedia('room_gallery') as $media)
							<div class="single-slider"><img src="{{ $media->getUrl() }}" alt="{{ $RoomsData->room_title }} {{ $media->name }}"></div>
							@endforeach
						</div>
					</div>
					<div class="trip-content">
						<div class="trip-head">
							<h2>{{ $RoomsData->room_title }}</h2>
							<p>@lang('common.price')<br />
								@if (! empty($RoomsData->room_price))
								<span class="price">{{ $RoomsData->room_price }}</span><span> / @lang('common.forHour')</span><br />
								@endif
								@if (! empty($RoomsData->room_price_night))
								<span class="price">{{ $RoomsData->room_price_night }}</span><span> / @lang('common.forNight')</span><br />
								@endif
								@if (! empty($RoomsData->room_price_24))
								<span class="price">{{ $RoomsData->room_price_24 }}</span><span> / @lang('common.for24')</span>
								@endif
							</p>
						</div>
						<div>{!! $RoomsData->room_text !!}</div>
					</div>
				</div>

				<div class="comments-form">
					<h2>@lang('common.leaveAReview')</h2>
					@include('includes.comment-form')
				</div>

			</div>
			<div class="col-lg-4 col-12">
				<div class="sidebar-main">
					<div class="single-widget booking">
						<h2>@lang('common.booking')</h2>
						<form class="form">
							<div class="form-group date">
								<h4>@lang('common.arrival')</h4>
								<input type="text" id="datepicker">
								<i class="fa fa-calendar"></i>
							</div>
							<div class="form-group date">
								<h4>@lang('common.departure')</h4>
								<input type="text" id="datepicker2">
								<i class="fa fa-calendar"></i>
							</div>
							<div class="form-group button">
								<button type="submit" class="btn">@lang('common.book')</button>
							</div>
						</form>
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
