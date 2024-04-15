<?php

namespace application\models;

use application\core\Model;

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

}