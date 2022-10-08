
<?php

require_once "../../Models/alumnosMdl.php";
require_once "../../Controllers/alumnosCtr.php";
        
/* CLASE  */
        
class Ajax{


   
//VARIABLES

public $NoProgresivo;
public $CURP;
public $nombre ;
public $apellidoP ;
public $apellidoM ;
public $fechaN ;
public $edad ;
public $sexo ;
public $civil ;
public $lugarN ;
public $estadoNac ;
public $calle ;
public $noExt ;
public $noInt ;
public $colonia ;
public $CP;
public $municipio ;
public $localidad ;
public $estado ;
public $telefono ;
public $movil ;
public $email;
public $tutor ;

public $nivel ;
public $id_nivel ;
public $grado ;
public $grupo ;
public $semestre ;


public $generacion ;
public $turno ;
public $certBach ;
public $actaNac ;
public $certM ;
public $fotosI ;
public $CURPcheck ;  
public $foto ;
public $type ;
public $otros ;

public $beca ;
public $monto;
public $observaciones;
public $status;
public $rol;


// Variable para consultar datos editar
public $idAlumno;


// Eliminar alumno
public $eliminar;



   //métodos
   static public  function eliminar_acentos($cadena){

      //Reemplazamos la A y a
      $cadena = str_replace(
      array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
      array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
      $cadena
      );
  
      //Reemplazamos la E y e
      $cadena = str_replace(
      array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
      array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
      $cadena );
  
      //Reemplazamos la I y i
      $cadena = str_replace(
      array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
      array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
      $cadena );
  
      //Reemplazamos la O y o
      $cadena = str_replace(
      array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
      array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
      $cadena );
  
      //Reemplazamos la U y u
      $cadena = str_replace(
      array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
      array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
      $cadena );
  
      //Reemplazamos la N, n, C y c
      $cadena = str_replace(
      array('Ñ', 'ñ', 'Ç', 'ç'),
      array('N', 'n', 'C', 'c'),
      $cadena
      );
  
      return $cadena;
  }




   // INSERTAR LOS DATOS DEL ALUMNO
   public function insetarDatosAjax(){
      $year = "2022";
      $nivel = strtoupper(substr($this->nivel,0,4));
      $nombre = Ajax::eliminar_acentos(mb_substr($this->nombre,0,1,'UTF-8'));
      $apellidop = Ajax::eliminar_acentos(mb_substr($this->apellidoP,0,1,'UTF-8'));
      $apellidom = Ajax::eliminar_acentos(mb_substr($this->apellidoM,0,1,'UTF-8'));
      $matricula = $year.$nivel."0".$this->grado.$this->grupo.$nombre.$apellidop.$apellidom.$this->NoProgresivo;

      $datos = array("matricula" => $matricula, "NoProgresivo" => $this->NoProgresivo, "CURP" => $this->CURP, "nombre" => $this->nombre, "apellidoP" => $this->apellidoP, "apellidoM" => $this->apellidoM, "fechaN" => $this->fechaN, "edad" => $this->edad,"sexo" => $this->sexo,
                     "civil" => $this->civil, "lugarN" => $this->lugarN, "estadoNac" => $this->estadoNac,  "calle" => $this->calle, "noExt" => $this->noExt, "noInt" => $this->noInt, "colonia" => $this->colonia,
                     "CP" => $this->CP, "municipio" => $this->municipio, "localidad" => $this->localidad,  "estado" => $this->estado, "telefono" => $this->telefono, "movil" => $this->movil, "email" => $this->email,
                     "tutor" => $this->tutor, "nivel" => $this->nivel, "id_nivel" => $this->id_nivel, "grado" => $this->grado,  "grupo" => $this->grupo,  "semestre" => $this->semestre,
                     "generacion" => $this->generacion, "turno" => $this->turno, "certBach" => $this->certBach,
                     "actaNac" => $this->actaNac, "certM" => $this->certM, "fotosI" => $this->fotosI,  "CURPCheck" => $this->CURPcheck, "foto" => $this->foto, "type" => $this->type, "otros" => $this->otros, "beca" => $this->beca,
                     "monto" => $this->monto, "observaciones" => $this->observaciones, "status" => $this->status,"rol" => $this->rol
                  );
      $respuesta = alumnosCtr::insertarDatosCtr($datos);
      echo json_encode($respuesta);
   }

