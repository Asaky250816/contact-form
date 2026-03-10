<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['name', 'email', 'tel', 'content']);
        return view('confirm', compact('contact'));
    }
    public function store(ContactRequest $request){
        $contact = $request->only(['name', 'email', 'tel', 'content']);
        Contact::create($contact);
        return view('thanks');
    }
    public function message()
    {
        return [
            'name.required' => '名前は必須です。',
            'name.string' => '名前は文字列で入力してください。',
            'name.max' => '名前は255文字以内で入力してください。',
            'email.required' => 'メールアドレスは必須です。',
            'email.string' => 'メールアドレスは文字列で入力してください。',
            'email.max' => 'メールアドレスは255文字以内で入力してください。',
            'email.email' => '有効なメールアドレスを入力してください。',
            'tel.required' => '電話番号は必須です。',
            'tel.numeric' => '電話番号は数字で入力してください。',
            'tel.digits_between' => '電話番号は10桁または11桁で入力してください。',
        ];
    }
}
