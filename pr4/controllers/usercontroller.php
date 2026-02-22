<?php
class UsersController extends PageController {
    public function actionIndex() {
        $model = new UserModel();
        $data['items'] = $model->getAll();
        $this->render('users/list', $data);
    }

    public function actionAdd() {
        $data = [];
        if ($this->request->isPost()) {
            $login = trim($this->request->post('login'));
            $password = $this->request->post('password');
            $password2 = $this->request->post('password2');

            $errors = [];
            if (strpos($login, ' ') !== false) $errors[] = 'Логін без пробілів.';
            if (strlen($login) <= 4) $errors[] = 'Логін >4 символів.';
            if ($password !== $password2) $errors[] = 'Паролі не збігаються.';
            if (strlen($password) <= 4) $errors[] = 'Пароль >4 символів.';

            if (empty($errors)) {
                $model = new UserModel();
                $model->add($login, $password);
                header('Location: index.php?route=users/index');
                exit;
            } else {
                $data['errors'] = $errors;
            }
        }
        $this->render('users/form', $data);
    }

    public function actionEdit() {
        $id = $this->request->get('id');
        $model = new UserModel();
        $data['item'] = $model->getById($id);

        if ($this->request->isPost()) {
            $login = trim($this->request->post('login'));
            $password = $this->request->post('password');
            $password2 = $this->request->post('password2');

            $errors = [];
            if (strpos($login, ' ') !== false) $errors[] = 'Логін без пробілів.';
            if (strlen($login) <= 4) $errors[] = 'Логін >4 символів.';
            if ($password && $password !== $password2) $errors[] = 'Паролі не збігаються.';
            if ($password && strlen($password) <= 4) $errors[] = 'Пароль >4 символів.';

            if (empty($errors)) {
                $model->update($id, $login, $password);
                header('Location: index.php?route=users/index');
                exit;
            } else {
                $data['errors'] = $errors;
            }
        }
        $this->render('users/form', $data);
    }

    public function actionDelete() {
        $id = $this->request->get('id');
        $model = new UserModel();
        $model->delete($id);
        header('Location: index.php?route=users/index');
        exit;
    }
}