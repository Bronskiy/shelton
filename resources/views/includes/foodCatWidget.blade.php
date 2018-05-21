<ul class="categories-inner">
  @foreach ($foodCategories as $cat)
  <li><a href="/restoran/{{ $cat->food_cat_slug }}">{{ $cat->food_cat_title }}</a></li>
  @endforeach
</ul>
