
<?php
require_once "../../Models/profesoresMdl.php";
require_once "../../Controllers/profesoresCtr.php";
        

        
        /* CLASE  */
        
class Ajax{
            
    //VARIABLES
      public $titulo;
      public $nombre;
      public $primerApellido;
      public $segundoApellido;
      public $CURP;
      public $telefono;
      public $nivel;
      public $perfil;
      public $status;

      public $idProfesor;


    //VARIABLES ACTUALIZAR
      public $tituloE;
      public $nombreE;
      public $primerApellidoE;
      public $segundoApellidoE;
      public $perfilE;

      public $CURPE;
      public $telefonoE;
      public $nivelE;

      public $statusE;

      public $idProfesorE;

      //Eliminar
      public $eliminar;


    // MÉTODOS

    // Insertar profesor
    public function insertarProfesorAjax(){
      $datos = array("titulo" => $this->titulo,"nombre" => $this->nombre, "primerApellido" =>$this->primerApellido, "segundoApellido" => $this->segundoApellido ,
      "CURP" =>$this->CURP, "telefono" =>$this->telefono, "nivel" =>$this->nivel, "perfil" =>$this->perfil,"status" => $this->status);
      $respuesta = profesoresCtr::insertarProfesorCtr($datos);
      echo json_encode($respuesta);

    }

    //Editar profesor
    public function editarProfesorAjax(){
      $datos = $this->idProfesor;
      $respuesta = profesoresCtr::editarProfesorCtr($datos);
      echo json_encode($respuesta);

    }

   //Actualizar profesor
     public function actualizarProfesorAjax(){
      $datos = array("tituloE" => $this->tituloE,"nombreE" => $this->nombreE, "primerApellidoE" =>$this->primerApellidoE, "segundoApellidoE" => $this->segundoApellidoE,
      "CURPE" =>$this->CURPE,"telefonoE" => $this->telefonoE, "nivelE" => $this->nivelE,
      "perfilE" =>$this->perfilE,"statusE" => $this->statusE, "idE" => $this->idProfesorE
   );
      $respuesta = profesoresCtr::actualizarProfesorCtr($datos);
      echo json_encode($respuesta);


     }

     // Eliminar profesor
        // ELIMINAR ALUMNO
   public function eliminarProfesorAjax(){
      $id = $this->eliminar;
      $respuesta = profesoresCtr::eliminarProfesorCtr($id);
      echo json_encode($respuesta);
   }
       
        
}

          
if(isset($_POST["nombre"])){

   $c = new Ajax();
   $c -> titulo = mb_strtoupper($_POST["titulo"]);
   $c -> nombre = mb_strtoupper($_POST["nombre"]);
   $c -> primerApellido = mb_strtoupper($_POST["apellido1"]);
   $c -> segundoApellido = mb_strtoupper($_POST["apellido2"]);
   $c -> CURP = mb_strtoupper($_POST["CURP"]);
   $c -> telefono = $_POST["telefono"];
   $c -> nivel = $_POST["nivel"];
   $c -> perfil = mb_strtoupper($_POST["perfil"]);
   $c -> status = "ACTIVO";
   $c -> insertarProfesorAjax();
}
        
if(isset($_POST["idProfesor"])){
   $c = new Ajax();
   $c -> idProfesor = $_POST["idProfesor"];
   $c -> editarProfesorAjax();
}

//Actualizar profesor
if(isset($_POST["idProfesorE"])){
   $c = new Ajax();
   $c -> idProfesorE = $_POST["idProfesorE"];
   $c -> tituloE = mb_strtoupper($_POST["tituloE"]);
   $c -> nombreE = mb_strtoupper($_POST["nombreE"]);
   $c -> primerApellidoE = mb_strtoupper($_POST["apellido1E"]);
   $c -> segundoApellidoE = mb_strtoupper($_POST["apellido2E"]);
   $c -> CURPE = mb_strtoupper($_POST["CURPE"]);
   $c -> telefonoE = $_POST["telefonoE"];
   $c -> nivelE = mb_strtoupper($_POST["nivelE"]);

   $c -> perfilE = mb_strtoupper($_POST["perfilE"]);
   $c -> statusE = $_POST["statusE"];
   $c -> actualizarProfesorAjax();
}
        
 //Eliminar profesor
if(isset($_POST["eliminar"])){
   $a = new Ajax();
   $a->eliminar = $_POST["eliminar"];
   $a->eliminarProfesorAjax();
}
         

   