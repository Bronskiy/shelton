<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rooms;
use App\RoomCategories;
use App\Comments;

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
      $data['RoomComments'] = Comments::where('rooms_id', $data['RoomsData']['id'])
      ->where('language_id', $lang)
      ->take(10)
      ->get();
      /*
      $data['Related'] = Rooms::where('roomcategories_id', $data['RoomsData']['roomcategories_id'])
      ->where('id', '!=', $data['RoomsData']['id'])
      ->where('language_id', $lang)
      ->take(6)
      ->get();
      */
      return view('pages.roomsDetail',$data);
    }
  }

  public function getCategoryData(Request $request, $name = "default")
  {
    $lang = $request->route()->getAction()['lang_id'];
    if ($name == "default") {
      abort(404);
    } else {
      $categories = RoomCategories::where('room_cat_slug', $name)->where('language_id', $lang)->first();
      if ($categories == '') {
        abort(404);
      }else {

        $data['Category'] = $categories;
        $data['RoomsData'] = Rooms::whereHas('roomcategories', function($q) use($categories){
          $q->where('roomcategory_id', '=', $categories['id']);
        })->get();

        return view('pages.roomsCategory',$data);

      }
    }
  }

  public function roomOrder(Request $request)
  {
    $lang = $request->route()->getAction()['lang_id'];
    $orderHours = (strtotime($request->order_user_departure) - strtotime($request->order_user_arrival))/3600;
    if ($orderHours < 1) {
      $data['orderHours'] = 1;
      //min 1 hour
      $data['orderMessage'] = 1;
    } elseif ($orderHours > 23) {
      $data['orderHours'] = 23;
      //max 23 hours
      $data['orderMessage'] = 23;
    } else {
      $data['orderHours'] = round($orderHours);
    }
    $data['orderRoom'] = Rooms::where('id', $request->rooms_id)
    ->where('language_id', $lang)
    ->first();
    if ($data['orderRoom'] == '') {
      return redirect('/rooms');
    }
    //$data['orderRoom'] = $request->rooms_id;
    $data['orderArrival'] = $request->order_user_arrival;
    $data['orderDeparture'] = $request->order_user_departure;
    return view('pages.order', $data);
  }

}
