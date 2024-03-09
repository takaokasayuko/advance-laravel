<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //upメソッド データベースに新しいテーブル、カラムを追加する
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id(); //自動作成（オートインクリメント）する主キーカラム作成=$table->bigIncrements('id');と同じ
            $table->string('name', 100); //文字列型のカラム string('カラム名',文字列の長さ)
            $table->integer('age'); //数値型のカラムを作成
            $table->string('nationality', 100);
            $table->timestamp('created_at')->useCurrent()->nullable(); //デフォルトで実行時刻が格納されるようになっている
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //downメソッド マイグレーションを実行した後、元に戻すときにする設定（ロールバック）
    {
        Schema::dropIfExists('authors');
    }
}
