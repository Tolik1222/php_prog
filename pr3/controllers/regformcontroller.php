<?php
class RegformController extends PageController {
    public function actionIndex() {
        $this->render('regform/form');
    }

    public function actionDoreg() {
        if ($this->request->isPost()) {
            $errors = [];
            $login = trim($this->request->post('login', ''));
            $password1 = $this->request->post('password1', '');
            $password2 = $this->request->post('password2', '');
            $about = trim($this->request->post('about', ''));

            if (strpos($login, ' ') !== false) $errors[] = 'Логін без пробілів.';
            if (strlen($login) <= 4) $errors[] = 'Логін > 4 символів.';
            if ($password1 !== $password2) $errors[] = 'Паролі не збігаються.';
            if (strlen($password1) <= 4) $errors[] = 'Пароль > 4 символів.';
            if ($about === '') $errors[] = 'Про себе не порожнє.';

            if (empty($errors)) {
                $_SESSION['form_data'] = [
                    'login' => $login,
                    'password1' => '***',
                    'password2' => '***',
                    'about' => $about
                ];
                $_SESSION['form_success'] = 'Успішна реєстрація!';
                header('Location: index.php?route=params/index');
                exit;
            } else {
                $this->render('regform/form', ['errors' => $errors]);
            }
        } else {
            header('Location: index.php?route=regform/index');
        }
    }
}