<?php

namespace application\controllers;

use application\core\Controller;

class OrdersController extends Controller
{
    public function indexAction() {
        $this->view->render('Заказы');
    }

    public function addAction() {
        $this->model->addorder();
    }
}