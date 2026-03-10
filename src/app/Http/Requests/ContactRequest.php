<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'tel' => ['required', 'numeric', 'digits_between:10,11'],
            'content' => ['required'],
        ];
    }

    /**
     * Get custom validation messages in Japanese.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => ':attributeを入力してください。',
            'email.email' => ':attributeはメールアドレス形式で入力してください。',
            'tel.numeric' => ':attributeは半角数字で入力してください。',
            'tel.digits_between' => ':attributeは10桁または11桁で入力してください。',
            'max' => ':attributeは:max文字以内で入力してください。',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'お名前',
            'email' => 'メールアドレス',
            'tel' => '電話番号',
            'content' => 'お問い合わせ内容',
        ];
    }
}
