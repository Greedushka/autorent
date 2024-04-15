<?php

namespace application\models;

use application\core\Model;
use application\lib\Db;

class Cart extends Model
{
    public function addIn(int $itemId) {
        $db = new Db();
        $params = [
            'car' => $db->column('SELECT brand FROM car WHERE id = '. $itemId). ' ' . $db->column('SELECT model FROM car WHERE id = '. $itemId),
            'car_img' => $db->column('SELECT img FROM car WHERE id = '. $itemId),
            'user_id' => 1,
            'price' => $db->column('SELECT price FROM car WHERE id ='. $itemId),
            'product_id' => $itemId
        ];
        $db->query("INSERT INTO cart VALUES (default, '{$params['car']}', '{$params['car_img']}', '{$params['user_id']}', '{$params['price']}', '{$params['product_id']}')");
    }
}