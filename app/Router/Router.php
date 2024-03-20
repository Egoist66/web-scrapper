<?php 

namespace App\Router;
use App\Controllers\ParserController;

class Router {
  public static function route(array $query){
    $page = $query['page'] ?? '';
      switch($page){
        case '':
        case 'home':
            if(isset($query['action'])){
              switch($query['action']){
                case 'create':
                  ParserController::create();
                  break;

                case 'destroy':
                  ParserController::destroy();
                  break;
              }
            }
          echo ParserController::index();
        break;
       
     
  
    }
  }
}