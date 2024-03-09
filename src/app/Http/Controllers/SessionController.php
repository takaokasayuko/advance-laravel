<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

  //post語に/sessionにリダイレクト後
  public function getSes(Request $request)
  {
    $data = $request->session()->get('txt');
    return view('/session', ['data' => $data]);
  }

  //viewで値を入力し送信(post)後
  public function postSes(Request $request)
  {
    $txt = $request->input;
    $request->session()->put('txt', $txt);
    return redirect('/session');
  }
}
