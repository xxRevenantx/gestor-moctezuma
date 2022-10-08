<?php
include_once 'conexion.php';

class calificacionMdl {

    //Consultar calificaciones
    static public function consultarCalificacionesMdl($tabla, $alumno, $materia, $nivel, $grado,$grupo, $periodo){

        if($alumno == null){
            $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_materia = :id_materia AND id_nivel = :nivel AND id_grado = :id_grado AND grupo = :grupo");
            $PDO->bindParam(":id_materia",$materia,PDO::PARAM_INT);
            $PDO->bindParam(":nivel",$nivel,PDO::PARAM_INT);
            $PDO->bindParam(":id_grado",$grado,PDO::PARAM_INT);
            $PDO->bindParam(":grupo",$grupo,PDO::PARAM_INT);
            $PDO->execute();
            return $PDO->fetch();
        }else{
            $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_alumno = :id_alumno AND id_nivel = :id_nivel AND id_grado = :id_grado AND grupo = :grupo AND id_materia = :id_materia AND id_periodo = :id_periodo ");
            $PDO->bindParam(":id_alumno",$alumno,PDO::PARAM_INT);
            $PDO->bindParam(":id_nivel",$nivel,PDO::PARAM_INT);
            $PDO->bindParam(":id_grado",$grado,PDO::PARAM_INT);
            $PDO->bindParam(":grupo",$grupo,PDO::PARAM_STR);
            $PDO->bindParam(":id_materia",$materia,PDO::PARAM_INT);
            $PDO->bindParam(":id_periodo",$periodo,PDO::PARAM_INT);
            

            $PDO->execute();
            return $PDO->fetch();
        }

    }
    //Consultar calificaciones periodos
    static public function consultarCalificacionesPeriodosMdl($tabla, $alumno, $materia, $nivel, $grado,$grupo){

            $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_alumno = :id_alumno AND id_nivel = :id_nivel AND id_grado = :id_grado AND grupo = :grupo AND id_materia = :id_materia");
            $PDO->bindParam(":id_alumno",$alumno,PDO::PARAM_INT);
            $PDO->bindParam(":id_nivel",$nivel,PDO::PARAM_INT);
            $PDO->bindParam(":id_grado",$grado,PDO::PARAM_INT);
            $PDO->bindParam(":grupo",$grupo,PDO::PARAM_STR);
            $PDO->bindParam(":id_materia",$materia,PDO::PARAM_INT);
            
            $PDO->execute();
            return $PDO->fetch();

    }


       //Consultar calificaciones editar la materia
       static public function consultarCalificacionesMateriaMdl($tabla, $materia, $periodo){
        $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_materia = :id_materia AND id_periodo = :id_periodo");
        $PDO->bindParam(":id_materia",$materia,PDO::PARAM_INT);
        $PDO->bindParam(":id_periodo",$periodo,PDO::PARAM_INT);
        $PDO->execute();
        return $PDO->fetch();
       }



    //Consultar calificaciones editar
      static public function consultarCalificacionesEditarMdl($tabla, $datos){

            $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_materia = :id_materia AND id_licenciatura = :id_licenciatura,
            generacion = :generacion AND cuatrimestre = :cuatrimestre");

            $PDO->bindParam(":id_materia",$datos["materia"],PDO::PARAM_INT);
            $PDO->bindParam(":id_licenciatura",$datos["licenciatura"],PDO::PARAM_INT);
            $PDO->bindParam(":generacion",$datos["generacion"],PDO::PARAM_STR);
            $PDO->bindParam(":cuatrimestre",$datos["cuatrimestre"],PDO::PARAM_INT);
            $PDO->execute();
            return $PDO->fetchAll();

    }

    
    //Consultar calificaciones individuales
    static public function consultarCalificacionesIndividualesMdl($tabla, $alumno, $materia){
        $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_alumno = :id_alumno AND id_materia = :id_materia");
        $PDO->bindParam(":id_alumno",$alumno,PDO::PARAM_INT);
        $PDO->bindParam(":id_materia",$materia,PDO::PARAM_INT);
        $PDO->execute();
        return $PDO->fetch();
    }

