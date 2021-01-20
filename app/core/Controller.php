<?php
/**
 * Created by PhpStorm.
 * User: grwes
 * Date: 04.01.2021
 * Time: 21:17
 */

namespace App\Core;

use App\Core\View;

abstract class Controller
{

    public $route;
    public $view;
    public $model;
    public $acl;

    public function __construct($route){
        $this->route = $route;
        if(!$this->checkAcl()){
            View::errorCode(403);
        }
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel($name) {
        $modelClass = 'app\models\\'.ucfirst($name);

        if(class_exists($modelClass)) {
           return new $modelClass;
        }
    }

    public function checkAcl() {
         $this->acl = require 'app/acl/'.$this->route['controller'].'.php';
         if($this->isAcl('all')) {
             return true;
         }
         elseif(isset($_SESSION['auth']['id']) and $this->isAcl('auth')) {
             return true;
         }
         elseif(!isset($_SESSION['auth']['id']) and $this->isAcl('guest')) {
             return true;
         }
         elseif(isset($_SESSION['admin']) and $this->isAcl('admin')) {
             return true;
         }
         return false;
    }

    private function isAcl($key){
        return in_array($this->route['action'], $this->acl[$key]);
    }

}