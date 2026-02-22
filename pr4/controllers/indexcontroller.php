<?php
class IndexController extends PageController {
    public function actionLogin() {
        $data = [];

        if ($this->request->isPost()) {
            $login = trim($this->request->post('login'));
            $password = $this->request->post('password');

            $model = new UserModel();
            $user = $model->login($login, $password);

            if ($user) {
                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['admin_login'] = $user['login'];
                header('Location: index.php?route=users/index');
                exit;
            } else {
                $data['error'] = 'Невірний логін або пароль';
            }
        }

        $this->render('index/login', $data);
    }

    public function actionLogout() {
        session_destroy();
        header('Location: index.php?route=index/login');
        exit;
    }
}