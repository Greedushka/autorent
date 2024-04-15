<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class CartController extends Controller
{
    public function indexAction() {
        $db = new Db();
        $vars = [
            'cart' => $db->row('SELECT * FROM cart')
        ];
        $this->view->render('index', $vars);
    }

    public function addAction() {
        $itemId = isset($_POST['id']) ? intval($_POST['id']) : null;
        $this->model->addIn($itemId);
    }
}