<?php

require 'application/lib/Dev.php';

use application\core\Router;

function autoloadMainClasses($class_name){

    $class_name = str_replace('\\', '/', $class_name);

    if(!@include_once $class_name . '.php'){  // знак @ игнорирует ошибки вызванные в условии
//        throw new Exception('Не верное имя файла для подключения - ' . $class_name);
    }
}

spl_autoload_register('autoloadMainClasses');


session_start();

$router = new Router;

$router->run();
