<?php

namespace application\models;

use application\core\Model;

use Imagick;

class Admin extends Model{

    public $error;

    public function loginValidate($post) {
        $config = require 'application/config/admin.php';
        if($config['login'] != $post['login'] or $config['password'] != $post['password']){
            $this->error = 'Логин или пароль указаны неверно!!';
            return false;
        }
            return true;
    }

//    public function postValidate($post, $type)
//    {
//        $nameLen = strlen($post['name']);
//        $descLen = iconv_strlen($post['description']);
//        $textLen = iconv_strlen($post['text']);
//        if ($nameLen < 3 or $nameLen > 100) {
//            $this->error = 'Название должно содержать от 3 до 100 символов';
//            return false;
//        } elseif ($descLen < 3 or $descLen > 100) {
//            $this->error = 'Описание должно содержать от 3 до 100 символов';
//            return false;
//        } elseif ($textLen < 10 or $textLen > 5000) {
//            $this->error = 'Текст должен содержать от 10 до 5000 символов';
//            return false;
//        }
//        if (empty($_FILES['img']['tmp_name']) and $type == 'add') {
//            $this->error = 'Изображение не найдено';
//            return false;
//        }
//        return true;
//    }
    public function postAdd($post) {
        $params = [
            'brand' => $post['brand'],
            'model' => $post['model'],
            'production_date' => $post['production_date'],
            'mileage' => $post['mileage'],
            'overclocking' => $post['overclocking'],
            'gas_tank' => $post['gas_tank'],
            'kpp' => $post['kpp'],
            'horse_power' => $post['horse_power'],
            'fuel_type' => $post['fuel_type'],
            'price' => $post['price'],
            'img' => $post['img'],
            'auto_type' => $post['auto_type'],
            'color' => $post['color'],
        ];
        $this->db->query('INSERT INTO car VALUES (DEFAULT, :brand, :model, :production_date, :mileage, :overclocking, :gas_tank, :kpp, :horse_power, :fuel_type, :price, :img, :auto_type, :color)', $params);
        return $this->db->lastInsertId();
    }
//    public function postUploadImage($path, $id) {
//        $img = new Imagick($path);
//        $img->cropThumbnailImage(1080, 600);
//        $img->setImageCompressionQuality(80);
//        $img->writeImage($id.'.jpg');
//    }

    public function isPostExists($id) {
        $params = [
            'id' => $id
        ];

        return $this->db->column('SELECT id FROM posts WHERE id = :id', $params);
    }
    public function postDelete($id) {
        $params = [
            'id' => $id,
        ];
        $this->db->query('DELETE FROM posts WHERE id = :id', $params);
        //удаление картинки
        //unlink('public/materials/'.$id.'.jpg');
    }

    public function postData(int $id) {
        $params = [
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM car WHERE id = :id', $params);
    }

    public function getCars(): array
    {
        return $this->db->row('SELECT * FROM car;');
    }

    public function getCar(int $id): array
    {
        return $this->db->row("SELECT * FROM car WHERE id = {$id};");
    }

    public function editCar(int $id, array $data): void
    {
        $sql = "UPDATE `car` SET `model` = '{$data['model']}', 
                 `brand` = '{$data['brand']}', 
                 `production_date` = '{$data['production_date']}', 
                 `mileage` = '{$data['mileage']}', 
                 `overclocking` = '{$data['overclocking']}', 
                 `gas_tank` = '{$data['gas_tank']}', 
                 `kpp` = '{$data['kpp']}', 
                 `horse_power` = '{$data['horse_power']}', 
                 `fuel_type` = '{$data['fuel_type']}', 
                 `price` = '{$data['price']}', 
                 `img` = '{$data['img']}', 
                 `auto_type` = '{$data['auto_type']}', 
                 `color` = '{$data['color']}' 
             WHERE `car`.`id` = {$id}";

        $this->db->query($sql);
    }

    public function getPromos(): array
    {
        return $this->db->row('SELECT * FROM promo;');
    }

    public function addPromo(array $data): void
    {
        $this->db->query("INSERT INTO promo (name, sale) VALUES ('{$data['name']}', '{$data['sale']}')");
    }

    public function delPromo(int $id): void
    {
        $this->db->query("DELETE FROM promo WHERE id = {$id}");
    }

    public function delCar(int $id): void
    {
        $this->db->query("DELETE FROM car WHERE id = {$id}");
    }
}