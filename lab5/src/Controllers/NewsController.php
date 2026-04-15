<?php
namespace App\Controllers;
use App\Models\News;

class NewsController {
    public function index() {
        $model = new News();
        $news = $model->getNewsList();
        
        require_once __DIR__ . '/../ViewSections/news_list.php';
    }
}