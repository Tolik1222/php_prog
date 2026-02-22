<?php
abstract class Controller {
    protected $view;
    protected $request;

    public function __construct() {
        $this->view = new PageView();
        $this->request = new Request();
    }

    protected function render($viewPath, $data = []) {
        $this->view->render($viewPath, $data);
    }
}