<?php
namespace application\core;

class View {

    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title, $vars = []) {
        extract($vars);
        if(file_exists('application/views/'.$this->path.'.php')){
            ob_start();
            require 'application/views/'.$this->path.'.php';
            $content = ob_get_clean();
            require 'application/views/layouts/'.$this->layout.'.php';
        } else {
            echo 'Вид не найден';
        }

    }
    public function redirect($url) {
        header('location: /'.$url);
        exit();
    }
    public static function errorCode($type) {
        http_response_code($type);
        require 'application/views/errors/'.$type.'.php';
        exit;
    }
    public function message($status, $message) {
        exit(json_encode(['status' => $status, 'message' => $message]));
    }
    public function location($url) {
        exit(json_encode(['url' => $url]));
    }

}