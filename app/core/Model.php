<?php
/**
 * Created by PhpStorm.
 * User: grwes
 * Date: 09.01.2021
 * Time: 14:21
 */

namespace App\Core;

use App\Lib\Db;

abstract class Model
{

    public $db;

    public function __construct() {
        $this->db = new Db;
    }


}