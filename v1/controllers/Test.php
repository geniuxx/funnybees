<?php
class Test extends BaseController {

    function test_get()
    { 
        require_once ("models/clienti.php");
        $modclienti = new ModelClienti(); 

        $data=array();
        $data["cognome"]="Genio";
        $data["nome"]="Claudio";
        
        $data["clienti"] = $modclienti->all_clienti();

        $this->_view->show ("views/view1.php", $data);
    }
}