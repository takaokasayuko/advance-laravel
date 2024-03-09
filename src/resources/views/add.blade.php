<!--フォームで入力したデータ追加するファイル 子テンプレート-->
<!--＠extends default.blade.phpへ継承-->
  @extends('layouts.default')
  <style>
    th {
      background-color: #289ADC;
      color: white;
      padding: 5px 40px;
    }
    tr:nth-child(odd) td{
      background-color: #FFFFFF;
    }
    td {
      padding: 25px 40px;
      background-color: #EEEEEE;
      text-align: center;
    }
    button {
      padding: 10px 20px;
      background-color: #289ADC;
      border: none;
      color: white;
    }
  </style>
  <!--親テンプレートdefault.blade.phpの@yield('title')にはめ込まれる-->
  @section('title', 'add.blade.php')

  <!--＠section('content')~＠endsectionの内容を親テンプレートdefault.blade.phpの@yield('content')にはめ込まれる-->
  @section('content')

  <!-- errorの要素数を調べ0より大きい場合表示 $errorはLaravelで用意されたエラーメッセージを格納する変数-->
  @if (count($errors) > 0)
  <p>入力に問題があります</p>
  @endif
  <!--AuthorControllerのcreateアクションを呼び出す-->
  <form action="/add" method="post">
    <table>
      <!--Lalavelでフォームを利用するときに@csrfを必ずつけないとリクエストが受け取れない-->
      @csrf
      <!--入力を間違えた時のエラー表示-->
        @error('name')
        <tr>
          <th style="background-color: red">ERROR</th>
          <td>
            {{$errors->first('name')}}
          </td>
        </tr>
        @enderror
        <tr>
          <th>name</th>
          <td><input type="text" name="name"></td>
        </tr>
        @error('age')
        <tr>
          <th style="background-color: red">ERROR</th>
          <td>
            {{$errors->first('age')}}
          </td>
        </tr>
        @enderror
        <tr>
          <th>age</th>
          <td><input type="text" name="age"></td>
        </tr>
        @error('nationality')
        <tr>
          <th style="background-color: red">ERROR</th>
          <td>
            {{$errors->first('nationality')}}
          </td>
          </tr>
          @enderror
          <tr>
          <th>nationality</th>
          <td><input type="text" name="nationality"></td>
        </tr>
        <tr>
          <th></th>
          <td><button>送信</button></td>
        </tr>
    </table>
  </form>
  @endsection