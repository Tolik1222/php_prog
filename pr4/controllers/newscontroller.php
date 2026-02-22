<?php
class NewsController extends PageController {
    public function actionIndex() {
        $model = new NewsModel();
        $data['items'] = $model->getAll();
        $this->render('news/list', $data);
    }

    public function actionAdd() {
        $data = [];
        if ($this->request->isPost()) {
            $title = trim($this->request->post('title'));
            $content = trim($this->request->post('content'));

            $errors = [];
            if (!$title) $errors[] = "Title обов'язковий.";
            if (!$content) $errors[] = "Content обов'язковий.";

            if (empty($errors)) {
                $model = new NewsModel();
                $model->add($title, $content);
                header('Location: index.php?route=news/index');
                exit;
            } else {
                $data['errors'] = $errors;
            }
        }
        $this->render('news/form', $data);
    }

    public function actionEdit() {
        $id = $this->request->get('id');
        $model = new NewsModel();
        $data['item'] = $model->getById($id);

        if ($this->request->isPost()) {
            $title = trim($this->request->post('title'));
            $content = trim($this->request->post('content'));

            $errors = [];
            if (!$title) $errors[] = "Title обов'язковий.";
            if (!$content) $errors[] = "Content обов'язковий.";

            if (empty($errors)) {
                $model->update($id, $title, $content);
                header('Location: index.php?route=news/index');
                exit;
            } else {
                $data['errors'] = $errors;
            }
        }
        $this->render('news/form', $data);
    }

    public function actionDelete() {
        $id = $this->request->get('id');
        $model = new NewsModel();
        $model->delete($id);
        header('Location: index.php?route=news/index');
        exit;
    }
}