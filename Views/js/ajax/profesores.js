//Ajax profesores
// EXPORTAMOS LAS FUNCIONES
import {swalMixin, validarTexto, urlPrincipal} from '../modulos/modules.js'; // IMPORTAMOS LA FUNCIÓN SWALMIXIN PARA SER UTILIZADA

// AGREGAR PROFESORES

const formagregarProfesores = document.querySelector("#formagregarProfesores");

// AGREGAR LAS PROFESORES
const agregarProfesores = e => {
    e.preventDefault();
    let titulo = e.target.tituloProfesor.value;
    let nombre = e.target.nombreProfesor.value;
    let apellido1 = e.target.primerApellidoProfesor.value;
    let apellido2 = e.target.segundoApellidoProfesor.value;
    let CURP = e.target.CURPprofesor.value;
    let telefono = e.target.telefonoProfesor.value;
    let nivel = e.target.nivelProfesor.value;
    let perfil = e.target.perfilProfesor.value;

    console.log(titulo);

    if(titulo == ""){
        e.target.tituloProfesor.style.border = "1px solid red";
        swalMixin("top","error","El campo título está vacío");

        document.querySelector(".tituloProfesor").addEventListener("blur", e => {
            document.querySelector(".tituloProfesor").style.border = "1px solid green"
       })
        return;

    }
    if(nombre == ""){
        e.target.nombreProfesor.style.border = "1px solid red";
        swalMixin("top","error","El campo nombre está vacío");

        document.querySelector(".nombreProfesor").addEventListener("blur", e => {
            document.querySelector(".nombreProfesor").style.border = "1px solid green"
       })
        return;

    }
    if(apellido1 == ""){
        e.target.primerApellidoProfesor.style.border = "1px solid red";
        swalMixin("top","error","El campo primer apellido está vacío")

        document.querySelector(".primerApellidoProfesor").addEventListener("blur", e => {
            document.querySelector(".primerApellidoProfesor").style.border = "1px solid green"
       })
        return;
    }
    if(apellido2 == ""){
        e.target.segundoApellidoProfesor.style.border = "1px solid red";
        swalMixin("top","error","El campo segundo apellido está vacío")

        document.querySelector(".segundoApellidoProfesor").addEventListener("blur", e => {
            document.querySelector(".segundoApellidoProfesor").style.border = "1px solid green"
       })
        return;
    }
    if(perfil == ""){
        e.target.perfilProfesor.style.border = "1px solid red";
        swalMixin("top","error","El campo perfil está vacío")
        document.querySelector(".perfilProfesor").addEventListener("blur", e => {
            document.querySelector(".perfilProfesor").style.border = "1px solid green"
       })
        return;
    }
    if(nivel == ""){
        e.target.nivelProfesor.style.border = "1px solid red";
        swalMixin("top","error","El campo nivel está vacío")
        document.querySelector(".nivelProfesor").addEventListener("blur", e => {
            document.querySelector(".nivelProfesor").style.border = "1px solid green"
       })
        return;
    }

    if(!validarTexto(nombre) || !validarTexto(apellido1) || !validarTexto(apellido2) || !validarTexto(perfil) ){
        swalMixin("top","info","No se aceptan caracteres especiales");
        return;
    }

    let datos = new FormData();
    datos.append("titulo",titulo.trim());
    datos.append("nombre",nombre.trim());
    datos.append("apellido1",apellido1.trim());
    datos.append("apellido2",apellido2.trim());
    datos.append("CURP", CURP.trim());
    datos.append("telefono", telefono.trim());
    datos.append("nivel", nivel.trim());
    datos.append("perfil",perfil.trim());

    $.ajax({
    url: urlPrincipal()+'Views/Ajax/profesores.ajax.php',
    method: 'POST',
    data : datos,
    dataType : 'json',
    cache: false,
    contentType: false,
    processData: false,
        success: function (resultado) {
            console.log(resultado);
            if(resultado == true){
                formagregarProfesores.reset();
                swalMixin("top","info","Espera...");
                setTimeout(() => {
                    swalMixin("top","success","Profesor agregado correctamente");
                    location.href="profesores";
                }, 2000);
            
            }
    }
    })


}

if(formagregarProfesores){
    formagregarProfesores.addEventListener("submit", agregarProfesores);
}


