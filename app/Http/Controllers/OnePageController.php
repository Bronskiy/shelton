<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateContactEntriesRequest;
use App\Http\Requests\CreateCommentsRequest;
use App\Http\Requests\CreateOrdersRequest;
use App\Notifications\NewMessage;
use App\User;
use App\ContactEntries;
use App\CommonPages;
use App\Comments;
use App\Orders;

class OnePageController extends Controller
{
  public function getDataHome()
  {
    return view('pages.home');
  }

  public function getDataContact()
  {
    return view('pages.contacts');
  }

  public function thankYou()
  {
    return view('pages.thankYou');
  }

  public function getSuccess()
  {
    return view('pages.orderReceived');
  }

  public function getPageData(Request $request, $name = "default")
  {
    $lang = $request->route()->getAction()['lang_id'];
    if ($name == "default") {
      abort(404);
    } else {
      $data['PageData'] = CommonPages::where('common_slug', $name)->where('language_id', $lang)->first();
      $data['lang_id'] = $lang;
      if (empty($data['PageData'])) {
        abort(404);
      };
      return view('pages.commonPage',$data);
    }
  }

  public function contactsStore(CreateContactEntriesRequest $request)
  {
    $message = $request->all();
    ContactEntries::create($message);

    $telegram_message =
    "Имя: " . $request->contact_name . " \n" .
    "Телефон: " . $request->contact_phone . " \n" .
    "Email: " . $request->contact_email . " \n" .
    "Сообщение: " . $request->contact_text . " \n";

    $mail_message =
    "Имя: " . $request->contact_name . "<br />" .
    "Телефон: " . $request->contact_phone . "<br />" .
    "Email: " . $request->contact_email . "<br />" .
    "Сообщение: " . $request->contact_text . "<br />";

    $this->alarmerbotsend('-167221471', $telegram_message);
    $users = User::where('role_id', 2)->get();
    foreach ($users as $user) {
      $user->notify(new NewMessage($mail_message));
    }

    return redirect('/thank-you');
  }

  public function commentsStore(CreateCommentsRequest $request)
  {
    $message = $request->all();
    Comments::create($message);

    $telegram_message =
    "Имя: " . $request->comment_name . " \n" .
    "Телефон: " . $request->comment_phone . " \n" .
    "Email: " . $request->comment_email . " \n" .
    "Сообщение: " . $request->comment_text . " \n";

    $mail_message =
    "Имя: " . $request->comment_name . "<br />" .
    "Телефон: " . $request->comment_phone . "<br />" .
    "Email: " . $request->comment_email . "<br />" .
    "Сообщение: " . $request->comment_text . "<br />";

    $this->alarmerbotsend('-167221471', $telegram_message);
    $users = User::where('role_id', 2)->get();
    foreach ($users as $user) {
      $user->notify(new NewMessage($mail_message));
    }

    return redirect('/thank-you');
  }
  public function test()
  {

  }

  public function orderStore(CreateOrdersRequest $request)
  {
    $message = $request->all();
    $newOrder = Orders::create($message);
    $orderId = $newOrder->id;
    $orderUserId = 'user_' . $orderId;
    Orders::where('id', $orderId)->update(array('order_user_id' => $orderUserId));

    $telegram_message =
    "Заказ: " . $orderId . " \n" .
    "Заезд: " . $request->order_user_arrival . " \n" .
    "Выезд: " . $request->order_user_departure . " \n" .
    "Номер: ". $request->rooms_title . " \n" .
    "Стоимость: " .  $request->order_price . " \n" .
    "Имя: " .  $request->order_user_name . " \n" .
    "Телефон: " . $request->order_user_phone . " \n" .
    "Email: " . $request->order_user_email . " \n" .
    "Сообщение: " . $request->order_user_message . " \n";

    $mail_message =
    "Заказ: " . $orderId . "<br />" .
    "Заезд: " . $request->order_user_arrival . "<br />" .
    "Выезд: " . $request->order_user_departure . "<br />" .
    "Номер: ". $request->rooms_title . "<br />" .
    "Стоимость: " .  $request->order_price . "<br />" .
    "Имя: " . $request->order_user_name . "<br />" .
    "Телефон: " . $request->order_user_phone . "<br />" .
    "Email: " . $request->order_user_email . "<br />" .
    "Сообщение: " . $request->order_user_message . "<br />";

    $this->alarmerbotsend('-167221471', $telegram_message);
    $users = User::where('role_id', 2)->get();
    foreach ($users as $user) {
      $user->notify(new NewMessage($mail_message));
    }

    return redirect('/success')->with('status', $orderId);
  }

  public function alarmerbotsend($chat_id, $message)
  {
    $ch = curl_init(env('TELEGRAM_API'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array(
      "chat_id" => $chat_id,
      "text" => $message,
    ));
    curl_exec($ch);
    curl_close($ch);
  }
}
