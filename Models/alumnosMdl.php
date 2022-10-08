<?php
include_once "conexion.php";

class alumnosMdl{



      //Insertamos los datos del alumno
      static public function insertarDatosMdl($tabla, $datos, $imagen){

     
     $PDO = Conexion::conectar()->prepare("INSERT INTO $tabla (Matricula,ApellidoP, ApellidoM, Nombre, Edad, FechaNacimiento, Sexo, EstadoCivil, CURP, LugarNacimiento, Estado,
          Nacionalidad, Calle, NoExt, NoInt, Colonia, Cp, Municipio, Localidad, EstadoAct, Telefono, Movil, Email, Tutor, Nivel, id_nivel, id_grado,Generacion,Grupo, Semestre, Turno, 
       CertBach, ActNac, CertMed, FotosInf, CURPCheck,Foto, Otros, Beca, Monto, Observaciones, Status,NoProgresivo,Rol, FechaCaptura) 
      VALUES (:Matricula, :ApellidoP, :ApellidoM, :Nombre, :Edad, :FechaNacimiento, :Sexo, :EstadoCivil, :CURP, :LugarNacimiento, :Estado, :Nacionalidad, :Calle,
       :NoExt, :NoInt, :Colonia, :Cp, :Municipio, :Localidad, :EstadoAct, :Telefono, :Movil, :Email, :Tutor, :Nivel, :id_nivel, :id_grado,:Generacion, :Grupo, :Semestre, :Turno, 
       :CertBach, :ActNac, :CertMed, :FotosInf, :CURPCheck, :Foto,  :Otros, :Beca, :Monto, :Observaciones, :Status, :NoProgresivo, :Rol, NOW())");
         
         $PDO->bindParam(":Matricula", $datos["matricula"], PDO::PARAM_STR);
         $PDO->bindParam(":ApellidoP", $datos["apellidoP"], PDO::PARAM_STR);
         $PDO->bindParam(":ApellidoM", $datos["apellidoM"], PDO::PARAM_STR);
         $PDO->bindParam(":Nombre", $datos["nombre"], PDO::PARAM_STR);
         $PDO->bindParam(":Edad", $datos["edad"], PDO::PARAM_INT);
         $PDO->bindParam(":FechaNacimiento", $datos["fechaN"], PDO::PARAM_STR);
         $PDO->bindParam(":Sexo", $datos["sexo"], PDO::PARAM_STR);
         $PDO->bindParam(":EstadoCivil", $datos["civil"], PDO::PARAM_STR);
         $PDO->bindParam(":CURP", $datos["CURP"], PDO::PARAM_STR);
         $PDO->bindParam(":LugarNacimiento", $datos["lugarN"], PDO::PARAM_STR);
         $PDO->bindParam(":Estado", $datos["estadoNac"], PDO::PARAM_STR);
      

         $PDO->bindParam(":Nacionalidad", $datos["calle"], PDO::PARAM_STR);
         $PDO->bindParam(":Calle", $datos["calle"], PDO::PARAM_STR);
         $PDO->bindParam(":NoExt", $datos["noExt"], PDO::PARAM_STR);
         $PDO->bindParam(":NoInt", $datos["noInt"], PDO::PARAM_STR);
         $PDO->bindParam(":Colonia", $datos["colonia"], PDO::PARAM_STR);
         $PDO->bindParam(":Cp", $datos["CP"], PDO::PARAM_INT);
         $PDO->bindParam(":Municipio", $datos["municipio"], PDO::PARAM_STR);
         $PDO->bindParam(":Localidad", $datos["localidad"], PDO::PARAM_STR);
         $PDO->bindParam(":EstadoAct", $datos["estado"], PDO::PARAM_STR);
         $PDO->bindParam(":Telefono", $datos["telefono"], PDO::PARAM_STR);
         $PDO->bindParam(":Movil", $datos["movil"], PDO::PARAM_STR);
         $PDO->bindParam(":Email", $datos["email"], PDO::PARAM_STR);
         $PDO->bindParam(":Tutor", $datos["tutor"], PDO::PARAM_STR);

         $PDO->bindParam(":Nivel", $datos["nivel"], PDO::PARAM_STR);
         $PDO->bindParam(":id_nivel", $datos["id_nivel"], PDO::PARAM_INT);
         $PDO->bindParam(":id_grado", $datos["grado"], PDO::PARAM_INT);
         $PDO->bindParam(":Grupo", $datos["grupo"], PDO::PARAM_STR);
         $PDO->bindParam(":Semestre", $datos["semestre"], PDO::PARAM_INT);

         $PDO->bindParam(":Generacion", $datos["generacion"], PDO::PARAM_STR);

         $PDO->bindParam(":Turno", $datos["turno"], PDO::PARAM_STR);
         $PDO->bindParam(":CertBach", $datos["certBach"], PDO::PARAM_STR);
         $PDO->bindParam(":ActNac", $datos["actaNac"], PDO::PARAM_STR);
         $PDO->bindParam(":CertMed", $datos["certM"], PDO::PARAM_STR);
         $PDO->bindParam(":FotosInf", $datos["fotosI"], PDO::PARAM_STR);
         $PDO->bindParam(":CURPCheck", $datos["CURPCheck"], PDO::PARAM_STR);
         $PDO->bindParam(":Otros", $datos["otros"], PDO::PARAM_STR);
         $PDO->bindParam(":Foto", $imagen, PDO::PARAM_STR);

         $PDO->bindParam(":Beca", $datos["beca"], PDO::PARAM_STR);
         $PDO->bindParam(":Monto", $datos["monto"], PDO::PARAM_INT);
         $PDO->bindParam(":Observaciones", $datos["observaciones"], PDO::PARAM_STR);
         $PDO->bindParam(":Status", $datos["status"], PDO::PARAM_STR);
         $PDO->bindParam(":NoProgresivo", $datos["NoProgresivo"], PDO::PARAM_INT);
         $PDO->bindParam(":Rol", $datos["rol"], PDO::PARAM_STR);

    
              
          if($PDO->execute()){
                return true;
          }else{
                return false;
          }
     
      }

