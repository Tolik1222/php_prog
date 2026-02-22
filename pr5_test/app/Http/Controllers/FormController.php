<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller {
    public function show() {
        $menu = [['title' => 'Головна', 'url' => '/'], ['title' => 'Автор', 'url' => '/author'], ['title' => 'Форма', 'url' => '/form']];
        return view('pages.form', compact('menu'));
    }

    public function process(Request $request) {
        $request->validate([
            'login' => 'required|alpha|min:4',
            'password' => 'required|confirmed|min:4|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
            'homepage' => 'required|url',
            'about' => [
                    'required',
                     function ($attribute, $value, $fail) {
                     $wordCount = count(preg_split('/\s+/u', trim($value), -1, PREG_SPLIT_NO_EMPTY));
                        if ($wordCount < 30) {
                        $fail("Текст має містити мінімум 30 слів. Зараз знайдено: $wordCount");
        }
    },
],
        ]);

        return back()->with('success', 'Дані валідні!');
    }
}