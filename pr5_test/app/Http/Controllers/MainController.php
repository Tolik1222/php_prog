<?php

namespace App\Http\Controllers;

class MainController extends Controller {
    public function index() {
        $menu = [['title' => 'Головна', 'url' => '/'], ['title' => 'Автор', 'url' => '/author'], ['title' => 'Форма', 'url' => '/form']];
        return view('pages.home', compact('menu'));
    }

    public function author() {
        $menu = [['title' => 'Головна', 'url' => '/'], ['title' => 'Автор', 'url' => '/author'], ['title' => 'Форма', 'url' => '/form']];
        return view('pages.author', compact('menu'));
    }
}