<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;
use application\models\Admin;


class MainController extends Controller {
    public function indexAction() {
        $db = new Db();
        $vars = [
            'cars' => $db->row('SELECT * FROM car')
        ];
        $this->view->render('Главная', $vars);
    }

    public function aboutAction() {
        $this->view->render('Обо мне');
    }

    public function contactAction() {
        if (!empty($_POST)) {
            if(!$this->model->contactValidate($_POST)) {
               $this->view->message('error', $this->model->error);
            }
            mail('gekebon642@rentaen.com', 'Сообщение из блогга от '.$_POST['name'], $_POST['text']);
            $this->view->message('success', 'форма отработала');
        }
        $this->view->render('Контакты');
    }

    public function carAction(){
        $adminModel = new Admin();
        $vars = [
            'data' => $adminModel->postData($this->route['id'])[0],
        ];
        $this->view->render('Машина', $vars);
    }

}