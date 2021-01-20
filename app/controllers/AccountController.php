<?php
/**
 * Created by PhpStorm.
 * User: grwes
 * Date: 04.01.2021
 * Time: 20:57
 */

namespace App\Controllers;

use App\Core\Controller;

class AccountController extends Controller
{

    public function loginAction() {
        if(!empty($_POST)){
            $this->view->message('success', 'Login text');
        }
        $this->view->render('Login page');
    }

    public function registerAction() {
        $this->view->layout = 'custom';
        $this->view->render('Register page');
    }

}