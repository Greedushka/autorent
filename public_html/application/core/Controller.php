<?php
namespace application\core;

use application\core\View;

abstract class Controller {

    public $route;
    public $view;
    public $acl;

    public function __construct($route)
    {
        $this->route = $route;
        $this->checkAcl();
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel($name) {
        $path = 'application\models\\'.ucfirst($name);
        if(class_exists($path)) {
            return new $path;
        }
    }

    public function checkAcl() {
        $this->acl = require 'application/acl/'.$this->route['controller'].'.php';
        if($this->isAcl('all')) {
            return true;
        }
        elseif (isset($_SESSION['authorize']['id']) and $this->isAcl('authorize')) {
            return true;
        }
        elseif (!isset($_SESSION['guests']['id']) and $this->isAcl('guests')) {
            return true;
        }
        elseif (isset($_SESSION['admin']) and $this->isAcl('admin')) {
            return true;
        }
        return false;
    }
    public function isAcl($key){
//        debug($this->acl[$key]);
        return in_array($this->route['controller'], $this->acl[$key]);
    }
}