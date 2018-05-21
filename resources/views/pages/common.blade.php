@extends('layouts.default')
@foreach ($CommonData as $value)
@if ($value->about_title)
<?php
$title = $value->about_title;
$description = $value->about_description;
?>
@elseif ($value->legal_title)
<?php
$title = $value->legal_title;
$description = $value->legal_description;
?>
@elseif ($value->privacy_title)
<?php
$title = $value->privacy_title;
$description = $value->privacy_description;
?>
@elseif ($value->copyright_title)
<?php
$title = $value->copyright_title;
$description = $value->copyright_description;
?>
@elseif ($value->mission_title)
<?php
$title = $value->mission_title;
$description = $value->mission_description;
?>
@elseif ($value->membership_title)
<?php
$title = $value->membership_title;
$description = $value->membership_description;
?>
@endif

@section('meta_title', $title )
@section('content')
<section class="spec-page-title">
  <div class="container">
    <div class="row-page-title">
      <div class="page-title-captions">
        <h1 class="h5">
          {{ $title }}
        </h1>
      </div>
      <div class="page-title-secondary">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">@lang('common.home')</a></li>
          <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="spec spec-divider-bottom pb-0">
  <div class="container">
    <div class="row m-b-100">
      <div class="col-lg-8 mt-5">
        {!! $description !!}
      </div>
      @include('includes.sidebar')
    </div>
  </div>
</section>
@endforeach
@stop
