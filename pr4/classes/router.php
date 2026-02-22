<?php

class Router {
    public function route() {
        $request = new Request();
        $route = $request->get('route', 'index/login');

        list($controllerName, $actionName) = explode('/', $route, 2);
        $controllerName = trim($controllerName);
        $actionName = trim($actionName ?: 'index');

        $controllerClass = ucfirst($controllerName) . 'Controller';
        $controllerFile = 'controllers/' . $controllerClass . '.php';

        if ($controllerName !== 'index' || $actionName !== 'login') {
            if (!isset($_SESSION['admin_id']) || !isset($_SESSION['admin_login'])) {
                session_unset();
                session_destroy();
                header('Location: index.php?route=index/login');
                exit;
            }
        }

        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();

                $actionMethod = 'action' . ucfirst($actionName);

                if (method_exists($controller, $actionMethod)) {
                    $controller->$actionMethod();
                } else {
                    echo "Дія '$actionMethod' не знайдена в контролері $controllerClass!";
                }
            } else {
                echo "Клас '$controllerClass' не знайдено в файлі $controllerFile!";
            }
        } else {
            echo "Контролер не знайдено: $controllerFile";
        }
    }
}