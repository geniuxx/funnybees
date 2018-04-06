<?php
/**
 * 
 * 
 * 
 */

/* system files */
foreach (glob("../system/*.php") as $filename)
   include $filename;

/* user files */   
foreach (glob("controllers/*.php") as $filename)
   include $filename;

$request_method=$_SERVER["REQUEST_METHOD"];
$URI = "$_SERVER[REQUEST_URI]";

$db = new Db();
$connection =  $db->getConnstring();

$route = new Route; 
$route->baseurl = '/apirest/v1/';  
$route->method = $request_method;
$router = new Router(array($route));

$router->resolve($URI);
