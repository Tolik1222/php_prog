<?php
class BrandsController extends PageController {
    public function actionIndex() {
        $model = new BrandsModel();
        $data['items'] = $model->getAll();
        $this->render('brands/list', $data);
    }

    public function actionAdd() {
        $data = [];
        if ($this->request->isPost()) {
            $name = trim($this->request->post('name'));
            $description = trim($this->request->post('description'));

            $errors = [];
            if (!$name) $errors[] = 'Назва бренду обов’язкова.';

            if (empty($errors)) {
                $model = new BrandsModel();
                $model->add($name, $description);
                header('Location: index.php?route=brands/index');
                exit;
            } else {
                $data['errors'] = $errors;
            }
        }
        $this->render('brands/form', $data);
    }

    public function actionEdit() {
        $id = $this->request->get('id');
        $model = new BrandsModel();
        $data['item'] = $model->getById($id);

        if ($this->request->isPost()) {
            $name = trim($this->request->post('name'));
            $description = trim($this->request->post('description'));

            $errors = [];
            if (!$name) $errors[] = 'Назва бренду обов’язкова.';

            if (empty($errors)) {
                $model->update($id, $name, $description);
                header('Location: index.php?route=brands/index');
                exit;
            } else {
                $data['errors'] = $errors;
            }
        }
        $this->render('brands/form', $data);
    }

    public function actionDelete() {
        $id = $this->request->get('id');
        $model = new BrandsModel();
        $model->delete($id);
        header('Location: index.php?route=brands/index');
        exit;
    }
}