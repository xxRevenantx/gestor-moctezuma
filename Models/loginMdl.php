
<?php
include_once "conexion.php";


class LoginMdl{
    
    static public function validarLoginMdl($tabla, $datos){
         $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Usuario = :Usuario AND Pass = :pass");
         $PDO->bindParam(":Usuario",$datos["usuario"],PDO::PARAM_STR);
         $PDO->bindParam(":pass",$datos["password"],PDO::PARAM_STR);
         $PDO->execute();
         return $PDO->fetch();

    }
}

        