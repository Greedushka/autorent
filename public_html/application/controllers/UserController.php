<?php

namespace application\controllers;

use application\core\Controller;

class UserController extends Controller
{
 public function indexAction($id) {
     $this->view->render('Пользователь');
 }

 public function addAction() {
     $this->model->adduser();
 }

}