@foreach ($rooms as $room)
@if($loop->index < 5)
<div class="signle-trip">
  <a href="/rooms/{{ $room->room_slug }}">
  <img src="{{ asset('uploads') . '/'.  $room->room_photo }}" alt="{{ $room->room_title }}">
</a>
  <div class="text">
    <h4><a href="/rooms/{{ $room->room_slug }}">{{ $room->room_title }}</a></h4>
    <p>Lorem ipsum dolor sit amet, consectetur </p>
  </div>
</div>
@endif
@endforeach
<a href="/rooms" class="btn">Все номера</a>
