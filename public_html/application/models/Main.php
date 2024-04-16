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
        $carNameFilter = '';
        $carMileage = '';
        $carType = '';
        if(isset($carNameFilter)){
            $carNameFilter .= $data['car'];
            $sql .= " AND brand LIKE '%$carNameFilter%'";
        }
        if(isset($carMileage)){
            $carMileage .= $data['mileage'];
            $sql .= " AND mileage < $carMileage";
        }
        if(isset($carType)){
            $carType .= $data['car_type'];
            $sql .= " AND auto_type = '$carType'";
        }

        return $db->row($sql);
    }
}