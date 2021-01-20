<?php
/**
 * Created by PhpStorm.
 * User: grwes
 * Date: 09.01.2021
 * Time: 13:46
 */

namespace App\Models;

use App\Core\Model;

class Main extends Model
{

  public function getNews(){
      $result = $this->db->row('SELECT title,text FROM news');
      return $result;
  }

}