<?php
class Impiegati extends BaseController
{    
    //
    //
    function impiegati_get($arg)
    {     
        $id="";
         
        $id = $this->id($arg,"impiegati");

        $response = "get_impiegati!!! ".$id;
        
        $this->json_response ( json_encode($response),$this::HTTP200);
    }

    //
    //    
    function impiegati_post()
    {        
        echo $this->json_post();

        $response = "insert_impiegati!!! ";
        
        $this->json_response ( json_encode($response),$this::HTTP200);
    }
}