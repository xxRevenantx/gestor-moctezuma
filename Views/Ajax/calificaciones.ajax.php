
<?php

require_once "../../Models/calificacionesMdl.php";
require_once "../../Controllers/calificacionesCtr.php";
        
/* CLASE  */
        
class Ajax{
//VARIABLES

    public $idMateria;


    // Editar calificaciones
    public $materia;
    public $alumno;
    public $licenciatura;
    public $generacion;
    public $cuatrimestre;
    public $calificiacion;

   //métodos

   // INSERTAR LOS DATOS DEL ALUMNO
   public function insetarCalificacionesAjax(){

      $datos = array("idMateria" => $this->idMateria);
      $respuesta = calificacionCtr::insertarCalificacionesCtr($datos);
      echo json_encode($respuesta);
   }


   // CONSULTAR CALIFICACIONES PARA EDITAR
   public function consultarCalificacionesEditarAjax(){

      $datos = array("materia" => $this->materia, "licenciatura" => $this->licenciatura, "generacion" => $this->generacion,
      "cuatrimestre" => $this->cuatrimestre);
      $respuesta = calificacionCtr::consultarCalificacionesEditarCtr($datos);
      echo json_encode($respuesta);
   }

        
}


// Insertar calificacion
if(isset($_POST["calificacion"])){
    $a = new Ajax();
    $a->idMateria = $_POST["idMateria"];
    $a->insetarCalificacionesAjax();
 }
 
// consultar calificacion
if(isset($_POST["materia"])){
    $a = new Ajax();
    $a->materia =  intval($_POST["materia"]);
    $a->alumno = $_POST["alumno"];
    $a->licenciatura =  intval($_POST["licenciatura"]);
    $a->generacion = $_POST["generacion"];
    $a->cuatrimestre = intval( $_POST["cuatrimestre"]);
    $a->consultarCalificacionesEditarAjax();
 }
 