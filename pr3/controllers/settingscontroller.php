<?php
class SettingsController extends PageController {
    public function actionIndex() {
        if ($this->request->isPost()) {
            if ($this->request->post('save_color', null) !== null) {
                $_SESSION['bg_color'] = $this->request->post('bg_color', '#ffffff');
            }
            if ($this->request->post('save_user', null) !== null) {
                setcookie('user_name', (string)$this->request->post('user_name', ''), time() + 86400 * 30, '/');
                setcookie('user_gender', (string)$this->request->post('user_gender', ''), time() + 86400 * 30, '/');
            }
            header('Location: index.php?route=settings/index');
            exit;
        }

        $this->render('settings/settings');
    }
}