<?php
//カラムに対して書き換え可$fillable・不可$guardedの設定
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'age' ,'nationality'];

    public static $rules = array(
        'name' => 'required',
        'age' => 'integer|min:0|max:150',
        'nationality' => 'required'
    );

    public function getDetail()
    {
        $txt = 'ID:' . $this -> id . ' ' . $this -> name . '(' . $this -> age . '才'.') '.$this -> nationality;
        return $txt;
    }

    //authorsテーブルのレコードに対応するbooksテーブルのレコードを取り出す（1対1の関係で1つのレコード）
    public function book()
    {
        return $this->hasOne('App\Models\Book');
    }

    //authorsテーブルのレコードに対応するbooksテーブルのレコードを取り出す（1対多の関係で1つのレコード）
    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }
}
