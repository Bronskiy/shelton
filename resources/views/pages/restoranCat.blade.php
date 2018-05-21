@extends('layouts.default')

@section('meta_title', __('common.restoran'))
@section('content')
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="list">
					<li><a href="/">@lang('common.home')</a></li>
					<li><a href="/restoran">@lang('common.restoran')</a></li>
				</ul>
				<h1>{{ $Category->food_cat_title }}</h1>
			</div>
		</div>
	</div>
</div>
<section id="top-destination" class="top-destination section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="row">
					@foreach ($RestoranData as $value)
					<div class="col-lg-6 col-12">
						<div class="single-package">
							<div class="trip-head">
								@if ($value->food_image)
								<img src="{{ asset('uploads') . '/'.  $value->food_image }}" alt="{{ $value->food_title }}">
								@else
								<img src="https://via.placeholder.com/261x163?text={{ $value->food_title }}" alt="{{ $value->food_title }}">
								@endif
							</div>
							<div class="trip-details">
								<div class="left">
									<h4>{{ $value->food_title }}</h4>
									<p><i class="fa fa-clock-o"></i>{{ $value->food_cat_slug }}</p>
								</div>
								<div class="right">
									<p>{{ $value->food_qty }}<span>{{ $value->food_price }}</span></p>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="col-lg-4 col-12">
				<div class="sidebar-main">
					<div class="single-widget categories">
						<h2>@lang('common.restoran')</h2>
						@include('includes.foodCatWidget')
					</div>
					<div class="single-widget other-trips">
						<h2>@lang('common.ourRooms')</h2>
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
