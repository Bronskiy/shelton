<ul class="categories-inner">
  @foreach ($roomCategories as $cat)
  <li><a href="/category/{{ $cat->room_cat_slug }}">{{ $cat->room_cat_title }}</a></li>
  @endforeach
</ul>
