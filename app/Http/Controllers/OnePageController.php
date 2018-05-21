<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateContactEntriesRequest;
use App\Http\Requests\CreateCommentsRequest;
use App\Notifications\NewMessage;
use App\User;
use App\ContactEntries;
use App\Comments;

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

  public function contactsStore(CreateContactEntriesRequest $request)
  {
    $message = $request->all();
    ContactEntries::create($message);
    $telegram_message = "Имя: " . $request->contact_name . " \n" . "Телефон: " . $request->contact_phone . " \n" . "Email: " . $request->contact_email . " \n" . "Сообщение: " . $request->contact_text . " \n";
    $mail_message = "Имя: " . $request->contact_name . "<br />" . "Телефон: " . $request->contact_phone . "<br />" . "Email: " . $request->contact_email . "<br />" . "Сообщение: " . $request->contact_text . "<br />";
    $this->alarmerbotsend('-167221471', $telegram_message);
    $user = User::where('id', 1)->first();
    $user->notify(new NewMessage($mail_message));
    return redirect('/thank-you');
  }

  public function commentsStore(CreateCommentsRequest $request)
  {
    $message = $request->all();
    Comments::create($message);
    $telegram_message = "Имя: " . $request->comment_name . " \n" . "Телефон: " . $request->comment_phone . " \n" . "Email: " . $request->comment_email . " \n" . "Сообщение: " . $request->comment_text . " \n";
    $mail_message = "Имя: " . $request->comment_name . "<br />" . "Телефон: " . $request->comment_phone . "<br />" . "Email: " . $request->comment_email . "<br />" . "Сообщение: " . $request->comment_text . "<br />";
    $this->alarmerbotsend('-167221471', $telegram_message);
    $user = User::where('id', 1)->first();
    $user->notify(new NewMessage($mail_message));
    return redirect('/thank-you');
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
