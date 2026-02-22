<?php
class ProductsController extends PageController {
    public function actionIndex() {
        $model = new ProductsModel();
        $data['items'] = $model->getAll();
        $this->render('products/list', $data);
    }

    public function actionAdd() {
        $data = [];
        if ($this->request->isPost()) {
            $name = trim($this->request->post('name'));
            $brand_id = $this->request->post('brand_id');
            $price = $this->request->post('price');
            $description = trim($this->request->post('description'));

            $errors = [];
            if (!$name) $errors[] = 'Назва товару обов’язкова.';
            if (!$price || !is_numeric($price)) $errors[] = 'Ціна повинна бути числом.';

            if (empty($errors)) {
                $model = new ProductsModel();
                $model->add($name, $brand_id, $price, $description);
                header('Location: index.php?route=products/index');
                exit;
            } else {
                $data['errors'] = $errors;
            }
        }
        $data['brands'] = (new BrandsModel())->getAll();
        $this->render('products/form', $data);
    }

    public function actionEdit() {
        $id = $this->request->get('id');
        $model = new ProductsModel();
        $data['item'] = $model->getById($id);

        if ($this->request->isPost()) {
            $name = trim($this->request->post('name'));
            $brand_id = $this->request->post('brand_id');
            $price = $this->request->post('price');
            $description = trim($this->request->post('description'));

            $errors = [];
            if (!$name) $errors[] = 'Назва товару обов’язкова.';
            if (!$price || !is_numeric($price)) $errors[] = 'Ціна повинна бути числом.';

            if (empty($errors)) {
                $model->update($id, $name, $brand_id, $price, $description);
                header('Location: index.php?route=products/index');
                exit;
            } else {
                $data['errors'] = $errors;
            }
        }
        $data['brands'] = (new BrandsModel())->getAll();
        $this->render('products/form', $data);
    }

    public function actionDelete() {
        $id = $this->request->get('id');
        $model = new ProductsModel();
        $model->delete($id);
        header('Location: index.php?route=products/index');
        exit;
    }
}