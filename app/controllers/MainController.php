<?php
/**
 * Created by PhpStorm.
 * User: grwes
 * Date: 04.01.2021
 * Time: 21:50
 */

namespace App\Controllers;

use App\Core\Controller;

class MainController extends Controller
{

    public function indexAction() {

        $result = $this->model->getNews();

        $vars = [
          'news' => $result,
        ];


        $this->view->render('Index page',$vars);
    }

}