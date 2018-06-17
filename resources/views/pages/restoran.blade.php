@extends('layouts.default')

@section('meta_title', __('common.restoran'))
@section('content')
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image:url('/assets/img/background-food.jpg');">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="list">
					<li><a href="/">@lang('common.home')</a></li>
					<li><a href="package-4-column">@lang('common.restoran')</a></li>
				</ul>
				<h2>@lang('common.restoranDesc')</h2>
			</div>
		</div>
	</div>
</div>

<section id="p-destination" class="p-destination section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Destination -->
				<div class="destination-main">
					<div class="row">
						@foreach ($RestoranData as $value)
						<div class="col-lg-3 col-12">
							<a href="/restoran/{{ $value->food_cat_slug }}">
								<div class="single-destination overlay">
									@if ($value->food_cat_photo)
									<img src="{{ Image::url(asset('uploads') . '/'.  $value->food_cat_photo,263,175,array('crop')) }}" alt="{{ $value->food_cat_title }}" />
									@else
									<img src="https://via.placeholder.com/263x175?text={{ $value->food_cat_title }}" alt="{{ $value->food_cat_title }}">
									@endif
									<div class="hover">
										<h4 class="name">{{ $value->food_cat_title }}</h4>
										<p class="location">Подробнее</p>
									</div>
								</div>
							</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop
