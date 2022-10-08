<?php
require_once "../../Models/materiasMdl.php";
require_once "../../Controllers/materiasCtr.php";
        

        
/* CLASE  */
        
class Ajax{

   // VARIABLES
   public $materia;
   public $url;

   public $id_nivel;
   public $id_grado;
   public $profesor;

   // Eliminar materia
   public $eliminar;
   
   
   // IdEditar
   public $id;


   // Actualizar
   public $agregarMateriaE;
   public $profesorMateriaE;
   public $urlMateriaE;
   public $nivelMateriaE;
   public $gradoMateriaE;
   public $idMateriaE;

   // ACTUALIZAR ORDEN
   public $actualizarOrden;


            


   // MÉTODOS
      public function agregarMateriaAjax(){
         $datos = array("materia" => $this->materia, "url" => $this->url, "nivel" => $this->id_nivel, "grado" => $this->id_grado, "profesor" => $this->profesor);
         $respuesta = materiasCtr::agregarMateriaCtr($datos);
         echo json_encode($respuesta);
      }

         // ELIMINAR MATERIA
      public function eliminarMateriaAjax(){

         $id = $this->eliminar;
         $respuesta = materiasCtr::eliminarMateriaCtr($id);
         echo json_encode($respuesta);
      }
     
      // CONSULTAR MATERIA PARA EDITAR
      public function consultarMateriaIdAjax(){

         $dato = $this->id;
         $respuesta = materiasCtr::consultarMateriaIdCtr($dato);
         echo json_encode($respuesta);
      }

      // ACTUALIZAR MATERIA
      public function actualizarMateriaAjax(){

         $datos = array("id" => $this->idMateriaE, "materia" => $this->agregarMateriaE, "profesor" => $this->profesorMateriaE, "url" => $this->urlMateriaE, "nivel" => $this->nivelMateriaE, "grado" => $this->gradoMateriaE);
         $respuesta = materiasCtr::actualizarMateriaCtr($datos);
         echo json_encode($respuesta);
      }


      // ACTUALIZAR ORDEN DE LA MATERIA
      public function actualizarOrdenMateriaAjax(){
         $orden =  $this->actualizarOrden;
         $respuesta = materiasCtr::actualizarOrdenMateriaCtr($orden);
         echo $respuesta;
      }
        
}

          


//Agregar materias
if(isset($_POST["urlMateria"])){

   $a = new Ajax();
   $a->materia = $_POST["agregarMateria"];
   $a->url = $_POST["urlMateria"];
   $a->id_nivel = $_POST["id_nivel"];
   $a->id_grado = $_POST["id_grado"];
   $a->profesor = $_POST["profesor"];
   $a->agregarMateriaAjax();
}
        
          

    //Eliminar materias
if(isset($_POST["eliminar"])){
   $a = new Ajax();
   $a->eliminar = $_POST["eliminar"];
   $a->eliminarMateriaAjax();
}


   //Consulta por id materia
if(isset($_POST["idMateria"])){
   $a = new Ajax();
   $a->id = $_POST["idMateria"];
   $a->consultarMateriaIdAjax();
}

//Actualizar materia
if(isset($_POST["idMateriaE"])){
   $a = new Ajax();
   $a->agregarMateriaE = $_POST["agregarMateriaE"];
   $a->profesorMateriaE = $_POST["profesorMateriaE"];
   $a->urlMateriaE = $_POST["urlMateriaE"];
   $a->nivelMateriaE = $_POST["nivelMateriaE"];
   $a->gradoMateriaE = $_POST["gradoMateriaE"];
   $a->idMateriaE = $_POST["idMateriaE"];
   $a->actualizarMateriaAjax();
}


   //Actualizar orden de materia
      if(isset($_POST["position"])){
         $a = new Ajax();
         $a->actualizarOrden = $_POST["position"];
         $a->actualizarOrdenMateriaAjax();
      }

   
   