@foreach ($rooms as $room)
@if($loop->index < 5)
<div class="signle-trip">
  <a href="/rooms/{{ $room->room_slug }}">
  <img src="{{ Image::url(asset('uploads') . '/'.  $room->room_photo,100,85,array('crop')) }}" alt="{{ $room->room_title }}" />
</a>
  <div class="text">
    <h4><a href="/rooms/{{ $room->room_slug }}">{{ $room->room_title }}</a></h4>
    <p>
      @if (! empty($room->room_price))
      <span class="price">{{ $room->room_price }} <i class="fas fa-ruble-sign"></i></span><span> / @lang('common.forHour')</span><br />
      @endif
      <!--
      @if (! empty($room->room_price_night))
      <span class="price">{{ $room->room_price_night }} <i class="fas fa-ruble-sign"></i></span><span> / @lang('common.forNight')</span><br />
      @endif
      @if (! empty($room->room_price_24))
      <span class="price">{{ $room->room_price_24 }} <i class="fas fa-ruble-sign"></i></span><span> / @lang('common.for24')</span>
      @endif
    -->
    </p>
  </div>
</div>
@endif
@endforeach
<a href="/rooms" class="btn">@lang('common.allRooms')</a>
