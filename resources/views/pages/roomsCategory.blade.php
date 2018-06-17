@extends('layouts.default')

@section('meta_title', __('common.rooms'))
@section('content')
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image:url('/assets/img/background-rooms.jpg');">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="list">
					<li><a href="/">@lang('common.home')</a></li>
					<li><a href="/rooms">@lang('common.rooms')</a></li>
				</ul>
				<h2>{{ $Category->room_cat_title }}</h2>
			</div>
		</div>
	</div>
</div>

<section id="top-destination" class="top-destination section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="row">
					@foreach ($RoomsData as $value)
					<div class="col-lg-6 col-12">
						<!-- Single Package -->
						<div class="single-package">
							<div class="trip-head">
								<a href="/rooms/{{ $value->room_slug }}">
									<img src="{{ Image::url(asset('uploads') . '/'.  $value->room_photo,358,239,array('crop')) }}" alt="{{ $value->room_title }}" />
								</a>
							</div>
							<div class="trip-details">
								<div class="left">
									<h4><a href="/rooms/{{ $value->room_slug }}">{{ $value->room_title }}</a></h4>
									<!--<p><i class="fa fa-clock-o"></i>3 Nights 4 Days</p>-->
								</div>
								<div class="right">
									<p>@lang('common.forHour')<span>{{ $value->room_price }} <i class="fas fa-ruble-sign"></i></span></p>
								</div>
								<a href="/rooms/{{ $value->room_slug }}" class="btn primary">Подробнее</a>
							</div>
						</div>
						<!--/ End Single Package -->
					</div>
					@endforeach

				</div>
			</div>
			<div class="col-lg-4 col-12">
				<div class="sidebar-main">
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
					<div class="single-widget categories">
						<h2>@lang('common.restoran')</h2>
						@include('includes.foodCatWidget')
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Tour Package -->

@stop
