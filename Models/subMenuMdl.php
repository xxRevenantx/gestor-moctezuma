<?php include_once "conexion.php";


class subMenuMdl{

    static public function consultarSubmenuMdl($tabla, $get){
                
            if($get != null){
                $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE url = :url");
                $PDO->bindParam(":url", $get, PDO::PARAM_STR);
                $PDO->execute();
                return $PDO->fetchAll();  
            }else{
                $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                $PDO->execute();
                return $PDO->fetchAll();  
            }
        
               
            
          


    }

}