   // CONSULTAR ALUMNOS EDITAR
   public function consultarDatosAjax(){

      $id = $this->idAlumno;
      $tabla = "cedula";
      $id_nivel = null;
      $id_grado = null;
      $respuesta = alumnosCtr::consultarDatosCtr($tabla, $id_nivel, $id_grado, $id);
      echo json_encode($respuesta);
   }
   // ELIMINAR ALUMNO
   public function eliminarAlumnoAjax(){

      $id = $this->eliminar;
      $respuesta = alumnosCtr::eliminarAlumnoCtr($id);
      echo json_encode($respuesta);
   }
       
        
}

//Eliminar alumno
if(isset($_POST["eliminar"])){
   $a = new Ajax();
   $a->eliminar = $_POST["eliminar"];
   $a->eliminarAlumnoAjax();
}


//Consultar datos para editar
if(isset($_POST["idAlumno"])){
   $a = new Ajax();
   $a->idAlumno = $_POST["idAlumno"];
   $a->consultarDatosAjax();
}

// INSERTAR DATOS
if(isset($_POST["CURP"])){
   $a = new Ajax();
   $a->NoProgresivo = $_POST["NoProgresivo"];
   $a->CURP = mb_strtoupper($_POST["CURP"]);
   $a->nombre = $_POST["nombre"];
   $a->apellidoP = $_POST["apellidoP"];
   $a->apellidoM = $_POST["apellidoM"];
   $a->fechaN = $_POST["fechaN"];
   $a->edad = $_POST["edad"];
   $a->sexo = $_POST["sexo"];
   $a->civil = $_POST["civil"];
   $a->lugarN = $_POST["lugarN"];
   $a->estadoNac = $_POST["estadoNac"];
   $a->calle = mb_strtoupper($_POST["calle"]);
   $a->noExt = mb_strtoupper($_POST["noExt"]);
   $a->noInt = mb_strtoupper($_POST["noInt"]);
   $a->colonia = mb_strtoupper($_POST["colonia"]);
   $a->CP = $_POST["CP"];
   $a->municipio = $_POST["municipio"]; 
   $a->localidad = $_POST["localidad"];
   $a->estado = $_POST["estado"];
   $a->telefono = $_POST["telefono"];
   $a->movil = $_POST["movil"];
   $a->email = $_POST["email"];
   $a->tutor = mb_strtoupper($_POST["tutor"]);

   $a->nivel = $_POST["nivel"];
   $a->id_nivel = $_POST["id_nivel"];
   $a->grado = $_POST["grado"];
   $a->grupo = $_POST["grupo"];
   $a->semestre = $_POST["semestre"];


   $a->generacion = $_POST["generacion"];
   $a->turno = $_POST["turno"];
   $a->certBach = $_POST["certBach"];
   $a->actaNac = $_POST["actaNac"];
   $a->certM = $_POST["certM"];
   $a->fotosI = $_POST["fotosI"];
   $a->CURPcheck = $_POST["CURPcheck"];
   $a->foto = !empty($_FILES["foto"]["tmp_name"])?$_FILES["foto"]["tmp_name"]:"";
   $a->type = !empty($_FILES["foto"]["type"])?$_FILES["foto"]["type"]:"";
   $a->otros = mb_strtoupper($_POST["otros"]);
   $a->beca = $_POST["beca"];
   $a->monto = $_POST["monto"];
   $a->observaciones = mb_strtoupper($_POST["observaciones"]);
   $a->status = $_POST["status"] == "Selecciona el status..." ? "ACTIVO" : $_POST["status"];
   $a->rol = $_POST["rol"] == "Selecciona el rol..." ? "Estudiante" : $_POST["rol"];
   $a->insetarDatosAjax();
}
        
          

    