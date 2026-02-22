<?php
class IndexController extends PageController {
    public function actionIndex() {
        $this->render('index/main');
    }
}