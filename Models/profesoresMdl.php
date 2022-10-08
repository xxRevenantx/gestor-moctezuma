<?php 

require_once "conexion.php";


class profesoresMdl{
                
      static public function insertarProfesorMdl($tabla, $datos){

        $PDO = Conexion::conectar()->prepare("INSERT INTO $tabla (Titulo, Nombre, PrimerApellido, SegundoApellido, CURP, Telefono, Nivel, Perfil, Status, Fecha) VALUES (:titulo, :nombre, :primerApellido, :segundoApellido, :CURP, :telefono, :nivel, :perfil, :status, NOW() )");
        $PDO->bindParam(":titulo",$datos["titulo"],PDO::PARAM_STR);
        $PDO->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $PDO->bindParam(":primerApellido",$datos["primerApellido"],PDO::PARAM_STR);
        $PDO->bindParam(":segundoApellido",$datos["segundoApellido"],PDO::PARAM_STR);
        $PDO->bindParam(":CURP",$datos["CURP"],PDO::PARAM_STR);
        $PDO->bindParam(":telefono",$datos["telefono"],PDO::PARAM_STR);
        $PDO->bindParam(":nivel",$datos["nivel"],PDO::PARAM_STR);
        $PDO->bindParam(":perfil",$datos["perfil"],PDO::PARAM_STR);
        $PDO->bindParam(":status",$datos["status"],PDO::PARAM_STR);
        if($PDO -> execute()) {
         return true;
        }
        else {
          return false;
        }
    }

    //Consultar profesor
    static public function consultarProfesorMdl($tabla){
         $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla");
         $PDO->execute();
         return $PDO->fetchAll();
    }
    //Consultar profesor por ID
    static public function consultarProfesorIdMdl($tabla, $id){
         $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Id = :id");
         $PDO->bindParam(":id",$id,PDO::PARAM_INT);
         $PDO->execute();
         return $PDO->fetch();
    }
    //Consultar profesor por Nivel
    static public function consultarProfesorNivelMdl($tabla, $nivel){
         $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Nivel = :nivel");
         $PDO->bindParam(":nivel",$nivel,PDO::PARAM_INT);
         $PDO->execute();
         return $PDO->fetch();
    }
  
  //Editar profesor
    static public function editarProfesorMdl($tabla, $dato){
         $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Id = :id");
         $PDO->bindParam(":id",$dato,PDO::PARAM_INT);
         $PDO->execute();
         return $PDO->fetch();
    }
  
  //Actualizar profesor
    static public function actualizarProfesorMdl($tabla, $datos){
         $PDO = Conexion::conectar()->prepare("UPDATE $tabla SET Titulo = :Titulo, Nombre = :Nombre, PrimerApellido = :PrimerApellido, SegundoApellido= :SegundoApellido, 
         CURP = :CURP,Telefono = :Telefono ,Nivel = :Nivel ,Perfil = :Perfil, Status = :Status WHERE Id = :Id ");
         $PDO->bindParam(":Titulo",$datos["tituloE"],PDO::PARAM_STR);
         $PDO->bindParam(":Nombre",$datos["nombreE"],PDO::PARAM_STR);
         $PDO->bindParam(":PrimerApellido",$datos["primerApellidoE"],PDO::PARAM_STR);
         $PDO->bindParam(":SegundoApellido",$datos["segundoApellidoE"],PDO::PARAM_STR);
         $PDO->bindParam(":CURP",$datos["CURPE"],PDO::PARAM_STR);
         $PDO->bindParam(":Telefono",$datos["telefonoE"],PDO::PARAM_STR);
         $PDO->bindParam(":Nivel",$datos["nivelE"],PDO::PARAM_STR);
         $PDO->bindParam(":Perfil",$datos["perfilE"],PDO::PARAM_STR);
         $PDO->bindParam(":Status",$datos["statusE"],PDO::PARAM_STR);
         $PDO->bindParam(":Id",$datos["idE"],PDO::PARAM_INT);
         $PDO->execute();
         if($PDO -> execute()) {
            return true;
           }
           else {
             return false;
           }
    }

    //Eliminar profesor

         static public function eliminarProfesorMdl($tabla, $id){
            $PDO = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id = :id");
            $PDO->bindParam(":id", $id, PDO::PARAM_INT);
            if($PDO->execute()){
                 return true;
           }else{
                 return false;
           }
       }

}

        