<?php
class PageView extends View {
    public function render($viewPath, $data = []) {
        $parts = explode('/', $viewPath);
        $controllerName = $parts[0];
        $viewName = $parts[1] ?? 'index';

        $data['session'] = $_SESSION;
        $data['cookie'] = $_COOKIE;

        extract($data);
        require 'views/layouts/main.php';
    }
}