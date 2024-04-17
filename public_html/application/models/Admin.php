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

    public function addpost(array $data): void
    {
        $this->db->query("INSERT INTO post VALUES (default, '{$data['title']}', '{$data['desc']}', '{$data['img']}')");
    }

    public function getPosts()
    {
        return $this->db->query('SELECT * FROM post');
    }

    public function getPost($id)
    {
        return $this->db->query("SELECT * FROM post WHERE id = {$id}");
    }

    public function editPost(int $id, array $data): void
    {
        $sql = "UPDATE `post` SET `title` = '{$data['title']}', 
                 `description` = '{$data['description']}', 
                 `img` = '{$data['img']}'
             WHERE `post`.`id` = {$id}";

        $this->db->query($sql);
    }

    public function delPost($id)
    {
        return $this->db->query("DELETE FROM post WHERE id = $id");
    }

    public function isPostExists($id) {
        $params = [
            'id' => $id
        ];

        return $this->db->column('SELECT id FROM posts WHERE id = :id', $params);
    }

    public function getReviews() {
        return $this->db->row('SELECT * FROM reviews');
    }

    public function reviewDelete($id) {
        return $this->db->query("DELETE FROM reviews WHERE id = {$id}");
    }

    public function getUser() {
        return $this->db->row('SELECT * FROM user');
    }

    public function userDelete($id) {
        return $this->db->query("DELETE FROM user WHERE id = {$id}");
    }

    public function getOrders() {
        return $this->db->row('SELECT * FROM orders');
    }

    public function postData(int $id) {
        $params = [
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM car WHERE id = :id', $params);
    }

    public function carData(int $id) {
        $params = [
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM post WHERE id = :id', $params);
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