    // Insertar calificacion
    static public function insertarCalificacionesMdl($tabla, $profesor, $nivel, $grado, $grupo, $id_materia, $periodo, $calificaciones){


            foreach ($calificaciones as $key => $value) {
                
                $PDO = Conexion::conectar()->prepare("INSERT INTO $tabla (id_alumno, id_maestro, id_nivel, id_grado, grupo, id_materia, id_periodo, calificacion) 
                VALUES(:id_alumno, :id_maestro,  :id_nivel, :id_grado, :grupo, :id_materia, :id_periodo, :calificacion) ");
                
                $PDO->bindParam(":id_alumno", $key, PDO::PARAM_INT);   
                $PDO->bindParam(":id_maestro", $profesor, PDO::PARAM_INT);   
                $PDO->bindParam(":id_materia", $id_materia, PDO::PARAM_INT); 
                $PDO->bindParam(":id_nivel", $nivel, PDO::PARAM_INT); 
                $PDO->bindParam(":id_grado", $grado, PDO::PARAM_INT); 
                $PDO->bindParam(":grupo", $grupo, PDO::PARAM_STR); 
                $PDO->bindParam(":id_periodo", $periodo, PDO::PARAM_INT); 
                $PDO->bindParam(":calificacion", $value, PDO::PARAM_INT); 
                $PDO->execute();
          
            }


    }
    // actualizar calificacion


    static public function actualizarCalificacionesMdl($tabla, $nivel, $grado, $materia, $grupo, $periodo, $calificaciones){

        foreach ($calificaciones as $key => $value) {
        
            $PDO = Conexion::conectar()->prepare("UPDATE $tabla SET calificacion = :calificacion WHERE id_alumno = :id 
            AND id_materia = :id_materia AND id_nivel = :id_nivel AND
            id_grado = :id_grado AND grupo = :grupo AND id_periodo = :id_periodo
            ");
            
            $PDO->bindParam(":id", $key, PDO::PARAM_INT);   
            $PDO->bindParam(":id_nivel", $nivel, PDO::PARAM_INT);   
            $PDO->bindParam(":id_grado", $grado, PDO::PARAM_INT);   
            $PDO->bindParam(":id_materia", $materia, PDO::PARAM_INT);   
            $PDO->bindParam(":grupo", $grupo, PDO::PARAM_STR);   
            $PDO->bindParam(":id_periodo", $periodo, PDO::PARAM_INT);   
            $PDO->bindParam(":calificacion", $value, PDO::PARAM_INT); 
            $PDO->execute();
      
        }
    }


    // Sumatoria por  periodo
    static public function sumatoriaPeriodoMdl($tabla, $alumno, $periodo){
        $PDO = Conexion::conectar()->prepare("SELECT  SUM(calificacion) as suma, calificacion FROM $tabla WHERE id_alumno = :id_alumno AND id_periodo = :id_periodo"); 
        $PDO->bindParam(":id_alumno", $alumno, PDO::PARAM_INT);
        $PDO->bindParam(":id_periodo", $periodo, PDO::PARAM_INT);
        $PDO->execute();
        return $PDO->fetch();
    }
    // Sumatoria por  periodos
    static public function sumatoriaPeriodosMdl($tabla, $alumno, $materia){
        $PDO = Conexion::conectar()->prepare("SELECT  SUM(calificacion) as suma, calificacion, id_materia FROM $tabla WHERE id_alumno = :id_alumno AND id_materia = :id_materia"); 
        $PDO->bindParam(":id_alumno", $alumno, PDO::PARAM_INT);
        $PDO->bindParam(":id_materia", $materia, PDO::PARAM_INT);
        $PDO->execute();
        return $PDO->fetch();
    }

        //Sumatorias finales de básica
     static public function sumatoriaFinalBasicaMdl($tabla, $alumno){
        $PDO = Conexion::conectar()->prepare("SELECT  SUM(calificacion) as suma, calificacion FROM $tabla WHERE id_alumno = :id_alumno");
        $PDO->bindParam(":id_alumno",$alumno,PDO::PARAM_INT);
        $PDO->execute();
        return $PDO->fetch();
    
        }
}