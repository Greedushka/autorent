<?php

namespace application\models;

use application\core\Model;
use application\lib\Db;

class Main extends Model{

    public $error;

    public function contactValidate($post) {
        $nameLen = strlen($post['name']);
        $textLen = iconv_strlen($post['text']);
        if($nameLen < 3 or $nameLen > 20) {
            $this->error = 'Имя должно содержать от 3ёх до 20 символов';
            return false;
        }
        elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
            $this->error = 'E-mail указан неверно';
            return false;
        }
        elseif ($textLen < 10 or $textLen > 500){
            $this->error = 'Текст должен содержать от 10 до 500 символов';
            return false;
        }
        return true;
    }

    public function filterData(): array {
        $data = $_POST;
        $db = new Db();
        $sql = "SELECT * FROM car WHERE price BETWEEN {$data['price_min']} AND {$data['price_max']}";

        if(!empty($data['car'])){
            $sql .= " AND brand LIKE '%{$data['car']}%'";
        }
        if(!empty($data['mileage'])){
            $sql .= " AND mileage < {$data['mileage']}";
        }
        if(!empty($data['car_type'])){
            $sql .= " AND fuel_type = '{$data['car_type']}'";
        }

        return $db->row($sql);
    }

    public function createreview() {
        $data = $_POST;
        $db = new Db();
        $db->query("INSERT INTO reviews VALUES (default, '{$data['stars_count']}', '{$data['description']}', {$data['car_id']}, {$data['user_id']})");
    }
}