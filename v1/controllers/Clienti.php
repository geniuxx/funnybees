<?php
 
class Clienti extends BaseController
{
    public $modclienti;

    public function __construct()
    {
        require_once ("models/clienti.php");
        $this->modclienti = new ModelClienti(); 
    }

    //
    //
    function clienti_get($arg) {

        $id="";
         
        $id = $this->id($arg,"clienti");

        if ($id==null) {
            $response = $this->modclienti->all_clienti();
        }
        else 
        {
            $response = $this->modclienti->cliente($id);
        }
 
        $this->json_response ( json_encode($response), $this::HTTP200);
    }

    //
    //
    function clienti_post($arg){

        echo file_get_contents('php://input');
                       
        $response = "clienti_post!!! "; 

        $this->json_response ( json_encode($response), $this::HTTP200);
    }
   
}