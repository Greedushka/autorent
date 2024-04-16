<?php

namespace application\models;

use application\core\Model;
use application\lib\Db;

class Cart extends Model
{
    public function addIn(int $itemId) {
        $db = new Db();
        $params = [
            'user_id' => $_SESSION['user'],
            'car_id' => $itemId
        ];
        $db->query("INSERT INTO cart VALUES (default, '{$params['user_id']}', '{$params['car_id']}')");
    }
}