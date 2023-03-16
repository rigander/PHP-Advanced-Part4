<?php
class IndexController implements IController {
  public function indexAction() {
    $fc = FrontController::getInstance();
    //Добавляем
    $params = $fc->getParams();
    $view = new View();
    $view->name = "John";
    //$view->name = $params['name'];
    $result = $view->render('../views/index.php');

    $fc->setBody($result);
  }
}
