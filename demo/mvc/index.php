<?php
set_include_path(get_include_path()
					.PATH_SEPARATOR.'application/controllers'
					.PATH_SEPARATOR.'application/models'
					.PATH_SEPARATOR.'application/views');

function __autoload($class){
  require_once($class.'.php');
}


$front = FrontController::getInstance();
$front->route();
echo $front->getBody();