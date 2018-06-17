@extends('layouts.default')

@section('meta_title', __('common.rooms'))
@section('content')
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image:url('/assets/img/background-rooms.jpg');">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="list">
					<li><a href="/">@lang('common.home')</a></li>
					<li><a href="package-4-column">@lang('common.rooms')</a></li>
				</ul>
				<h2>@lang('common.roomsDesc')</h2>
			</div>
		</div>
	</div>
</div>
<section id="top-destination" class="top-destination section">
	<div class="container">
		<div class="row">
			@foreach ($RoomsData as $value)
			<div class="col-lg-3 col-md-6 col-12">
				<div class="single-package">
					<div class="trip-head">
						<a href="/rooms/{{ $value->room_slug }}">
							<img src="{{ Image::url(asset('uploads') . '/'.  $value->room_photo,338,225,array('crop')) }}" alt="{{ $value->room_title }}" />
						</a>
					</div>
					<div class="trip-details">
						<div class="left">
							<h4><a href="/rooms/{{ $value->room_slug }}">{{ $value->room_title }}</a></h4>
						</div>
						<div class="right">
							<p>@lang('common.forHour')<span>{{ $value->room_price }} <i class="fas fa-ruble-sign"></i></span></p>
						</div>
						<a href="/rooms/{{ $value->room_slug }}" class="btn primary">@lang('common.readMore')</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@stop
