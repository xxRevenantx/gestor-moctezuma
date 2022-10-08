
<?php
require_once "../../Models/pagosMdl.php";
require_once "../../Controllers/pagosCtr.php";
        
/* CLASE  */
        
class Ajax{


   
//VARIABLES

   //métodos

   public $id;
   public $id_nivel;
   public $id_grado;
   public $grupo;
   public $tutor;
   public $pago;
   public $observaciones;
   public $status;


   //EDITAR
   public $editarId;

   // ACTUALIZAR
   public $idA;
   public $tutorA;
   public $pagoA;
   public $observacionesA;


   // INSERTAR LOS DATOS DEL ALUMNO
   public function insertarPagoInscripcionAjax(){

      $datos = array(
        "id" => $this->id, "id_nivel" => $this->id_nivel, "id_grado" => $this->id_grado, "grupo" => $this->grupo,
        "tutor" => $this->tutor, "pago" => $this->pago, "observaciones" => $this->observaciones, "status" => $this->status
                  );
      $respuesta = pagosCtr::insertarPagoInscripcionCtr($datos);
      echo json_encode($respuesta);
   }

   
   // EDITAR LOS DATOS DEL ALUMNO
   public function editarPagoInscripcionAjax(){
      $id = $this->editarId;
      $respuesta = pagosCtr::editarPagoInscripcionCtr($id);
      echo json_encode($respuesta);
   }
   
   
   // ACTUALIZAR LOS DATOS DEL ALUMNO
   public function actualizarPagoInscripcionAjax(){
      $datos = array("id" => $this->idA, "tutor" => $this->tutorA, "pago" => $this->pagoA, "observaciones" => $this->observacionesA);
      $respuesta = pagosCtr::actualizarPagoInscripcionCtr($datos);
      echo json_encode($respuesta);
   }

       
        
}


// INSERTAR DATOS
if(isset($_POST["id"])){
   $a = new Ajax();
   $a -> id = intval($_POST["id"]);
   $a -> id_nivel = intval($_POST["id_nivel"]);
   $a -> id_grado = intval($_POST["id_grado"]);
   $a -> grupo = $_POST["grupo"];
   $a -> tutor = mb_strtoupper($_POST["tutor"]);
   $a -> pago = intval($_POST["pago"]);
   $a -> observaciones = $_POST["observaciones"];
   $a -> status = "PAGADO";
   $a->insertarPagoInscripcionAjax();
}
// EDITAR DATOS
if(isset($_POST["idAlumno"])){
   $a = new Ajax();
   $a -> editarId = intval($_POST["idAlumno"]);
   $a->editarPagoInscripcionAjax();
}


// ACTUALIZAR  DATOS
if(isset($_POST["idA"])){
   $a = new Ajax();
   $a -> idA = intval($_POST["idA"]);
   $a -> tutorA = mb_strtoupper($_POST["tutorA"]);
   $a -> pagoA = intval($_POST["pagoA"]);
   $a -> observacionesA = $_POST["observacionesA"];
   $a->actualizarPagoInscripcionAjax();
}

        
          

    