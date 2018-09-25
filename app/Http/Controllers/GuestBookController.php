<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use App\Language;

class GuestBookController extends Controller
{

  public function getDataGuestBook(Request $request)
  {
    $lang = $request->route()->getAction()['lang_id'];
    $data['lang_id'] = $lang;
    $data['CommentData'] = Comments::where('language_id', $lang)
    ->where('comment_confirmation', '2')
    ->orderBy('created_at', 'desc')
    ->paginate(15);
    return view('pages.guestBook', $data);
  }

}
