
<?php
include_once "conexion.php";

    class generacionesMdl{
            
            static public function consultarGeneracionesMdl($tabla, $url){
                if($url == null){
                    $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                    $PDO->execute();
                    return $PDO->fetchAll();
                }else{
                    $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE generacion = :id");
                    $PDO->bindParam(":id", $url, PDO::PARAM_INT);
                    $PDO->execute();
                    return $PDO->fetchAll();
                }
         
            }


             //Función para las generaciones
            static public function consultarGeneracionesNivelesMdl($tabla, $id_nivel){
               
                    $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_nivel = :id ORDER BY generacion DESC");
                    $PDO->bindParam(":id",  $id_nivel, PDO::PARAM_INT);
                    $PDO->execute();
                    return $PDO->fetchAll();
                
         
            }

    }

            