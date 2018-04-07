<?php

require_once ("models/clienti.php");

class Test extends BaseController {

    function test_get()
    { 
        
        $modclienti = new ModelClienti(); 

        $data=array();
        $data["firstname"]="Genio";
        $data["lastname"]="Claudio";
        
        $data["clienti"] = $modclienti->all_clienti();

        $this->_view->show ("views/view1.php", $data);
    }
}