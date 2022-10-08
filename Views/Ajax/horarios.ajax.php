
<?php
require_once "../../Models/horariosMdl.php";
require_once "../../Controllers/horariosCtr.php";
        


        
        /* CLASE  */
        
class Ajax{
            
   //VARIABLES
   public $idHorario;


   // ACTUALIZAR HORARIO

   public $modalidad;
   public $hora;
   public $materia;
   public $profesor;
   public $id;

   public $eliminar;

   public $materiaId;


   // Para las horas

   public $horas;
   public $nivelHoras;
   public $gradoHoras;
   public $grupoHoras;


    // MÉTODOS
      // CONSULTAR HORARIOS EDITAR
   public function consultarHorarioAjax(){

      $id = $this->idHorario;
      $respuesta = horariosCtr::consultarHorarioEditarCtr($id);
      echo json_encode($respuesta);
   }

   public function actualizarHorarioAjax(){

      $datos = array("id" => $this->id, "modalidad" => $this->modalidad, "hora" => $this->hora, "materia" => $this->materia, "profesor" => $this->profesor);
      $respuesta = horariosCtr::actualizarHorarioCtr($datos);
      echo json_encode($respuesta);

   }

      // ELIMINAR HORARIO
      public function eliminarHorarioAjax(){
         $id = $this->eliminar;
         $respuesta = horariosCtr::eliminarHorarioCtr($id);
         echo json_encode($respuesta);
      }

        // CONSULTAR PROFESOR MEDIANTE EL ID DE LA MATERIA
   public function consultarProfesorMateriaAjax(){
      $id = $this->materiaId;
      $respuesta = horariosCtr::consultarProfesorMateriaCtr($id);
      echo json_encode($respuesta);
   }
    
   
   // AGREGAR HORAS
   public function agregarHorasAjax(){

      $datos = array("horas"=>$this->horas, "nivel" => $this->nivelHoras, "grado" => $this->gradoHoras, "grupo" => $this->grupoHoras);
      $respuesta = horariosCtr::agregarHorasCtr($datos);
      echo json_encode($respuesta);
   }
          
}




//Eliminar alumno
if(isset($_POST["eliminar"])){
   $a = new Ajax();
   $a->eliminar = $_POST["eliminar"];
   $a->eliminarHorarioAjax();
}



      // CONSULTA DE HORARIO    
if(isset($_POST["idHorario"])){
   $a = new Ajax();
   $a->idHorario = $_POST["idHorario"];
   $a->consultarHorarioAjax();
}

      // CONSULTA DE HORARIO    
if(isset($_POST["id"])){
   $a = new Ajax();
   $a->id = $_POST["id"];
   $a->modalidad = $_POST["modalidad"];
   $a->hora = $_POST["hora"];
   $a->materia = $_POST["materia"];
   $a->profesor = $_POST["profesor"];
   $a->actualizarHorarioAjax();
}
        
          
//Consultar al profesor mediante el id de la materia
if(isset($_POST["materiaId"])){
   $a = new Ajax();
   $a->materiaId = $_POST["materiaId"];
   $a->consultarProfesorMateriaAjax();
}

// Para las horas
if(isset($_POST["horas"])){
   $a = new Ajax();
   $a->horas = $_POST["horas"];
   $a->nivelHoras = intval($_POST["nivelHoras"]);
   $a->gradoHoras = intval($_POST["gradoHoras"]);
   $a->grupoHoras = $_POST["grupoHoras"];
   $a->agregarHorasAjax();
}