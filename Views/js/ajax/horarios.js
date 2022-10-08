//Ajax horarios
import {swalMixin, urlPrincipal} from '../modulos/modules.js'; 
// EDITAR HORARIOS







$(".editarHorario").click(function() {

    let idHorario = $(this).attr("editarHorario");
    console.log(idHorario);
 
    let datos = new FormData();
    datos.append("idHorario",idHorario);
 
    $.ajax({
    url: urlPrincipal()+'Views/Ajax/horarios.ajax.php',
     method: 'POST',
     data : datos,
     dataType : 'json',
     cache: false,
     contentType: false,
     processData: false,
    success: function (resultado) {
        console.log(resultado);
        let contenedor = document.querySelector(".horarioEdit");

        resultado.forEach(element => {
            console.log(element.profesor);
            contenedor.innerHTML = `
                <td>
                ${element.materia}
                 </td>
           
                

      `;
        });
   


    }
    })
 
 })

// ACTUALIZAR FORMULARIO DE HORARIOS

let formActualizarHorario = document.querySelector("#formHorarios");

let funcionFormActualizarHorario = e => {

    e.preventDefault();

        
    // datos
    let Idhorario = e.target.idHorario.value;
    let modalidad = e.target.modalidadHorarioE.value;
    let hora = e.target.horaHorarioE.value;
    let materia = e.target.materiaHorarioE.value;
    let profesor = e.target.profesorHorarioE.value;

    console.log(modalidad, hora, materia, profesor, Idhorario);

    let datos = new FormData();
    datos.append("modalidad",modalidad);
    datos.append("hora",hora);
    datos.append("materia",materia);
    datos.append("profesor",profesor);
    datos.append("id",Idhorario);



            $.ajax({
                url: urlPrincipal()+'Views/Ajax/horarios.ajax.php',
                method: 'POST',
                data : datos,
                dataType : 'json',
                cache: false,
                contentType: false,
                processData: false,
            success: function (resultado) {
                if(resultado == true){
                    document.querySelector(".cerrarHorario").setAttribute("disabled","")
                    document.querySelector(".actualizarHorario").setAttribute("disabled","")
                    swalMixin("top","info","espera... actualizando.")
                    setTimeout(() => {
                        swalMixin("top","success","Actualizado exitosamente.")
                        location.reload();
                    }, 2000);
                }
               
            }
            })

    }

if(formActualizarHorario){
    formActualizarHorario.addEventListener("submit", funcionFormActualizarHorario);
}


// Eliminar horario

$(".eliminarHorario").click(function() {

    let eliminarHorario = $(this).parent().parent().attr("idHorario");

    let removeRow = $(this).parent().parent();
    
    console.log(eliminarHorario);
    console.log(removeRow);

    let datos = new FormData();
    datos.append("eliminar",eliminarHorario);


        Swal.fire({
          title: "¿Estás seguro?",
          text: "La fila será eliminada permanentemente",
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
            url: urlPrincipal()+'Views/Ajax/horarios.ajax.php',
            method: 'POST',
            data : datos,
            dataType : 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (resultado) {
                console.log(resultado);
            if(resultado == true){
                swalMixin("top-end","success","Fila eliminada correctamente")
            }

        }
        })
    }


})

let agregarHoras = document.querySelector("#agregarHoras");
let funcionAgregarHoras = e => {

    e.preventDefault();

    let horas = e.target.agregarHoras.value;
    let nivelHoras = e.target.nivelHoras.value;
    let gradoHoras = e.target.gradoHoras.value;
    let grupoHoras = e.target.grupoHoras.value;

    let datos = new FormData();
    datos.append("horas",horas)
    datos.append("nivelHoras",nivelHoras)
    datos.append("gradoHoras",gradoHoras)
    datos.append("grupoHoras",grupoHoras)

    $.ajax({
        url: urlPrincipal()+'Views/Ajax/horarios.ajax.php',
        method: 'POST',
        data : datos,
        dataType : 'json',
        cache: false,
        contentType: false,
        processData: false,
        success: function (resultado) {
           if(resultado == true){
            location.reload();
           }
    }
    })

        

}


if(agregarHoras){
    agregarHoras.addEventListener("submit", funcionAgregarHoras);
}


// Cuando cambie la materia
$(".materiaHorario").change(function(e){
   let materiaId = e.target.value;

   let datos = new FormData();
   datos.append("materiaId", materiaId);

   $.ajax({
    url: urlPrincipal()+'Views/Ajax/horarios.ajax.php',
    method: 'POST',
    data : datos,
    dataType : 'json',
    cache: false,
    contentType: false,
    processData: false,
        success: function (resultado) {
            profesor(resultado.Id_profesor);
        }
        })


        function profesor(id){

            let datos = new FormData();
            datos.append("idProfesor", id);

            $.ajax({
                url: urlPrincipal()+'Views/Ajax/profesores.ajax.php',
                method: 'POST',
                data : datos,
                dataType : 'json',
                cache: false,
                contentType: false,
                processData: false,
               success: function (resultado) {
                    if(resultado.Nombre != undefined){
                            
                        document.querySelector(".profesorHorario").value = `${resultado.Nombre} ${resultado.PrimerApellido} ${resultado.SegundoApellido}`;
                        document.querySelector(".profesorHorarioId").value = `${resultado.Id}`;
                    }else{
                        document.querySelector(".profesorHorario").value = "----";
                    }
            
                   }
               })
        }





 
 });




 
