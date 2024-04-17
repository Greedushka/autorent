<?php

namespace application\models;

use application\core\Model;
use application\lib\Db;

class Orders extends Model
{
    public function addorder() {
        $this->db->query("INSERT INTO orders VALUES (DEFAULT, '{$_SESSION['user']}', '{$_POST['price']}', default)");

        $this->db->query("DELETE FROM cart WHERE user_id = {$_SESSION['user']}");
    }

}