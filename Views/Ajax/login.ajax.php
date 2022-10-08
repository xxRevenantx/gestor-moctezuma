
<?php
require_once "../../Models/loginMdl.php";
require_once "../../Controllers/loginCtr.php";
        
//   /* CLASE  */

class Ajax {

    public $usuario;
    public $password;

    public function validarLogin(){
       $datos = array("usuario" => $this->usuario, "password" => $this->password);
       $respuesta = LoginCtr::validarLoginCtr($datos);
       echo json_encode($respuesta);
    }

}

if(isset($_POST["usuario"])) {
    $a = new Ajax();
    $a -> usuario = $_POST["usuario"];
    $a -> password = $_POST["password"];
    $a->validarLogin();
}

          

    