
// FUNCIONES QUE SERÁN REUTILIZADAS O EXPORTADAS EN OTROS SCRIPTS

// swal
export function swal(icon,title,text,location){
    Swal.fire({
        icon: icon,
        title: title,
        text: text,
      }).then(function(){
        window.location = location
      })

}




export function swalMixin(position,icon,title){
    const Toast = Swal.mixin({
        toast: true,
        position: position,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon:icon,
        title: title,
      })
}

//validar correo
function validarCorreo(correo){
  let regex = /^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/;
  return regex.test(correo);
}

//validar password
/*
      Letras minúsculas
      Letras mayúsculas
      Números
      Mínimo 6 caracteres
 */
function validarPassword(password){
  let regex = /^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/;
  return regex.test(password);
}


//validar usuario
/*
        * Letras Minúsculas y mayusqculas
        * Numeros del 1 al 9
*/
function validarUsuario(usuario){
  let regex = /^[a-z1-9A-ZñÑáéíóúÁÉÍÓÚ ]+$/;
  return regex.test(usuario);
}


export function validarTexto(texto){
  let regex = /^[a-z1-9A-ZñÑáéíóúÁÉÍÓÚ .-/()]+$/;
  return regex.test(texto);
}

// Url principal
export function urlPrincipal(){
  return "http://localhost/gestor-moctezuma/";
  // return "http://192.168.1.65/gestor-moctezuma/";
}


// export {swal,swalMixin,validarCorreo,validarPassword,validarUsuario}