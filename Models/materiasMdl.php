<?php
include_once "conexion.php";


class materiasMdl{

     //insetar materias
     static public function agregarMateriaMdl($tabla, $datos){
        $PDO = Conexion::conectar()->prepare("INSERT INTO $tabla (Nombre, Id_nivel, Id_grado, Id_profesor,url) VALUES(:nombre, :nivel, :grado, :profesor, :url)");
        $PDO->bindParam(":nombre", $datos["materia"], PDO::PARAM_STR);
        $PDO->bindParam(":nivel", $datos["nivel"], PDO::PARAM_INT);
        $PDO->bindParam(":grado", $datos["grado"], PDO::PARAM_INT);
        $PDO->bindParam(":profesor", $datos["profesor"], PDO::PARAM_STR);
        $PDO->bindParam(":url", $datos["url"], PDO::PARAM_STR);
        
        if($PDO->execute()){
            return true;
      }else{
            return false;
      }
       
        
    }

    //Consultar materias
    static public function consultarMateriasMdl($tabla, $nivel, $grado){
        $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Id_nivel = :id_nivel AND Id_grado = :id_grado ORDER BY orden");
        $PDO->bindParam(":id_nivel", $nivel, PDO::PARAM_INT);
        $PDO->bindParam(":id_grado", $grado, PDO::PARAM_INT);
        $PDO->execute();
        return $PDO->fetchAll();
    }
    //Consultar materias para calificaciones
    static public function consultarMateriasCalificacionesMdl($tabla, $nivel, $grado){
        $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Id_nivel = :id_nivel AND Id_grado = :id_grado ORDER BY orden");
        $PDO->bindParam(":id_nivel", $nivel, PDO::PARAM_INT);
        $PDO->bindParam(":id_grado", $grado, PDO::PARAM_INT);
        $PDO->execute();
        return $PDO->fetchAll();
    }

         //  Eliminar materias
     static public function eliminarMateriaMdl($tabla, $id){
            $PDO = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id = :id");
            $PDO->bindParam(":id", $id, PDO::PARAM_INT);
            if($PDO->execute()){
                 return true;
           }else{
                 return false;
           }
       }


    // Consultar materias por id
    static public function consultarMateriaIdMdl($tabla, $id){
        $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Id = :id");
        $PDO->bindParam(":id", $id, PDO::PARAM_INT);
        $PDO->execute();
        return $PDO->fetch();
    }

    // Actualizar materias
    static public function actualizarMateriaMdl($tabla, $datos){
        $PDO = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre = :nombre, Id_nivel = :id_nivel, Id_grado = :id_grado, Id_profesor = :id_profesor, url = :url WHERE Id = :id");
        $PDO->bindParam(":nombre", $datos["materia"], PDO::PARAM_STR);
        $PDO->bindParam(":id_nivel", $datos["nivel"], PDO::PARAM_INT);
        $PDO->bindParam(":id_grado", $datos["grado"], PDO::PARAM_INT);
        $PDO->bindParam(":id_profesor", $datos["profesor"], PDO::PARAM_INT);
        $PDO->bindParam(":url", $datos["url"], PDO::PARAM_STR);
        $PDO->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        if($PDO->execute()){
            return true;
      }else{
            return false;
      }
    }
    // Actualizar orden por materias
    static public function actualizarOrdenMateriaMdl($tabla, $orden){
        $i = 1;
        foreach($orden as $key=>$value){
         
            // return $value;
            $PDO = Conexion::conectar()->prepare("UPDATE $tabla SET orden = $i WHERE Id=".$value);    
            $PDO->execute();
           
            $i++;
        }

    }


    // Consultar las materias por Id en la template
    static public function consultarMateriaIdTemplateMateriaMdl($tabla, $id){
        $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_materia = :id_materia");
        $PDO->bindParam(":id_materia", $id, PDO::PARAM_INT);
        $PDO->execute();
        return $PDO->fetchAll();
      }


                
}

        