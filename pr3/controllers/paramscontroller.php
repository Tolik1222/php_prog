<?php
class ParamsController extends PageController {
    public function actionIndex() {
        $data = [
            'serverVars' => $_SERVER,
            'getVars' => $_GET,
            'postVars' => $_POST
        ];
        $this->render('params/showrequest', $data);
    }
}