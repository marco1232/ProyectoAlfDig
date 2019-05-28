<?php
class ConexionBD 
{
     const SERVER = "localhost";
     const USER = "root";
     const PASS = "";
     const DATABASE = "bdalfabetizacion";
     private $cn = null;
     public function getConexionBD()
     {  	
         try
         {
            $this->cn = @mysql_connect(self::SERVER, self::USER, self::PASS);                
            @mysql_select_db(self::DATABASE, $this->cn);

         }
         catch(Exception $e)
         {           	

         }
        return $this->cn;
    }      
}
?>

