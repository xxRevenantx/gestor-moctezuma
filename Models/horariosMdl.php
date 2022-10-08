<?php
include_once "conexion.php";
    
class horariosMdl{




        // INSERTAMOS EL HORARIO

        static public function insertarHorarioMdl($tabla, $datos){
            $PDO = Conexion::conectar()->prepare("INSERT INTO $tabla (nivel, grado, grupo, hora, dia, materia, profesor) 
                                                  VALUES (:nivel, :grado, :grupo, :hora, :dia, :materia, :profesor)");


            $PDO->bindParam(":nivel",$datos["nivel"],PDO::PARAM_STR);
            $PDO->bindParam(":grado",$datos["grado"],PDO::PARAM_STR);
            $PDO->bindParam(":grupo",$datos["grupo"],PDO::PARAM_STR);
            $PDO->bindParam(":hora",$datos["hora"],PDO::PARAM_INT);
            $PDO->bindParam(":dia",$datos["dia"],PDO::PARAM_STR);
            $PDO->bindParam(":materia",$datos["materia"],PDO::PARAM_INT);
            $PDO->bindParam(":profesor",$datos["profesor"],PDO::PARAM_STR);

            if($PDO->execute()){
                 return true;
            }else{
                return false;
            }
        }


        // Consultamos los horarios

        
        static public function  consultarHorarioMdl($tabla, $dia, $nivel, $grado, $grupo, $hora){

            if($tabla != null){
                $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nivel = :nivel AND grado = :grado AND grupo = :grupo AND dia = :dia AND hora = :hora");
                $PDO->bindParam(":nivel",$nivel,PDO::PARAM_INT);
                $PDO->bindParam(":grado",$grado,PDO::PARAM_INT);
                $PDO->bindParam(":grupo",$grupo,PDO::PARAM_STR);
                $PDO->bindParam(":dia",$dia,PDO::PARAM_INT);
                $PDO->bindParam(":hora",$hora,PDO::PARAM_INT);
                $PDO->execute();
                return $PDO->fetch();
            }else{
                $PDO = Conexion::conectar()->prepare("SELECT * FROM horarios WHERE id_licenciatura = :id_licenciatura AND id_cuatrimestre = :id_cuatrimestre");
                $PDO->bindParam(":id_licenciatura",$licenciatura,PDO::PARAM_INT);
                $PDO->bindParam(":id_cuatrimestre",$cuatrimestre,PDO::PARAM_INT);
                $PDO->execute();
                return $PDO->fetch();
            }
        }

        static public function  consultarHorarioFetchAllMdl($tabla,$nivel, $grado, $grupo){

                $PDO = Conexion::conectar()->prepare("SELECT distinct materia, profesor FROM $tabla WHERE nivel = :nivel AND grado = :grado AND grupo = :grupo");
                $PDO->bindParam(":nivel",$nivel,PDO::PARAM_INT);
                $PDO->bindParam(":grado",$grado,PDO::PARAM_INT);
                $PDO->bindParam(":grupo",$grupo,PDO::PARAM_STR);
                $PDO->execute();
                return $PDO->fetchAll();
        }

        // CONSULTAR HORARIOS INDIVIDUALES
        static public function  consultarHorariosIndividualesMdl($tabla){
                $PDO = Conexion::conectar()->prepare("SELECT distinct profesor  FROM $tabla");
                $PDO->execute();
                return $PDO->fetchAll();
        }
        // CONSULTAR HORARIOS INDIVIDUALES POR ID
        static public function  consultarHorariosIndividualesIdMdl($tabla, $profesor){
                $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE profesor = :profesor");
                $PDO->bindParam(":profesor", $profesor, PDO::PARAM_INT);
                $PDO->execute();
                return $PDO->fetchAll();
        }


        // Consultar días
        static public function  consultarHorarioDiasMdl($tabla){
            $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $PDO->execute();
            return $PDO->fetchAll();
        }
        // Consultar días por ID
        static public function consultarHorarioDiasIdMdl($tabla, $id){
            $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Id = :id");
            $PDO->bindParam(":id",$id,PDO::PARAM_INT);
            $PDO->execute();
            return $PDO->fetch();
        }
        // Consultar horario editar Ajax
        static public function  consultarHorarioEditarMdl($tabla, $hora){
            $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE hora = :hora");
            $PDO->bindParam(":hora",$hora,PDO::PARAM_INT);
            $PDO->execute();
            return $PDO->fetchAll();
        }

         // CONSULTAR PROFESOR MEDIANTE EL ID DE LA MATERIA
        static public function  consultarProfesorMateriaMdl($tabla, $id){
            $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Id = :id");
            $PDO->bindParam(":id",$id,PDO::PARAM_INT);
            $PDO->execute();
            return $PDO->fetch();
        }
        
        
        // AGREGAR LAS HORAS
        static public function  agregarHorasMdl($tabla, $datos){
            
                $PDO = Conexion::conectar()->prepare("INSERT INTO $tabla (horas, nivel, grado, grupo) 
            VALUES (:horas, :nivel, :grado, :grupo)");
            $PDO->bindParam(":horas",$datos["horas"],PDO::PARAM_STR);
            $PDO->bindParam(":nivel",$datos["nivel"],PDO::PARAM_INT);
            $PDO->bindParam(":grado",$datos["grado"],PDO::PARAM_INT);
            $PDO->bindParam(":grupo",$datos["grupo"],PDO::PARAM_STR);
            if($PDO->execute()){
                return true;
           }else{
               return false;
           }
        }

        static public function consultarHorasMdl($tabla, $nivel, $grado, $grupo){
            
            $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nivel = :nivel AND grado = :grado AND grupo = :grupo");
            $PDO->bindParam(":nivel",$nivel,PDO::PARAM_INT);
            $PDO->bindParam(":grado",$grado,PDO::PARAM_INT);
            $PDO->bindParam(":grupo",$grupo,PDO::PARAM_STR);
            $PDO->execute();
            return $PDO->fetchAll();
        }


        // Actualizar horario 
        static public function  actualizarHorarioMdl($tabla, $datos){
            $PDO = Conexion::conectar()->prepare("UPDATE $tabla SET modalidad = :modalidad, hora = :hora, materia = :materia, profesor = :profesor WHERE Id = :id");
            $PDO->bindParam(":modalidad",$datos["modalidad"],PDO::PARAM_STR);
            $PDO->bindParam(":hora",$datos["hora"],PDO::PARAM_STR);
            $PDO->bindParam(":materia",$datos["materia"],PDO::PARAM_STR);
            $PDO->bindParam(":profesor",$datos["profesor"],PDO::PARAM_STR);
            $PDO->bindParam(":id",$datos["id"],PDO::PARAM_INT);
            if($PDO->execute()){
                return true;
           }else{
               return false;
           }
        }

            //  Eliminar Horario
     static public function eliminarHorarioMdl($tabla, $id){
        $PDO = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id = :id");
        $PDO->bindParam(":id", $id, PDO::PARAM_INT);
        if($PDO->execute()){
             return true;
       }else{
             return false;
       }
   }



    // FUNCIONES PARA LOS HORARIOS INDIVIDUALES

    static public function consultarHorasIndividualMdl($tabla, $hora){
        $PDO = Conexion::conectar()->prepare("SELECT distinct horas FROM $tabla WHERE Id = :hora");
        $PDO->bindParam(":hora", $hora, PDO::PARAM_INT);
        $PDO->execute();
        return $PDO->fetch();
    }

    // ACTUALIZAR HORARIOS MATERIAS

    static public function actualizarHorarioMateriasMdl($tabla, $actualizarHorario){


        foreach ($actualizarHorario as $key => $value) {
           
            $pm = explode(",",$value);
        
            $PDO = Conexion::conectar()->prepare("UPDATE $tabla SET materia = :materia, profesor = :profesor WHERE Id = :id");
            $PDO->bindParam(":materia", $pm[1], PDO::PARAM_INT);
            $PDO->bindParam(":profesor", $pm[0], PDO::PARAM_INT);
            $PDO->bindParam(":id", $key, PDO::PARAM_INT);
            $PDO->execute();
        }



    }
                
    }
