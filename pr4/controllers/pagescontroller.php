<?php
class PagesController extends PageController {
    public function actionIndex() {
        $model = new PagesModel();
        $data['items'] = $model->getAll();
        $this->render('pages/list', $data);
    }

    public function actionAdd() {
        $data = [];
        if ($this->request->isPost()) {
            $title = trim($this->request->post('title'));
            $keywords = trim($this->request->post('keywords'));
            $description = trim($this->request->post('description'));
            $h1 = trim($this->request->post('h1'));
            $content = trim($this->request->post('content'));

            $errors = [];
            if (!$title) $errors[] = 'Title обов’язковий.';
            if (!$content) $errors[] = 'Content обов’язковий.';

            if (empty($errors)) {
                $model = new PagesModel();
                $model->add($title, $keywords, $description, $h1, $content);
                header('Location: index.php?route=pages/index');
                exit;
            } else {
                $data['errors'] = $errors;
            }
        }
        $this->render('pages/form', $data);
    }

    public function actionEdit() {
        $id = $this->request->get('id');
        $model = new PagesModel();
        $data['item'] = $model->getById($id);

        if ($this->request->isPost()) {
            $title = trim($this->request->post('title'));
            $keywords = trim($this->request->post('keywords'));
            $description = trim($this->request->post('description'));
            $h1 = trim($this->request->post('h1'));
            $content = trim($this->request->post('content'));

            $errors = [];
            if (!$title) $errors[] = 'Title обов’язковий.';
            if (!$content) $errors[] = 'Content обов’язковий.';

            if (empty($errors)) {
                $model->update($id, $title, $keywords, $description, $h1, $content);
                header('Location: index.php?route=pages/index');
                exit;
            } else {
                $data['errors'] = $errors;
            }
        }
        $this->render('pages/form', $data);
    }

    public function actionDelete() {
        $id = $this->request->get('id');
        $model = new PagesModel();
        $model->delete($id);
        header('Location: index.php?route=pages/index');
        exit;
    }
}