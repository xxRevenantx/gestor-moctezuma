//Ajax pagos
// EXPORTAMOSLAS FUNCIONES
import {swalMixin, urlPrincipal} from '../modulos/modules.js'; 
// IMPORTAMOS LA FUNCIÓN SWALMIXIN PARA SER UTILIZADA



let formPagoInscripcion = document.querySelector("#formPagoInscripcion");
let formPagoActualizarInscripcion = document.querySelector("#formPagoActualizarInscripcion");


//Consulta de nombre
$(".pagarInscripcion").click(function() {


    let attridAlumno = $(this).attr("attrPagoInscripcion");
    
    let idAlumno = document.querySelector(".pagoidInscripcion").value = attridAlumno;

    let dato = new FormData();
    dato.append("idAlumno",idAlumno);
 
    $.ajax({
     url: urlPrincipal()+'Views/Ajax/alumnos.ajax.php',
     method: 'POST',
     data : dato,
     dataType : 'json',
     cache: false,
     contentType: false,
     processData: false,
    success: function (resultado) {
    let nombre = resultado.Nombre+" "+resultado.ApellidoP+" "+resultado.ApellidoM;

   document.querySelector(".nombreInscripcion").value = nombre.toLocaleUpperCase();
   document.querySelector(".IdnivelPagoInscripcion").value = resultado.id_nivel;
   document.querySelector(".IdgradoPagoInscripcion").value = resultado.id_grado;
   document.querySelector(".grupoPagoInscripcion").value = resultado.Grupo;

   document.querySelector(".textInscripcion").textContent = resultado.Matricula;


      }
    })

})

// INSERTAR LOS DATOS
const funcionFormPagoInscripcion = (e) => {
 
    e.preventDefault();
          
    if(e.target.nombreInscripcion.value == "" || e.target.tutorInscripcion.value == "" ||  e.target.pagoInscripcion.value == "" ){
        Swal.fire({
            title: 'Advertencia',
            text: "Existen campos vacíos",
            icon: 'info',

        })
        return false;
    }

    Swal.fire({
        title: "¿Deseas validar el pago?",
        text: "Revisa que los datos sean correctos. Podrás editar el pago más adelante",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'regresar',
        confirmButtonText: 'Sí, validar'
      }).then((result) => {
       
        if (result.isConfirmed) {
            Swal.fire(
                'Ok',
                'Pago de inscripción validado correctamente.',
                'success'
              )
              setTimeout(() => {
                validarPago();
              }, 1000);
        }
      })



      function validarPago(){

        let id = e.target.pagoidInscripcion.value;
        let id_nivel = e.target.IdnivelPagoInscripcion.value;
        let id_grado = e.target.IdgradoPagoInscripcion.value;
        let grupo = e.target.grupoPagoInscripcion.value;
        let tutor = e.target.tutorInscripcion.value;
        let pago = e.target.pagoInscripcion.value;
        let observaciones = e.target.observacionesInscripcion.value;

        let datos = new FormData();
        datos.append("id",id);
        datos.append("id_nivel",id_nivel);
        datos.append("id_grado",id_grado);
        datos.append("grupo",grupo);
        datos.append("tutor",tutor);
        datos.append("pago",pago);
        datos.append("observaciones",observaciones);

        $.ajax({
        url: urlPrincipal()+'Views/Ajax/pagos.alumnos.ajax.php',
        method: 'POST',
        data : datos,
        dataType : 'json',
        cache: false,
        contentType: false,
        processData: false,
          success: function (resultado) {
            console.log(resultado);
            if(resultado == true){
                location.reload();
            }
          }
        })



      }







}

if(formPagoInscripcion){
    formPagoInscripcion.addEventListener("submit", funcionFormPagoInscripcion);
}


// EDITAR LOS DATOS DE LOS PAGOS DE INSCRIPCIÓN

//Consulta de nombre Y id
$(".editarInscripcion").click(function() {


  let attridAlumno = $(this).attr("attrPagoInscripcion");
  let idAlumno = document.querySelector(".pagoidInscripcionE").value = attridAlumno;
  let dato = new FormData();

  dato.append("idAlumno",idAlumno);


  $.ajax({
    url: urlPrincipal()+'Views/Ajax/alumnos.ajax.php',
    method: 'POST',
    data : dato,
    dataType : 'json',
    cache: false,
    contentType: false,
    processData: false,
   success: function (resultado) {
    let nombre = resultado.Nombre+" "+resultado.ApellidoP+" "+resultado.ApellidoM;
    document.querySelector(".nombreInscripcionE").value = nombre.toLocaleUpperCase();
    document.querySelector(".textInscripcionE").textContent = resultado.Matricula;
    
  }
    
  })




  $.ajax({
  url: urlPrincipal()+'Views/Ajax/pagos.alumnos.ajax.php',
   method: 'POST',
   data : dato,
   dataType : 'json',
   cache: false,
   contentType: false,
   processData: false,
  success: function (resultado) {
    
      document.querySelector(".tutorInscripcionE").value = resultado.NombreTutor;
      document.querySelector(".pagoInscripcionE").value = resultado.Pago_inscripcion;
      document.querySelector(".observacionesInscripcionE").value = resultado.Observaciones;
      document.querySelector(".pagoidInscripcionA").value = resultado.Id_alumno;
    }
  })

})




// INSERTAR LOS DATOS
const funcionFormPagoActualizarInscripcion = (e) => {
 
  e.preventDefault();


        
  if(e.target.nombreInscripcionE.value == "" || e.target.pagoidInscripcionA.value == "" ||  e.target.pagoInscripcionE.value == "" || e.target.tutorInscripcionE.value == ""){
      Swal.fire({
          title: 'Advertencia',
          text: "Existen campos vacíos",
          icon: 'info',

      })
      return false;
  }

  Swal.fire({
      title: "¿Deseas actualizar el pago?",
      text: "Revisa que los datos sean correctos. Podrás editar el pago más adelante",
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'regresar',
      confirmButtonText: 'Sí, actualizar'
    }).then((result) => {
     
      if (result.isConfirmed) {
          Swal.fire(
              'Ok',
              'Pago de inscripción actualizado correctamente.',
              'success'
            )
            setTimeout(() => {
              actualizarPago();
            }, 1000);
      }
    })



    function actualizarPago(){

      let idA = e.target.pagoidInscripcionA.value;
      let tutorA = e.target.tutorInscripcionE.value;
      let pagoA = e.target.pagoInscripcionE.value;
      let observacionesA = e.target.observacionesInscripcionE.value;



      let datos = new FormData();
      datos.append("idA",idA);
      datos.append("tutorA",tutorA);
      datos.append("pagoA",pagoA);
      datos.append("observacionesA",observacionesA);

      $.ajax({
      url: urlPrincipal()+'Views/Ajax/pagos.alumnos.ajax.php',
      method: 'POST',
      data : datos,
      dataType : 'json',
      cache: false,
      contentType: false,
      processData: false,
        success: function (resultado) {
          console.log(resultado);
          if(resultado == true){
              location.reload();
          }
        }
      })



    }







}

if(formPagoActualizarInscripcion){
  formPagoActualizarInscripcion.addEventListener("submit", funcionFormPagoActualizarInscripcion);
}

