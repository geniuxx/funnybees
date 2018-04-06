<?php
abstract class BaseController {

    public $_view;
    const HTTP200 = "HTTP/1.1 200 OK";

    public function __construct()
    {
        $this->_view = new Views;
    }

    function action($arg1, $arg2)
    { 
        switch($arg1)
        {
            case 'GET':  
                $func = $arg2[0]."::".$arg2[0]."_get";                  
                call_user_func (   
                    $func,
                    $arg2
                );
                break;
            
            case 'POST':
                $func = $arg2[0]."::".$arg2[0]."_post";                  
                call_user_func (   
                    $func,
                    $arg2
                );
                break;

            default:
                // Invalid Request Method
                header("HTTP/1.0 405 Method Not Allowed");
                break;
        }

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