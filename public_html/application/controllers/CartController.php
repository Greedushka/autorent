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

    public function promoAction()
    {
        $db = new Db();
        $promo = $db->row("SELECT * FROM promo WHERE name = '{$_POST['promo']}'");

        if (empty($promo)) {
            echo 0;
            exit();
        }

        echo (int)$promo[0]['sale'];
    }
}