     //  Actualizar los datos de cada alumno
      static public function actualizarDatosMdl($tabla, $datos, $imagen){



          $PDO = Conexion::conectar()->prepare("UPDATE $tabla SET Matricula = :Matricula, ApellidoP = :ApellidoP, ApellidoM = :ApellidoM , Nombre = :Nombre, Edad = :Edad, FechaNacimiento = :FechaNacimiento, 
          Sexo = :Sexo, EstadoCivil = :EstadoCivil, CURP = :CURP, LugarNacimiento = :LugarNacimiento, Estado = :Estado, Calle = :Calle, NoExt = :NoExt, NoInt = :NoInt, Colonia = :Colonia, Cp = :Cp, 
          Municipio = :Municipio, Localidad = :Localidad, EstadoAct = :EstadoAct, Telefono = :Telefono, Movil = :Movil, Email = :Email, Tutor = :Tutor, Nivel = :Nivel, id_nivel = :id_nivel,
          id_grado = :id_grado,  Generacion = :Generacion, Grupo = :grupo, Semestre = :semestre,  Turno = :Turno, CertBach = :CertBach, ActNac = :ActNac, CertMed = :CertMed, FotosInf = :FotosInf, 
          CURPCheck = :CURPCheck, Foto = :Foto, Otros = :Otros, Beca = :Beca, Monto = :Monto, Observaciones =:Observaciones, Status = :Status, NoProgresivo = :NoProgresivo, Rol = :Rol WHERE Id = :id");
         
 

         $PDO->bindParam(":id", $datos["Id"], PDO::PARAM_INT);
         $PDO->bindParam(":Matricula", $datos["matricula"], PDO::PARAM_STR);
         $PDO->bindParam(":ApellidoP", $datos["apellidoP"], PDO::PARAM_STR);
         $PDO->bindParam(":ApellidoM", $datos["apellidoM"], PDO::PARAM_STR);
         $PDO->bindParam(":Nombre", $datos["nombre"], PDO::PARAM_STR);
         $PDO->bindParam(":Edad", $datos["edad"], PDO::PARAM_INT);
         $PDO->bindParam(":FechaNacimiento", $datos["fechaN"], PDO::PARAM_STR);
         $PDO->bindParam(":Sexo", $datos["sexo"], PDO::PARAM_STR);
         $PDO->bindParam(":EstadoCivil", $datos["civil"], PDO::PARAM_STR);
         $PDO->bindParam(":CURP", $datos["CURP"], PDO::PARAM_STR);
         $PDO->bindParam(":LugarNacimiento", $datos["lugarN"], PDO::PARAM_STR);
         $PDO->bindParam(":Estado", $datos["estadoNac"], PDO::PARAM_STR);
      

         $PDO->bindParam(":Calle", $datos["calle"], PDO::PARAM_STR);
         $PDO->bindParam(":NoExt", $datos["noExt"], PDO::PARAM_STR);
         $PDO->bindParam(":NoInt", $datos["noInt"], PDO::PARAM_STR);
         $PDO->bindParam(":Colonia", $datos["colonia"], PDO::PARAM_STR);
         $PDO->bindParam(":Cp", $datos["CP"], PDO::PARAM_INT);
         $PDO->bindParam(":Municipio", $datos["municipio"], PDO::PARAM_STR);
         $PDO->bindParam(":Localidad", $datos["localidad"], PDO::PARAM_STR);
         $PDO->bindParam(":EstadoAct", $datos["estado"], PDO::PARAM_STR);
         $PDO->bindParam(":Telefono", $datos["telefono"], PDO::PARAM_STR);
         $PDO->bindParam(":Movil", $datos["movil"], PDO::PARAM_STR);
         $PDO->bindParam(":Email", $datos["email"], PDO::PARAM_STR);
         $PDO->bindParam(":Tutor", $datos["tutor"], PDO::PARAM_STR);


         $PDO->bindParam(":Nivel", $datos["nivel"], PDO::PARAM_STR);
         $PDO->bindParam(":id_nivel", $datos["id_nivel"], PDO::PARAM_INT);
         $PDO->bindParam(":id_grado", $datos["grado"], PDO::PARAM_INT);
         $PDO->bindParam(":grupo", $datos["grupo"], PDO::PARAM_STR);
         $PDO->bindParam(":semestre", $datos["semestre"], PDO::PARAM_INT);



         $PDO->bindParam(":Generacion", $datos["generacion"], PDO::PARAM_STR);
         $PDO->bindParam(":Turno", $datos["turno"], PDO::PARAM_STR);
         $PDO->bindParam(":CertBach", $datos["certBach"], PDO::PARAM_STR);
         $PDO->bindParam(":ActNac", $datos["actaNac"], PDO::PARAM_STR);
         $PDO->bindParam(":CertMed", $datos["certM"], PDO::PARAM_STR);
         $PDO->bindParam(":FotosInf", $datos["fotosI"], PDO::PARAM_STR);
         $PDO->bindParam(":CURPCheck", $datos["CURPCheck"], PDO::PARAM_STR);
         $PDO->bindParam(":Otros", $datos["otros"], PDO::PARAM_STR);
         $PDO->bindParam(":Foto", $imagen, PDO::PARAM_STR);

         $PDO->bindParam(":Beca", $datos["beca"], PDO::PARAM_STR);
         $PDO->bindParam(":Monto", $datos["monto"], PDO::PARAM_INT);
         $PDO->bindParam(":Observaciones", $datos["observaciones"], PDO::PARAM_STR);
         $PDO->bindParam(":Status", $datos["status"], PDO::PARAM_STR);
         $PDO->bindParam(":NoProgresivo", $datos["NoProgresivo"], PDO::PARAM_INT);
         $PDO->bindParam(":Rol", $datos["rol"], PDO::PARAM_STR);

     
          if($PDO->execute()){
                return true;
          }else{
                return false;
          }
     
      }

     //  Eliminar alumno
     static public function eliminarAlumnoMdl($tabla, $id){
          $PDO = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id = :id");
          $PDO->bindParam(":id", $id, PDO::PARAM_INT);
          if($PDO->execute()){
               return true;
         }else{
               return false;
         }
     }
     //  Consultar alumnos 
     static public function consultarAlumnosMdl($id, $tabla, $generacion){

          if($generacion != null){
               $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Id = :id AND Generacion = :generacion ORDER BY ApellidoP ASC");
               $PDO->bindParam(":id", $id, PDO::PARAM_INT);
               $PDO->bindParam(":generacion", $generacion, PDO::PARAM_INT);
               $PDO->execute();
               return $PDO->fetchAll();
          }else if($id == null && $tabla == null && $generacion == null){
               $PDO = Conexion::conectar()->prepare("SELECT * FROM cedula  ORDER BY ApellidoP DESC ");
               $PDO->execute();
               return $PDO->fetchAll();
          }
          
     }
     //  Consultar alumnos por status
     static public function seleccionarStatusAlumnoMdl($tabla, $status){

               $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Status = :status");
               $PDO->bindParam(":status", $status, PDO::PARAM_STR);
               $PDO->execute();
               return $PDO->fetchAll();
     }

             // Consultar alumnos por nivel, por grado, grupo y generacion
             static public function consultarAlumnosNivelGradoGrupoGeneracionMdl($tabla, $id_nivel,  $id_grado, $grupo, $generacion){
               $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_nivel = :id_nivel AND Grupo = :grupo AND id_grado = :id_grado AND Generacion = :generacion");
               $PDO->bindParam(":id_nivel", $id_nivel, PDO::PARAM_INT);
               $PDO->bindParam(":grupo", $grupo, PDO::PARAM_STR);
               $PDO->bindParam(":id_grado", $id_grado, PDO::PARAM_INT);
               $PDO->bindParam(":generacion", $generacion, PDO::PARAM_STR);
               $PDO->execute();
               return $PDO->fetchAll();    
       }


             // Consultar alumnos por nivel, por grado, grupo, generacion y status
             static public function consultarAlumnosNivelGradoGrupoGeneracionStatusMdl($tabla, $id_nivel,  $id_grado, $grupo, $generacion, $status){
               $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_nivel = :id_nivel AND Grupo = :grupo AND id_grado = :id_grado AND Generacion = :generacion AND Status = :status ORDER BY ApellidoP ASC");
               $PDO->bindParam(":id_nivel", $id_nivel, PDO::PARAM_INT);
               $PDO->bindParam(":grupo", $grupo, PDO::PARAM_INT);
               $PDO->bindParam(":id_grado", $id_grado, PDO::PARAM_INT);
               $PDO->bindParam(":generacion", $generacion, PDO::PARAM_STR);
               $PDO->bindParam(":status", $status, PDO::PARAM_STR);
               $PDO->execute();
               return $PDO->fetchAll();    
       }

     static public function consultarAlumnosProgresivoMdl($nivel, $tabla, $grupo, $grado){
          $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_nivel = :id AND Grupo = :grupo AND id_grado = :grado ORDER BY NoProgresivo DESC LIMIT 1");
          $PDO->bindParam(":id", $nivel, PDO::PARAM_INT);
          $PDO->bindParam(":grado", $grado, PDO::PARAM_INT);
          $PDO->bindParam(":grupo", $grupo, PDO::PARAM_STR);
          $PDO->execute();
          return $PDO->fetch();
     }
     //  Consultar alumno por ID
     static public function consultarAlumnoIdMdl($tabla, $id){
          $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Id  = :id");
          $PDO->bindParam(":id", $id, PDO::PARAM_INT);
          $PDO->execute();
          return $PDO->fetch();
     }

        //Consultar alumnos por cuatrimestre y carrera pora la lista de asistencias
        static public function consultarAlumnoCuatrimestreMdl($tabla, $idcarrera, $no_cuatrimestre, $generacion){
          $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Id_licenciatura=:id AND Cuatrimestre = :cuatrimestre AND Generacion = :generacion");
          $PDO->bindParam(":id", $idcarrera, PDO::PARAM_INT);
          $PDO->bindParam(":cuatrimestre", $no_cuatrimestre, PDO::PARAM_STR);
          $PDO->bindParam(":generacion", $generacion, PDO::PARAM_STR);
          $PDO->execute();
          return $PDO->fetchAll();
          }

     // Sección para consultar los datos de cada alumno para editar
     static public function consultarDatosMdl($tabla, $id_nivel, $id_grado, $id){

          if($id_nivel != null && $id_grado != null){
               $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_nivel = :id_nivel AND Id = :id AND id_grado = :id_grado");
               $PDO->bindParam(":id_nivel", $id_nivel, PDO::PARAM_INT);
               $PDO->bindParam(":id", $id, PDO::PARAM_INT);
               $PDO->bindParam(":id_grado", $id_grado, PDO::PARAM_INT);
               $PDO->execute();
               return $PDO->fetch();
          }else{
               $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Id = :id");
               $PDO->bindParam(":id", $id, PDO::PARAM_INT);
               $PDO->execute();
               return $PDO->fetch();
          }

     }


    
        // Sección de consulta ajax para los charts (gráficos)
        static public function consultarAlumnosChartMdl($tabla){
          $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla");
          $PDO->execute();
          return $PDO->fetchAll();
     }


    //Seleccionar estado civil
    static public function seleccionarEstadoCivilMdl($tabla){
         $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla");
         $PDO->execute();
         return $PDO->fetchAll();
    }
    //Seleccionar localidades
    static public function seleccionarLocalidadesMdl($tabla){
         $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre ASC");
         $PDO->execute();
         return $PDO->fetchAll();
    }
    //Seleccionar estados
    static public function seleccionarEstadosMdl($tabla){
         $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre ASC");
         $PDO->execute();
         return $PDO->fetchAll();
    }
    //Seleccionar municipios
    static public function seleccionarMunicipiosMdl($tabla){
         $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre ASC");
         $PDO->execute();
         return $PDO->fetchAll();
    }
    //Seleccionar bachilleratos
    static public function seleccionarBachilleratosMdl($tabla){
         $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre ASC");
         $PDO->execute();
         return $PDO->fetchAll();
    }
    //Seleccionar licenciaturas
    static public function seleccionarLicenciaturasMdl($tabla){
         $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla");
         $PDO->execute();
         return $PDO->fetchAll();
    }
    //Seleccionar licenciatura por ID
    static public function seleccionarLicenciaturaMdl($tabla, $id){
         $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Id = :id");
         $PDO->bindParam(":id",$id, PDO::PARAM_INT);
         $PDO->execute();
         return $PDO->fetch();
    }
    //Seleccionar generación
    static public function seleccionarGeneracionMdl($tabla){
         $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla");
         $PDO->execute();
         return $PDO->fetchAll();
    }
    //Seleccionar turno
    static public function seleccionarTurnoMdl($tabla){
         $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla");
         $PDO->execute();
         return $PDO->fetchAll();
    }
                
}

        