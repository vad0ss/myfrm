<?php
/**
 * Created by PhpStorm.
 * User: grwes
 * Date: 05.01.2021
 * Time: 13:47
 */

namespace App\Core;

class View
{
    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route) {
         $this->route = $route;
         $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title, $vars = []) {

         extract($vars);
         $path = 'app/views/'.$this->path.'.php';
         if(file_exists($path)) {
             ob_start();
             require $path;
             $content = ob_get_clean();
             require 'app/views/layouts/'.$this->layout.'.php';
         } else {
             echo 'View not found'.$this->path;
         }

    }

    public static function errorCode($code) {
         http_response_code($code);
         $path = 'app/views/errors/'. $code . '.php';

         if(file_exists($path)){
             require $path;
         }

         exit;
    }

    public function redirect($url) {
         header('location:'.$url);
         exit;
    }

    public function message($status, $message) {
        exit(json_encode(['status' => $status, 'message' => $message]));
    }

}