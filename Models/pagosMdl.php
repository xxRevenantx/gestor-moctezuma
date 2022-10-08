<?php
include_once "conexion.php";


 class pagosMdl{

    // insertar los pagos de inscripción
    static public function insertarPagoInscripcionMdl($tabla, $datos){


        $PDO = Conexion::conectar()->prepare("INSERT INTO $tabla (NombreTutor, Id_alumno, Id_nivel, Id_grado, Grupo, Pago_inscripcion, Observaciones, Fecha_inscripcion, Status) 
        VALUES (:NombreTutor, :Id_alumno, :Id_nivel, :Id_grado, :Grupo, :Pago_inscripcion, :Observaciones, NOW(), :Status)");
        $PDO->bindParam(":NombreTutor",$datos["tutor"],PDO::PARAM_STR);
        $PDO->bindParam(":Id_alumno",$datos["id"],PDO::PARAM_INT);
        $PDO->bindParam(":Id_nivel",$datos["id_nivel"],PDO::PARAM_INT);
        $PDO->bindParam(":Id_grado",$datos["id_grado"],PDO::PARAM_INT);
        $PDO->bindParam(":Grupo",$datos["grupo"],PDO::PARAM_STR);
        $PDO->bindParam(":Pago_inscripcion",$datos["pago"],PDO::PARAM_INT);
        $PDO->bindParam(":Observaciones",$datos["observaciones"],PDO::PARAM_STR);
        $PDO->bindParam(":Status",$datos["status"],PDO::PARAM_STR);

        if($PDO->execute()){
            return true;
        }else{
             return false;
        }
    }



        // seleccionar el pago de inscripción
        static public function seleccionarPagoInscripcionMdl($tabla, $id){
            $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Id_alumno = :id");
            $PDO->bindParam(":id", $id, PDO::PARAM_INT);
            $PDO->execute();
            return $PDO->fetch();
    }


        // editar pago de inscripción
        static public function editarPagoInscripcionMdl($tabla, $id){
            $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Id_alumno = :id");
            $PDO->bindParam(":id", $id, PDO::PARAM_INT);
            $PDO->execute();
            return $PDO->fetch();
    }
     
    
    // actualizar pago de inscripción
        static public function actualizarPagoInscripcionMdl($tabla, $datos){
            $PDO = Conexion::conectar()->prepare("UPDATE $tabla SET Pago_inscripcion = :pago, NombreTutor = :tutor, Observaciones = :observaciones WHERE Id_alumno = :id");
            $PDO->bindParam(":pago", $datos["pago"], PDO::PARAM_INT);
            $PDO->bindParam(":tutor", $datos["tutor"], PDO::PARAM_STR);
            $PDO->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
            $PDO->bindParam(":id", $datos["id"], PDO::PARAM_INT);
            if($PDO->execute()){
                return true;
            }else{
                 return false;
            }
    }

                
}

        