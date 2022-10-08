<?php

class Funciones{


    // Swal para alertas
    static public function swal($icon, $title, $text, $location){
        echo '<script>
               Swal.fire({
                 icon: "'.$icon.'",
                 title: "'.$title.'",
                 text: "'.$text.'"
               }).then(function(){
                 window.location = "'.$location.'"
               })
             </script>';
     }
 

     
        // Swal para alerta pequeña
   static public function swalMixin($posicion, $icon, $title){
     echo "
     <script>
     const Toast = Swal.mixin({
       toast: true,
       position: '".$posicion."',
       showConfirmButton: false,
       timer: 2000,
       timerProgressBar: true,
       didOpen: (toast) => {
         toast.addEventListener('mouseenter', Swal.stopTimer)
         toast.addEventListener('mouseleave', Swal.resumeTimer)
       }
     })
     
     Toast.fire({
       icon:'".$icon."',
       title: '".$title."'
     })
     </script>
     ";
   }


    //validar credenciales (correo)
    static public function validarCorreo($correo){
      return preg_match("/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/",$correo);
    }

     //validar credenciales (password)
     /*
     Letras minúsculas
      Letras mayúsculas
      Números
      Mínimo 6 caracteres
     */
    static public function validarPassword($password){
      return  preg_match('/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',$password);
    }

     //validar credenciales (user)
    static public function validarUsuario($user){
      /*
        * Letras Minúsculas y mayusqculas
        / Numeros del 1 al 9
      */
     return  preg_match('/^[a-z1-9A-ZñÑáéíóúÁÉÍÓÚ ]+$/', $user);
 
    }

    // Función regresar si no es válida la sesión

    static public function regresarPagina($pagina){
      echo  "<script>
              window.location.href = '$pagina';
             </script>";
    }

       // Prohibir entrar a la página si no se ha iniciado sesión
       public static function prohibirEntrarSinSesion(){
         if(isset($_SESSION["rol"])){
          if($_SESSION["rol"] != "Admin"){
           echo '<script>location.href="dashboard"</script>';
            return;
          }
        }

    }

    // Promedio
    static public function promedio($promedio){
      return bcdiv($promedio,"1","1");
  }

  // Rendondear hacia abajo un valor
    static public function redondearAbajo($numero){
      return floor($numero);
  }
  // MAYÚSCULAS
    static public function mayusculas($texto){
      return mb_strtoupper($texto);
  }

  // RUTA LOCA

  static public function rutaLocal(){
   return "http://localhost/gestor-moctezuma/"; 
  }

}