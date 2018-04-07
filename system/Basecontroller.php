<?php
/**
 * BaseController
 * 2018/04/07
 * Claudio Genio
 * 
 */
abstract class BaseController {

    public $_view;
    const HTTP200 = "HTTP/1.1 200 OK";
    const HTTP404 = "HTTP/1.0 404 page not found";
    
    public function __construct()
    {
        $this->_view = new Views;
    }

    function action($arg1, $arg2)
    { 
        switch($arg1)
        {
            case 'GET':                 
                $this->call_func ( $arg2,"get");
                break;
            
            case 'POST':
                $this->call_func ( $arg2,"post");
                break;

            default:
                // Invalid Request Method
                header("HTTP/1.0 405 Method Not Allowed");
                break;
        }

    }
    private function call_func ($arg, $method) {
        $func = $arg[0]."::".$arg[0]."_".$method;     
                  
        call_user_func (   
            $func,
            $arg
        );
    }

    function id ($arg, $endpoint){
        $id=null;
        if (count($arg)>1) {
            if ($arg[count($arg)-2]==$endpoint || $arg[count($arg)-2]=="id") {
                $id = $arg[count($arg)-1];
            }
        }
        
        return $id;
    }

    function json_post()
    {
        return file_get_contents('php://input');
    }

    function json_response ($json, $http_code)
    {
        header($http_code);
        header('Content-Type: application/json');
        echo $json;
    }
}