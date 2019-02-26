<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'title' => 'required|min:3',
            'body' => 'required|min:10'
        ];
    }

    public function messages() {
      return [
        'title.required' => 'タイトルが入力されていません',
        'title.min:3' => 'タイトルが入力されていません',
        'body.required' => '投稿内容が入力されていません'
      ];
    }
}
