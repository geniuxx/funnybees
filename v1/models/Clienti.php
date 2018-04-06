<?php

class ModelClienti extends BaseModel {

    public function all_clienti ()
    {
        global $connection;
        $db = new Db();

        $query="SELECT * FROM sdm_users";         
        $response=array();
        $result=mysqli_query($connection, $query);
        while($row=mysqli_fetch_array($result))
        {
            $response[]=$row;
        }

        return $response;
    }

    public function cliente ($id)
    {
        global $connection;
        $db = new Db();
   
        $query="SELECT * FROM sdm_users Where id=".intval($id);
      
        $response=array();
        $result=mysqli_query($connection, $query);
        while($row=mysqli_fetch_array($result))
        {
            $response=$row;
        }
         
        return $response;
       
    }
}