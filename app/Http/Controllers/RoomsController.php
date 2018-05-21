<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rooms;
use App\RoomCategories;

class RoomsController extends Controller
{
  public function getData(Request $request, $name = "default")
  {
    $lang = $request->route()->getAction()['lang_id'];
    if ($name == "default") {
      $data['RoomsData'] = Rooms::where('language_id', $lang)
      ->get();
      return view('pages.rooms',$data);
    } else {
      $data['RoomsData'] = Rooms::where('room_slug', $name)->where('language_id', $lang)->first();
      $data['lang_id'] = $lang;
      if (empty($data['RoomsData'])) {
        return redirect('/rooms');
      };
      $data['Related'] = Rooms::where('roomcategories_id', $data['RoomsData']['roomcategories_id'])
      ->where('id', '!=', $data['RoomsData']['id'])
      ->where('language_id', $lang)
      ->take(6)
      ->get();
      return view('pages.roomsDetail',$data);
    }
  }
  public function getCategoryData(Request $request, $name = "default")
  {
    $lang = $request->route()->getAction()['lang_id'];
    if ($name == "default") {
      abort(404);
    } else {
      $categories = RoomCategories::where('room_cat_slug', $name)->first();
      if ($categories == '') {
        abort(404);
      }else {
        $data['Category'] = $categories;
        $data['RoomsData'] = Rooms::where('roomcategories_id', $categories['id'])
        ->where('language_id', $lang)
        ->get();
        return view('pages.roomsCategory',$data);
      }
    }
  }
}
