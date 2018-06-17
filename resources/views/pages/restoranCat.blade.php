@extends('layouts.default')

@section('meta_title', $Category->food_cat_title)
@section('content')
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image:url('{{ asset('uploads') . '/'.  $Category->food_cat_photo }}');">
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
						<div class="single-food">
							<div class="food-head">
								@if ($value->food_image)
								<img src="{{ Image::url(asset('uploads') . '/'.  $value->food_image,300,300,array('crop')) }}" />
								@else
								<img src="https://via.placeholder.com/300x300?text={{ $value->food_title }}" alt="{{ $value->food_title }}">
								@endif
							</div>
							<div class="food-details">
								<div class="left">
									<h5>{{ $value->food_title }}</h5>
									<p>{{ $value->food_consist }}</p>
								</div>
								<div class="right">
									<p>{{ $value->food_qty }} <span class="price">{{ $value->food_price }} <i class="fas fa-ruble-sign"></i></span></p>
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
