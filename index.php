<?php

use App\Entities\Url;

require_once './vendor/autoload.php';
require './autoload.php';

$url = Url::make();

$id = $url->getId();
$action = $url->getAction();
$controller = ucfirst($url->getController());
$controllerName = 'App\Controllers\\' . $controller . 'Controller';

$controller = new $controllerName($id);
$controller->action($action);
