<?php 
class Views {

    function show($file, $data)
    {     
        extract($data);
        
        ob_start();
        include_once ($file);
        $page = ob_get_clean();     

        echo $page;
    }
}