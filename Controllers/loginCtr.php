
<?php


class LoginCtr{

        //VALIDAMOS EL LOGIN
        static public function validarLoginCtr($datos){
                $tabla = "usuarios";
                $respuesta = LoginMdl::validarLoginMdl($tabla, $datos);
                // Validamos si el usuario y contraseña de la BD son iguales a los campos que envía el usuario
                if(is_array($respuesta)){

                        // Si el status es BAJA el alumno ya no podrá iniciar sesión
                        
                        if ($datos["usuario"] == $respuesta["Usuario"] && $datos["password"] == $respuesta["Pass"]) {
                                session_start();
                                $_SESSION['validar'] = true;
                                $_SESSION['usuario'] = $respuesta['Usuario'];
                                $_SESSION['rol'] = $respuesta['Rol'];
                                $_SESSION['nombre'] = $respuesta['Nombre'];
                                $_SESSION['id'] = $respuesta['Id'];

                                $response =  array(
                                        "response" => "true",
                                        "usuario" => $respuesta["Rol"]
                                );
                        } 
                        else if($datos["usuario"] == "" || $datos["password"] == ""){
                                $response =  array(
                                "response" => "empty"
                                );
                        }
                        else if($respuesta["Status"] == "BAJA"){
                                $response =  array(
                                    "response" => "baja"
                                );
                        }      
                        }else{
                                $response =  array(
                                        "response" => "error"
                                );
                        }

                  

        return $response;

        }

}

    