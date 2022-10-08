// EXPORTAMOSLAS FUNCIONES
import {urlPrincipal} from '../modulos/modules.js'; 

   $(".materiaCalificacion").click(function(){

    let idMateria = $(this).attr("materiaCalificacionId");
    let nombreMateria = $(this).attr("materiaCalificacionNombre");
    let profesor = $(this).attr("materiaCalificacionProfesor");

    document.querySelector(".idMateriaCalificacion").value = idMateria;
    document.querySelector(".idProfesorCalificacion").value = profesor;
    document.querySelector(".nombreMateria").textContent = "Agregar calificaciones de "+nombreMateria;

    })






    $(".materiaCalificacionEditar").click(function(){
    let  idMateriaCalificacionEditar = $(this).attr("idMateriaCalificacionEditar");
    let  nivelCalificacionEditar = $(this).attr("nivelCalificacionEditar");
    let  gradoCalificacionEditar = $(this).attr("gradoCalificacionEditar");
    let  periodoCalificacionEditar = $(this).attr("periodoCalificacionEditar");
    let profesorCalificacionEditar = $(this).attr("materiaCalificacionProfesorE");
    let nombreMateria = $(this).attr("materiaCalificacionNombreEditar");


    let el1 =  document.querySelector(".idMateriaCalificacionE").value = idMateriaCalificacionEditar;
    let el2 =  document.querySelector(".nivelCalificacionE").value = nivelCalificacionEditar;
    let el3 =  document.querySelector(".gradoCalificacionE").value = gradoCalificacionEditar;
    let el4 =  document.querySelector(".periodoCalificacionE").value = periodoCalificacionEditar;
    let el5 =  document.querySelector(".idProfesorCalificacionE").value =  profesorCalificacionEditar;
   document.querySelector(".nombreMateriaE").textContent = "Editar calificaciones de " + nombreMateria;


    let datos = new FormData();
    datos.append("materia", el1);
    datos.append("nivel", el2);
    datos.append("grado", el3);
    datos.append("periodo", el4);
    datos.append("profesor", el5);


    $.ajax({
    url: urlPrincipal()+'Views/Ajax/calificaciones.ajax.php',
    method: 'POST',
    data : datos,
    dataType : 'json',
    cache: false,
    contentType: false,
    processData: false,
    success: function (resultado) {
     console.log(resultado);
    }
    })



    })




    