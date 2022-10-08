//Ajax materias
import {swalMixin, urlPrincipal} from '../modulos/modules.js'; // IMPORTAMOS LA FUNCIÓN SWALMIXIN PARA SER UTILIZADA


let agregarMateriaForm = document.querySelector("#agregarMateriaForm");




// ELIMINAR MATERIA

$(".eliminarMateria").click(function() {


    let eliminarMateria = $(this).parent().parent().attr("eliminarMateria");

    let removeRow = $(this).parent().parent();
    
    console.log(eliminarMateria);
    console.log(removeRow);

    let datos = new FormData();
    datos.append("eliminar",eliminarMateria);


        Swal.fire({
          title: "¿Estás seguro?",
          text: "La materia será eliminada permanentemente",
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
            url: urlPrincipal()+'Views/Ajax/materias.ajax.php',
            method: 'POST',
            data : datos,
            dataType : 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (resultado) {
                console.log(resultado);
            swalMixin("top-end","success","Materia eliminada correctamente")
        }
        })
    }


})



const funcionaAgregarMateria = (e) => {
    e.preventDefault();

    if(e.target.agregarMateria.value == "" || e.target.profesorMateria.value == 0){
        e.target.agregarMateria.style.border = "1px solid red";
        e.target.profesorMateria.style.border = "1px solid red";
        swalMixin("top","error","Hay campos vacíos")
        return false;
    }
    // datos
    let agregarMateria = e.target.agregarMateria.value;
    let urlMateria = e.target.urlMateria.value;
    let nivel = e.target.nivelMateria.value;
    let grado = e.target.gradoMateria.value;
    let profesor = e.target.profesorMateria.value;


    let datos = new FormData();
    datos.append("agregarMateria",agregarMateria);
    datos.append("id_nivel",nivel);
    datos.append("id_grado",grado);
    datos.append("profesor",profesor);
    datos.append("urlMateria",urlMateria);


    $.ajax({
        url: urlPrincipal()+'Views/Ajax/materias.ajax.php',
        method: 'POST',
        data : datos,
        dataType : 'json',
        cache: false,
        contentType: false,
        processData: false,
        success: function (resultado) {
            if(resultado == true){
                agregarMateriaForm.reset();
                   e.target.agregarMateria.style.border = "1px solid #e9ecef";
                  swalMixin("top","success","Materia agregada correctamente")
                  location.reload();
          }
        },
    })
}
if(agregarMateriaForm){
agregarMateriaForm.addEventListener("submit", funcionaAgregarMateria);
}

const removeAccents = (str) => {
    return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
  } 


document.querySelector(".agregarMateria").addEventListener("keyup", e => {
    let reemplazar = e.target.value;
    document.querySelector(".urlMateria").value = removeAccents(reemplazar.toLowerCase().replace(/[ -()]/g,"-")); 
})


// EDITAR MATERIAS

$(".editarMateria").click(function() {

    let editarMateria = $(this).attr("editarMateria");
 
    console.log(editarMateria);
 
    let datos = new FormData();
    datos.append("idMateria",editarMateria);
 
    $.ajax({
     url: urlPrincipal()+'Views/Ajax/materias.ajax.php',
     method: 'POST',
     data : datos,
     dataType : 'json',
     cache: false,
     contentType: false,
     processData: false,
    success: function (resultado) { 
          document.querySelector(".noIdMateria").textContent = resultado.Nombre;
          document.querySelector(".agregarMateriaE").value = resultado.Nombre;
          document.querySelector(".profesorMateriaE").value = resultado.Id_profesor;
          document.querySelector(".urlMateriaE").value = resultado.url;
          document.querySelector(".nivelMateriaE").value = resultado.Id_nivel;
          document.querySelector(".gradoMateriaE").value = resultado.Id_grado;
          document.querySelector(".idMateriaE").value = resultado.Id;
 
    }
    })
 
 })
 
 
 
 let formActualizarMaterias = document.querySelector("#formEditarMateria");

let funcionFormActualizarMateria = e => {

    e.preventDefault();

    let agregarMateriaE = e.target.agregarMateriaE.value;
    let profesorMateriaE = e.target.profesorMateriaE.value;
    let urlMateriaE = e.target.urlMateriaE.value;
    let nivelMateriaE = e.target.nivelMateriaE.value;
    let gradoMateriaE = e.target.gradoMateriaE.value;
    let idMateriaE = e.target.idMateriaE.value;

    if(agregarMateriaE == "" || profesorMateriaE == "" ||  urlMateriaE == "" || idMateriaE == ""){
        Swal.fire({
            title: 'Advertencia',
            text: "Existen campos vacíos",
            icon: 'info',

        })
        return false;
    }

            

    let datos = new FormData();
    datos.append("agregarMateriaE",agregarMateriaE);
    datos.append("profesorMateriaE",profesorMateriaE);
    datos.append("urlMateriaE",urlMateriaE);
    datos.append("nivelMateriaE",nivelMateriaE);
    datos.append("gradoMateriaE",gradoMateriaE);
    datos.append("idMateriaE",idMateriaE);



            $.ajax({
                url: urlPrincipal()+'Views/Ajax/materias.ajax.php',
                method: 'POST',
                data : datos,
                dataType : 'json',
                cache: false,
                contentType: false,
                processData: false,
            success: function (resultado) {
                if(resultado == true){
                    document.querySelector(".cerrarMateria").setAttribute("disabled","")
                    document.querySelector(".actualizarMateria").setAttribute("disabled","")
                    document.querySelector(".agregarMateriaE").setAttribute("disabled","")
                    document.querySelector(".profesorMateriaE").setAttribute("disabled","")
                    swalMixin("top","info","espera... actualizando.")
                    setTimeout(() => {
                        swalMixin("top","success","Actualizado exitosamente.")
                        location.reload();
                    }, 1000);
                }  
              
            }
            })

    }

if(formActualizarMaterias){
    formActualizarMaterias.addEventListener("submit", funcionFormActualizarMateria);
}

document.querySelector(".agregarMateriaE").addEventListener("keyup", e => {
    let reemplazar = e.target.value;
    document.querySelector(".urlMateriaE").value = removeAccents(reemplazar.toLowerCase().replace(/[ -()]/g,"-")); 
})