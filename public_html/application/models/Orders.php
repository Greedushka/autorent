<?php

namespace application\models;

use application\core\Model;
use application\lib\Db;

class Orders extends Model
{
    public function addorder() {
        $this->db->query("INSERT INTO orders VALUES (DEFAULT, '{$_POST['car']}', '{$_POST['car_img']}', '{$_POST['user_id']}', '{$_POST['price']}', '{$_POST['product_id']}')");
    }

}