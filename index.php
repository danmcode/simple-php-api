<?php
require __DIR__ . '/vendor/autoload.php';

#Show errors, in screen
#comment lines in production
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

#Access header
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Content-Type: application/json; charset=UTF-8");

#module: identify a controller
#method: identify a function

#Auth
$headers = apache_request_headers();
$apikey = $headers["apikey"];


$aut = new Auth();

if(!$aut->Authenticate($apikey)){
    JsonResponse::errResponse(401, [], "Unauthorized");
    exit();
}

$module = isset($_GET['module']) ? $_GET['module'] : null;
$method = isset($_GET['method']) ? $_GET['method'] : null;

#Verify if the controller class exists
if(!class_exists($module.'Controller'))
{
    JsonResponse::errResponse(404, [], "the module $module don't exist");
}

#Define the controller
$controllerName = $module.'Controller';
$controller = new $controllerName();

if(!method_exists($controller, $method))
{
    JsonResponse::errResponse(404, [], "the method $method is undefined");
}

$controller->$method();



