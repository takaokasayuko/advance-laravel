  <!--取得したデータ表示するファイル 子テンプレート-->
  <!--＠extends（継承するディレクトリ名.ファイル名） default.blade.phpの内容をindex.blade.phpへ継承する-->
  @extends('layouts.default')
  <style>
    th {
      background-color: #289ADC;
      color: white;
      padding: 5px 40px;
    }
    tr:nth-child(odd) td{
      background-color: #ffffff;
    }
    td {
      padding: 25px 40px;
      background-color: #EEEEEE;
      text-align: center;
    }
  </style>
  <!--親テンプレートdefault.blade.phpの@yield('title')にはめ込まれる-->
  @section('title', 'index.blade.php')

  <!--＠section('content')~＠endsectionの内容を親テンプレートdefault.blade.phpの@yield('content')にはめ込まれる-->
  @section('content')
  <table>
    <tr>
      <th>Data</th>
    </tr>
    <!--$authorsに入っている要素を$authors=database/seeders/AuthorsTableSeeder.phpファイルに定義 に代入するのを繰り返す-->
    @foreach ($authors as $author)
    <tr>
      <!--
      ｛変数を表示｝｝ ->$author配列から値を取り出す
      getDetail() Models/Author.php
      -->
      <td>{{$author->getDetail()}}</td>
    </tr>
    @endforeach
  </table>
  @endsection
