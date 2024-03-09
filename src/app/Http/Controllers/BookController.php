<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
  //本(book)に関するデータの一覧表示
  public function index(Request $request)
  {
    //$items = Book::all();
    $items = Book::with('author')->get();
    return view('book.index', ['items'=>$items]);
  }

  //フォーム用のページ
  public function add()
  {
    return view('book.add');
  }

  //送信された値をBooksテーブルに追加
  public function create(Request $request)
  {
      $this->validate($request, Book::$rules);
      $form = $request->all();
      Book::create($form);
      return redirect('/book');
    }
}
