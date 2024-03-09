<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //フォームリクエストの使用許可・不許可を返す
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //バリデーションルールを記述
    public function rules()
    {
        return [
          //required必須
        'name' => 'required',
          //数値型0～150
        'age' => 'integer|min:0|max:150',
        'nationality' => 'required'
        ];
    }

    //メッセージの表示'inputのname属性.バリテーションルール'=>'表示したいメッセージ'
    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'age.integer' => '数値を入力してください',
            'age.min' => '0以上の数値を入力してください',
            'age.max' => '150以下の数値を入力してください',
            'nationality.required' => '国籍を入力してださい',
        ];
    }

    //バリテーション失敗時
    protected function getRedirectUrl()
    {
        return 'verror';
    }
}
