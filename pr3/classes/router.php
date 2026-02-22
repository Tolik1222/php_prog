<?php
class Router {
    public function route() {
        $request = new Request();
        $route = $request->get('route', 'index/index');
        list($controllerName, $actionName) = explode('/', $route, 2);

        $controllerClass = ucfirst($controllerName) . 'Controller';
        $controllerFile = 'controllers/' . $controllerClass . '.php';

        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $controller = new $controllerClass();

            $actionMethod = 'action' . ucfirst($actionName ?: 'index');

            if (method_exists($controller, $actionMethod)) {
                $controller->$actionMethod();
            } else {
                echo "Дія не знайдена!";
            }
        } else {
            echo "Контролер не знайдено!";
        }
    }
}