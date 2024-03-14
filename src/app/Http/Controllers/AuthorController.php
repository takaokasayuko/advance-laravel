<?php

namespace App\Http\Controllers;
//Authorモデルを読み込むことでEloquentが使用できる
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    //index.blade.php（データ一覧ページ）を呼び出す
    public function index()
    {
        //Authorクラスのallメソッドを利用してauthorsテーブルから全件取得
        $authors = Author::all();
        $authors = Author::Paginate(4);
        //データ全件が格納されたauthorsをパラメータとして渡し、index.blade.phpを呼び出す
        return view('index', ['authors' => $authors]);
    }

    //add.blade.php（データ追加ページ）を呼び出す
    public function add()
    {
        return view('add');
    }

    /*
    データ追加用ページのフォームに入力した値を取得
    add.blade.phpのinputタグのname属性がkey、inputタグに入力された値がvalueとして連想配列となってリクエストボディへ送信
    Request $requestを指定することでリクエストボディを受け取れる
    */
    public function create(AuthorRequest $request)
    {
        //リクエストの全情報を取得
        $form = $request->all();
        //テーブルにデータを挿入
        Author::create($form);
        //データ挿入後、index.blade.phpの画面にリダイレクト（再リクエスト）
        return redirect('/');
    }

    //edit.blade.php（データ編集ページ）を呼び出す
    public function edit(Request $request)
    {
        //idを使用し更新対象のデータを取得
        $author = Author::find($request->id);
        return view('edit', ['form' => $author]);
    }

    //データ編集ページから送信されたフォームの値を取得し、データベースにデータ更新を保存
    public function update(AuthorRequest $request)
    {
        //データ編集ページから送信されたフォームの値はリクエストに含まれるため、リクエストの全情報を取得
        $form = $request->all();
        //データ更新で余計なカラムの_tokenを排除。bladeファイルの＠csrfによりこのトークンがリクエスト情報として含まれる。
        unset($form['_token']);
        //findメソッドの引数にリクエストで取得したidを指定。updateメソッドで$formの内容をもとに更新
        Author::find($request->id)->update($form);
        return redirect('/');
    }

    //データ削除ページ
    public function delete(Request $request)
    {
        $author = Author::find($request->id);
        return view('delete', ['author' => $author]);
    }

    //削除機能
    public function remove(Request $request)
    {
        Author::find($request->id)->delete();
        return redirect('/');
    }

    //名前検索ページ
    public function find()
    {
        return view('find', ['input' => '']);
    }

    //検索機能
    public function search(Request $request)
    {
        //LIKE %{}%で部分一致 1件のみのためfirst
        $item = Author::where('name', 'LIKE',"%{$request->input}%")->first();
        $param = [
            'input' => $request->input,
            'item' => $item
        ];
        return view('find', $param);
    }

    //指定したidを表示
    public function bind(Author $author)
    {
        $data = [
            'item' => $author,
        ];
        return view('author.binds', $data);
    }

    //バリテーション失敗時
    public function verror()
    {
        return view('verror');
    }

    //authorsテーブルのデータを返す（リレーション確認）
    public function relate(Request $request)
    {
        //$items = Author::all();
        //hasとdoesHaveでBookモデルとリレーションの有無確認
        $hasItems = Author::has('book')->get();
        $noItems = Author::doesntHave('book')->get();
        $param = ['hasItems' => $hasItems, 'noItems' => $noItems];
        return view('author.index', $param);
    }
}
