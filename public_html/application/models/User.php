<?php

namespace application\models;

use application\core\Model;
use application\lib\Db;

class User extends Model
{
    public function adduser() {
        $db = new Db();
        $params = [
            'name' => $_POST['name'].' '.$_POST['surname'],
            'phone_number' => $_POST['phone'],
            'email' => $_POST['email'],
            'orders_count' => 0,
            'orders_sum' => 0,
            'sale' => 0,
            'role' => 'user',

        ];
        $db->query('INSERT INTO user VALUES (default, :name, :phone_number, :email, :orders_count, :orders_sum, :sale, :role)', $params);
    }
}