//Editar profesores
$(".editarProfesor").click(function(e) {

    let idProfesor = $(this).attr("editarProfesor");
    console.log(idProfesor);
    let datos = new FormData();

    datos.append("idProfesor",idProfesor);
 
    $.ajax({
     url: urlPrincipal()+'Views/Ajax/profesores.ajax.php',
     method: 'POST',
     data : datos,
     dataType : 'json',
     cache: false,
     contentType: false,
     processData: false,
    success: function (resultado) {
        console.log(resultado);
      document.querySelector(".noIdProfesor").textContent = resultado.Id;
      document.querySelector(".tituloProfesorE").value = resultado.Titulo;
      document.querySelector(".nombreProfesorE").value = resultado.Nombre;
      document.querySelector(".primerApellidoProfesorE").value = resultado.PrimerApellido;
      document.querySelector(".segundoApellidoProfesorE").value = resultado.SegundoApellido;
      document.querySelector(".CURPprofesorE").value = resultado.CURP;
      document.querySelector(".telefonoProfesorE").value = resultado.Telefono;
      document.querySelector(".nivelProfesorE").value = resultado.Nivel;
      document.querySelector(".perfilProfesorE").value = resultado.Perfil;
      document.querySelector(".idProfesorE").value = resultado.Id;
     
      if(resultado.Status == "ACTIVO"){
        document.querySelector(".statusProfesorE").value = resultado.Status;
        document.querySelector(".statusProfesorE").style.border = "1px solid green";
      }else{
        document.querySelector(".statusProfesorE").value = resultado.Status;
        document.querySelector(".statusProfesorE").style.border = "1px solid red";
      }
 
 
        }
    })
 
 })





 let formEditarProfesor = document.querySelector("#formEditarProfesor");
 let funcionFormActualizarProfesor = e => {
 
     e.preventDefault();
 
     if(e.target.nombreProfesorE.value == "" || e.target.primerApellidoProfesorE.value == "" ||  e.target.segundoApellidoProfesorE.value == "" ||
      e.target.perfilProfesorE.value == "" ||  e.target.statusProfesorE.value == ""){
         Swal.fire({
             title: 'Advertencia',
             text: "Existen campos vacíos",
             icon: 'info',
 
         })
         return ;
     }
             
 
     // datos
 
     let titulo = e.target.tituloProfesorE.value;
     let nombre = e.target.nombreProfesorE.value;
     let apellido1 = e.target.primerApellidoProfesorE.value;
     let apellido2 = e.target.segundoApellidoProfesorE.value;
     let perfil = e.target.perfilProfesorE.value;
     let CURP = e.target.CURPprofesorE.value;
     let telefono = e.target.telefonoProfesorE.value;
     let nivel = e.target.nivelProfesorE.value;
     let status = e.target.statusProfesorE.value;
     let idProfesor = e.target.idProfesorE.value;

     console.log(nombre, apellido1, apellido2,perfil,status,idProfesor, titulo);
 
 
     let datos = new FormData();
    datos.append("tituloE",titulo);
    datos.append("nombreE",nombre);
    datos.append("apellido1E",apellido1);
    datos.append("apellido2E",apellido2);
    datos.append("perfilE",perfil);
    datos.append("CURPE",CURP);
    datos.append("telefonoE",telefono);
    datos.append("nivelE",nivel);
    datos.append("statusE",status);
    datos.append("idProfesorE",idProfesor);

 
 
             $.ajax({
                url: urlPrincipal()+'Views/Ajax/profesores.ajax.php',
                 method: 'POST',
                 data : datos,
                 dataType : 'json',
                 cache: false,
                 contentType: false,
                 processData: false,

                 success: function (resultado) {
                console.log(resultado);
                 if(resultado == true){
                     document.querySelector(".cerrarProfesor").setAttribute("disabled","")
                     document.querySelector(".actualizarProfesor").setAttribute("disabled","")
                     swalMixin("top","info","espera... actualizando.")
                     setTimeout(() => {
                         swalMixin("top","success","Actualizado exitosamente.")
                         location.href="profesores"
                     }, 2000);
                 }
             }
             })
 
     }
 
 if(formEditarProfesor){
    formEditarProfesor.addEventListener("submit", funcionFormActualizarProfesor);
 }

 // ELIMINAR ALUMNO

$(".eliminarProfesor").click(function() {

    let eliminarProfesor = $(this).parent().parent().attr("idProfesor");

    let removeRow = $(this).parent().parent();
    
    console.log(eliminarProfesor);
    console.log(removeRow);

    let datos = new FormData();
    datos.append("eliminar",eliminarProfesor);


        Swal.fire({
          title: "¿Estás seguro?",
          text: "El profesor será eliminado permanentemente",
          icon: 'info',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'cancelar',
          confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
          if (result.isConfirmed) {
                 eliminar();
                 removeRow.remove();
          }
        })
 
    function eliminar(){
        $.ajax({
            url: urlPrincipal()+'Views/Ajax/profesores.ajax.php',
            method: 'POST',
            data : datos,
            dataType : 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (resultado) {
            if(resultado == true){
                swalMixin("top-end","success","Alumno eliminado correctamente")
            }
        

        }
        })
    }


})