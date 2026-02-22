<?php
class Application {
    public function Run() {
        $router = new Router();
        $router->route();
    }
}