<?php
        require_once "../../Models/formulariosMdl.php";
        require_once "../../Controllers/formulariosCtr.php";
        

        /* CLASE  */
        
class Ajax{
   public $localidades;
   public $estados;
   public $municipios;
   public $generaciones;
   public $nivelIdGeneracion;

   public $grupo;
   public $nivel;
   public $grado;
            
           // MÉTODOS

         //   LOCALIDADES
         public function agregarLocalidadesAjax(){
            $datos = $this->localidades;
            $respuesta = formulariosCtr::agregarLocalidadesCtr($datos);
            echo json_encode($respuesta);
         }
         //   ESTADOS
         public function agregarEstadosAjax(){
            $datos = $this->estados;
            $respuesta = formulariosCtr::agregarEstadosCtr($datos);
            echo json_encode($respuesta);
         }
         //   MUNICIPIOS
         public function agregarMunicipiosAjax(){
            $datos = $this->municipios;
            $respuesta = formulariosCtr::agregarMunicipiosCtr($datos);
            echo json_encode($respuesta);
         }
         //   GENERACIONES
         public function agregarGeneracionesAjax(){
            $datos = array("generacion" => $this->generaciones, "nivel" => $this->nivelIdGeneracion);
            $respuesta = formulariosCtr::agregarGeneracionesCtr($datos);
            echo json_encode($respuesta);
         }
         //   GRUPOS
         public function agregarGruposAjax(){
            $datos = array("grupo" => $this->grupo, "nivel" => $this->nivel, "grado" => $this->grado,);
            $respuesta = formulariosCtr::agregarGruposCtr($datos);
            echo json_encode($respuesta);
         }
        
}

          
if(isset($_POST["localidades"])){
       $a = new Ajax();
       $a -> localidades =  mb_strtoupper($_POST["localidades"]);
       $a-> agregarLocalidadesAjax();
}
if(isset($_POST["estado"])){
       $a = new Ajax();
       $a -> estados =  mb_strtoupper($_POST["estado"]);
       $a-> agregarEstadosAjax();
}
if(isset($_POST["municipio"])){
       $a = new Ajax();
       $a -> municipios =  mb_strtoupper($_POST["municipio"]);
       $a-> agregarMunicipiosAjax();
}
if(isset($_POST["generacionesConcat"])){
       $a = new Ajax();
       $a -> generaciones =  $_POST["generacionesConcat"];
       $a -> nivelIdGeneracion =  $_POST["nivelIdGeneracion"];
       $a-> agregarGeneracionesAjax();
}
if(isset($_POST["grupo"])){
       $a = new Ajax();
       $a -> grupo =  $_POST["grupo"];
       $a -> nivel =  $_POST["nivel"];
       $a -> grado =  $_POST["grado"];
       $a-> agregarGruposAjax();
}
        
          

    