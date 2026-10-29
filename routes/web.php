<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Contact;

Route::get('/', function () {
    return view('contact');
});

Route::post('/', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'body' => 'required',
    ], [
        'name.required' => '名前を入力してください',
        'email.required' => 'メールを入力してください',
        'email.email' => 'メールの形式が正しくありません',
        'body.required' => 'お問い合わせ内容を入力してください',
    ]);

    Contact::create($request->only(['name', 'email', 'body']));

    return redirect()->route('complete');
});

Route::get('/complete', function () {
    return view('complete');
})->name('complete');

Route::get('/list', function () {
    $contacts = Contact::latest()->get();

    return view('list', ['contacts' => $contacts]);
});
