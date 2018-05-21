<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\FoodCategories;

class RestoranController extends Controller
{
  public function getData(Request $request, $name = "default")
  {
    $lang = $request->route()->getAction()['lang_id'];
    if ($name == "default") {
      $data['RestoranData'] = FoodCategories::where('language_id', $lang)->get();
      return view('pages.restoran',$data);
    } else {
      $categories = FoodCategories::where('food_cat_slug', $name)->first();
      if ($categories == '') {
        abort(404);
      }else {
        $data['Category'] = $categories;
        $data['RestoranData'] = Food::where('foodcategories_id', $categories['id'])
        ->where('language_id', $lang)->get();
        return view('pages.restoranCat',$data);
      }
    }
  }
}
