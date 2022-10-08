//Ajax alumnos
// EXPORTAMOSLAS FUNCIONES
import {swalMixin, urlPrincipal} from '../modulos/modules.js'; 
// IMPORTAMOS LA FUNCIÓN SWALMIXIN PARA SER UTILIZADA



let formInscripcion = document.querySelector("#formInscripcion");


// ELIMINAR ALUMNO

$(".eliminarAlumno").click(function() {


    let eliminarAlumno = $(this).parent().parent().parent().attr("eliminarAlumno");

    let removeRow = $(this).parent().parent().parent();
    
    console.log(eliminarAlumno);
    console.log(removeRow);

    let datos = new FormData();
    datos.append("eliminar",eliminarAlumno);


        Swal.fire({
          title: "¿Estás seguro?",
          text: "El alumno será eliminado permanentemente",
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
            url: urlPrincipal()+'Views/Ajax/alumnos.ajax.php',
            method: 'POST',
            data : datos,
            dataType : 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
            console.log('ok')
        },
            success: function (resultado) {
            swalMixin("top-end","success","Alumno eliminado correctamente")
        }
        })
    }


})





// CONSULTAR CURP
const $curp = document.querySelector("#CURP");
const $loader = document.querySelector(".load");


const consultarCurp =  async (e) => {


      $curp.addEventListener("change",  async e => {
        const curp = e.target.value;
      
        

        let options = {
            "method": "GET",
            "headers": {
                // "x-rapidapi-host": "curp-renapo.p.rapidapi.com",
                // "x-rapidapi-key": "b1fdb65b8cmshe29514476bdfa5bp1c895djsn48b9d30c7b12"

                'X-RapidAPI-Host': 'curp-renapo.p.rapidapi.com',
                'X-RapidAPI-Key': '44b0125e0emsh2d93efe6d6e5c0bp1aff34jsn4147d25ed7c5'
            }
        }

        let res = await fetch(`https://curp-renapo.p.rapidapi.com/v1/curp/${curp}`, options),
            consulta = await res.json();
            console.log(consulta);

            $loader.style.display = "block";
            // INFO - SI EL CURP NO ESTÁ VALIDADO EN RENAPO

            if(consulta.status == 400){
                swalMixin("top","info","No se encontró el CURP solicitado");
                $loader.style.display = "none";
            }
            if(consulta.renapo_valid == undefined){
                swalMixin("top","info","No se puede consultar CURP en RENAPO");

                // SI NO HAY CURPS DISPONIBLES
                fechaNacAutomatica();

                $loader.style.display = "none";
            }

            // SI EL CURP ESTÁ VALIDADO
            if(consulta.renapo_valid == true){
                setTimeout(() => {
                    datos()
                },2000)
            }

            let datos = () => {
            $loader.style.display = "none";
            let apellidoP = consulta.paternal_surname[0].toUpperCase() + consulta.paternal_surname.toLowerCase().slice(1);
            formInscripcion.querySelector(".apellidoP").value = apellidoP;
 
            let apellidoM = consulta.mothers_maiden_name[0].toUpperCase() +  consulta.mothers_maiden_name.toLowerCase().slice(1);
            formInscripcion.querySelector(".apellidoM").value = apellidoM;
 
            let nombre = consulta.names[0].toUpperCase() + consulta.names.toLowerCase().slice(1);
            formInscripcion.querySelector(".nombre").value = nombre;
 

                if(consulta.sex == "HOMBRE"){
                    formInscripcion.querySelector(".masculino").checked=true
                }else{
                    formInscripcion.querySelector(".femenino").checked=true
                }
 
                let Fecha = consulta.birthdate;
                let dia = Fecha.substring(0,2);
                let mes = Fecha.substring(3,5);
                let anio = Fecha.substring(6,10);
    
                let fecha = anio+"-"+mes+"-"+dia;   ;
                formInscripcion.querySelector(".fechaN").value = fecha;


                // fecha automática
                let fechaAlumno = fecha;
                console.log(fechaAlumno);
        
                var hoy = new Date();
                var cumpleanios= new Date(fechaAlumno);
                console.log(cumpleanios);
                var edad = hoy.getFullYear() - cumpleanios.getFullYear();
                var m = hoy.getMonth() - cumpleanios.getMonth();
        
        
                if (m < 0 || (m == 0 && hoy.getDate() < cumpleanios.getDate())) {
                    edad--;
                }
    
                    document.querySelector(".edad").value = edad;
            }

    });

}

consultarCurp();



let fechaNacAutomatica = e => {
    let fechaAlumno = document.querySelector(".fechaN")

    fechaAlumno.addEventListener('blur', e => {

        let fechaAlumno = e.target.value;

        var hoy = new Date();
        var cumpleanios= new Date(fechaAlumno);
        var edad = hoy.getFullYear() - cumpleanios.getFullYear();
        var m = hoy.getMonth() - cumpleanios.getMonth();

        if (m < 0 || (m == 0 && hoy.getDate() < cumpleanios.getDate())) {
            edad--;
        }
        document.querySelector(".edad").value = edad;

    })
}




const funcionFormInscripcion = (e) => {
        e.preventDefault();

        if(e.target.nombre.value == "" || e.target.apellidoP.value == "" ||  e.target.apellidoM.value == "" 
        || e.target.CURP.value == "" || e.target.fechaN.value == ""  || e.target.generacion.value == "" ){
            Swal.fire({
                title: 'Advertencia',
                text: "Existen campos vacíos",
                icon: 'info',

            })
            return false;
        }

            let datos = new FormData();
        // datos
        let NoProgresivo = e.target.NoProgresivo.value;
        let CURP = e.target.CURP.value;
        let nombre = e.target.nombre.value;
        let apellidoP = e.target.apellidoP.value;
        let apellidoM = e.target.apellidoM.value;
        let fechaN = e.target.fechaN.value;
        let edad = e.target.edad.value;
        let sexo = e.target.sexo.value;
        let civil = e.target.civil.value;
        let lugarN = e.target.lugarNac.value;
        let estadoNac = e.target.estadoNac.value;
        let calle = e.target.calle.value;
        let noExt = e.target.noExt.value;
        let noInt = e.target.noInt.value;
        let colonia = e.target.colonia.value;
        let CP = e.target.CP.value;
        let municipio = e.target.municipio.value;
        let localidad = e.target.localidad.value;
        let estado = e.target.estado.value;
        let telefono = e.target.telefono.value;
        let movil = e.target.movil.value;
        let email = e.target.email.value;
        let tutor = e.target.tutor.value;

        let nivel = e.target.nivel.value;
        let id_nivel = e.target.id_nivel.value;
        let grado = e.target.grado.value;
        let grupo = e.target.grupo.value;
        let semestre = e.target.semestre.value;

        let generacion = e.target.generacion.value;
        let turno = e.target.turno.value;
        let certBach = e.target.certBach.checked;
        let actaNac = e.target.actaNac.checked;
        let certM = e.target.certM.checked;
        let fotosI = e.target.fotosI.checked;
        let CURPcheck = e.target.CURPcheck.checked;
        // let previsualizar = e.target.previsualizar.src;
        let foto = e.target.foto.files[0];
        let otros = e.target.otros.value;

        let beca = e.target.beca.checked;
        let monto = e.target.monto.value;
        let observaciones = e.target.observaciones.value;
        let status = e.target.status.value;
        let rol = e.target.rol.value;



        datos.append("NoProgresivo",NoProgresivo);
        datos.append("CURP",CURP);
        datos.append("nombre",nombre);
        datos.append("apellidoP",apellidoP);
        datos.append("apellidoM",apellidoM);
        datos.append("fechaN",fechaN);
        datos.append("edad",edad);
        datos.append("sexo",sexo);
        datos.append("civil",civil);
        datos.append("lugarN",lugarN);
        datos.append("estadoNac",estadoNac);
        datos.append("calle",calle);
        datos.append("noExt",noExt);
        datos.append("noInt",noInt);
        datos.append("colonia",colonia);
        datos.append("CP",CP);
        datos.append("municipio",municipio);
        datos.append("colonia",colonia);
        datos.append("localidad",localidad);
        datos.append("estado",estado);
        datos.append("telefono",telefono);
        datos.append("movil",movil);
        datos.append("email",email);
        datos.append("tutor",tutor);

        datos.append("nivel",nivel);
        datos.append("id_nivel",id_nivel);
        datos.append("grado",grado);
        datos.append("grupo",grupo);
        datos.append("semestre",semestre);


        datos.append("generacion",generacion);
        datos.append("turno",turno);
        datos.append("certBach",certBach);
        datos.append("actaNac",actaNac);
        datos.append("certM",certM);
        datos.append("fotosI",fotosI);
        datos.append("CURPcheck",CURPcheck);
        // datos.append("previsualizar",previsualizar);
        datos.append("foto",foto);
        datos.append("otros",otros);
        datos.append("beca",beca);
        datos.append("monto",monto);
        datos.append("observaciones",observaciones);
        datos.append("status",status);
        datos.append("rol",rol);
            

    

        $.ajax({
            url: urlPrincipal()+'Views/Ajax/alumnos.ajax.php',
            method: 'POST',
            data : datos,
            dataType : 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (resultado) {
                console.log(resultado);
               if(resultado == false){
                swalMixin("top","error","Ocurrió un problema, es posible que el CURP ya exista en la base de datos")
                return;
               }else{
                swalMixin("top","success","Ok! Alumno Inscrito correctamente");
                location.reload();
                formInscripcion.reset();
               }
            },
        })




}
if(formInscripcion){
    formInscripcion.addEventListener("submit", funcionFormInscripcion);
}




// CUANDO CAMBIE EL SELECT DE LICENCIATURAS
var $eventSelectLicenciaturas = $(".licenciaturas-select");

$eventSelectLicenciaturas.on("change", e =>  { 
    switch (e.target.value) {
        case "LICENCIATURA EN NUTRICIÓN":
                document.querySelector(".id_licenciatura").value=1;
            break;
        case "LICENCIATURA EN ADMINISTRACIÓN EMPRESARIAL":
                document.querySelector(".id_licenciatura").value=2;
            break;
        case "LICENCIATURA EN CIENCIAS POLÍTICAS Y ADMINISTRACIÓN PÚBLICA":
                document.querySelector(".id_licenciatura").value=3;
            break;
        case "LICENCIATURA EN CRIMINOLOGÍA, CRIMINALÍSTICA Y TÉCNICAS PERICIALES":
                document.querySelector(".id_licenciatura").value=4;
            break;
        case "LICENCIATURA EN CIENCIAS DE LA EDUCACIÓN":
                document.querySelector(".id_licenciatura").value=5;
            break;
        case "LICENCIATURA EN CULTURA FÍSICA Y DEPORTES":
                document.querySelector(".id_licenciatura").value=6;
            break;
    
        default:
            document.querySelector(".id_licenciatura").value=0;
            break;
    }


}
);

// // CUANDO CAMBIE EL SELECT DE STATUS
var $eventSelectStatus = $(".status-select");
$eventSelectStatus.on("change", e =>  { 
    console.log(e.target.value);
         // SWITCH STATUS
         switch (e.target.value) {
            case "ACTIVO":
             document.querySelector(".status").classList.add("border-success")
                break;
            case "BAJA":
             document.querySelector(".select2-selection__rendered").classList.add("border-danger")
                break;
            case "SUSPENDIDO":
             document.querySelector(".status").classList.add("border-warning")
                break;
            case "BAJA TEMPORAL":
             document.querySelector(".status").classList.add("border-primary")
                break;
            case "PENDIENTE":
             document.querySelector(".status").classList.add("border-info")
                break;
        
            default:
                break;
        }

}
);


// EDITAR ALUMNOS

$(".editarAlumno").click(function() {

   let idAlumno = $(this).attr("editarAlumno");

   console.log(idAlumno);

   let datos = new FormData();
   datos.append("idAlumno",idAlumno);

   $.ajax({
    url: urlPrincipal()+'Views/Ajax/alumnos.ajax.php',
    method: 'POST',
    data : datos,
    dataType : 'json',
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function () {
    console.log('ok')
   },
   success: function (resultado) {

    console.log(resultado);

        document.querySelector(".noIdAlumno").textContent = resultado.Id;
        document.querySelector(".IdAlumno").value = parseInt(resultado.Id);
        document.querySelector(".CURP").value = resultado.CURP;
        document.querySelector(".NoProgresivo").value = resultado.NoProgresivo;
        // document.querySelector(".matriculaA").value = resultado.Matricula;
        document.querySelector(".nombre").value = resultado.Nombre;
        document.querySelector(".apellidoP").value = resultado.ApellidoP;
        document.querySelector(".apellidoM").value = resultado.ApellidoM;
        document.querySelector(".fechaN").value = resultado.FechaNacimiento;
        document.querySelector(".edad").value = resultado.Edad;

        resultado.Sexo == "FEMENINO" ? document.querySelector(".femenino").checked= true : document.querySelector(".masculino").checked= true;


        document.querySelector(".civil").value = resultado.EstadoCivil;
        document.querySelector(".lugarNac").value = resultado.LugarNacimiento;
        document.querySelector(".estadoNac").value = resultado.Estado;



        document.querySelector(".calle").value = resultado.Calle;
        document.querySelector(".noExt").value = resultado.NoExt;
        document.querySelector(".noInt").value = resultado.NoInt;
        document.querySelector(".colonia").value = resultado.Colonia;
        document.querySelector(".CP").value = resultado.Cp;
        document.querySelector(".municipio").value = resultado.Municipio;
        document.querySelector(".localidad").value = resultado.Localidad;
        document.querySelector(".estado").value = resultado.EstadoAct;
        document.querySelector(".telefono").value = resultado.Telefono;
        document.querySelector(".movil").value = resultado.Movil;
        document.querySelector(".email").value = resultado.Email;
        document.querySelector(".tutor").value = resultado.Tutor;

        document.querySelector(".nivel").value = resultado.Nivel;
        document.querySelector(".id_nivel").value = resultado.id_nivel;
        document.querySelector(".grado").value = resultado.id_grado;
        document.querySelector(".grupo").value = resultado.Grupo;


        // document.querySelector(".id_licenciatura").value = resultado.Id_licenciatura;
        // document.querySelector(".cuatrimestre").value = resultado.Cuatrimestre;
        document.querySelector(".turno").value = resultado.Turno;
        document.querySelector(".generacion").value = resultado.Generacion;

       resultado.CertBach == "true" ?  document.querySelector(".certBach").checked = true : document.querySelector(".certBach")
       resultado.ActNac == "true" ?  document.querySelector(".actaNac").checked = true : document.querySelector(".actaNac")
       resultado.CertMed == "true" ?  document.querySelector(".certM").checked = true : document.querySelector(".certM")
       resultado.FotosInf == "true" ?  document.querySelector(".fotosI").checked = true : document.querySelector(".fotosI")
       resultado.CURPCheck == "true" ?  document.querySelector(".CURPcheck").checked = true : document.querySelector(".CURPcheck")
      
       document.querySelector(".imagenPreview").src = urlPrincipal()+resultado.Foto.substr(6,);
       document.querySelector(".foto_preview").value = resultado.Foto;
      
       resultado.Beca == "true" ?  document.querySelector(".beca").checked = true : document.querySelector(".beca")
       document.querySelector(".monto").value = resultado.Monto;
       document.querySelector(".otros").value = resultado.Otros;
       document.querySelector(".observaciones").value = resultado.Observaciones;
       document.querySelector(".rol").value = resultado.Rol;
     

       // SWITCH STATUS
       switch (resultado.Status) {
           case "ACTIVO":
            document.querySelector(".status").value = resultado.Status;
            document.querySelector(".status").classList.add("border-success")
               break;
           case "BAJA":
            document.querySelector(".status").value = resultado.Status;
            document.querySelector(".status").classList.add("border-danger")
               break;
           case "SUSPENDIDO":
            document.querySelector(".status").value = resultado.Status;
            document.querySelector(".status").classList.add("border-warning")
               break;
           case "BAJA TEMPORAL":
            document.querySelector(".status").value = resultado.Status;
            document.querySelector(".status").classList.add("border-primary")
               break;
           case "PENDIENTE":
            document.querySelector(".status").value = resultado.Status;
            document.querySelector(".status").classList.add("border-info")
               break;
       
           default:
               break;
       }






   }
   })

})







// -----------------------------------------------------------------------------------------------

let selectNivel = document.querySelector(".nivel")
selectNivel.addEventListener("change", e =>  { 
    console.log(e.target.value);
         // SWITCH ID LICENCIATURA
         switch (e.target.value) {
            case "PREESCOLAR":
                    document.querySelector(".id_nivel").value=1;
                break;
            case "PRIMARIA":
                    document.querySelector(".id_nivel").value=2;
                break;
            case "SECUNDARIA":
                    document.querySelector(".id_nivel").value=3;
                break;
            case "BACHILLERATO":
                    document.querySelector(".id_nivel").value=4;
                break;
            default:
              
                break;
        }

}
);


let formActualizar = document.querySelector("#formEditar");

let funcionFormActualizar = e => {

    e.preventDefault();

    if(e.target.nombre.value == "" || e.target.apellidoP.value == "" ||  e.target.apellidoM.value == "" || e.target.CURP.value == ""){
        Swal.fire({
            title: 'Advertencia',
            text: "Existen campos vacíos",
            icon: 'info',

        })
        return false;
    }
            

    // datos
    let NoProgresivo = e.target.NoProgresivo.value;
    let CURP = e.target.CURP.value;
    let nombre = e.target.nombre.value;
    let apellidoP = e.target.apellidoP.value;
    let apellidoM = e.target.apellidoM.value;
    let fechaN = e.target.fechaN.value;
    let edad = e.target.edad.value;
    let sexo = e.target.sexo.value;
    let civil = e.target.civil.value;
    let lugarN = e.target.lugarNac.value;
      let estadoNac = e.target.estadoNac.value;
    let calle = e.target.calle.value;
    let noExt = e.target.noExt.value;
    let noInt = e.target.noInt.value;
    let colonia = e.target.colonia.value;
    let CP = e.target.CP.value;
    let municipio = e.target.municipio.value;
    let localidad = e.target.localidad.value;
    let estado = e.target.estado.value;
    let telefono = e.target.telefono.value;
    let movil = e.target.movil.value;
    let email = e.target.email.value;
    let tutor = e.target.tutor.value;

    let nivel = e.target.nivel.value;
    let id_nivel = e.target.id_nivel.value;
    let grado = e.target.grado.value;
    let grupo = e.target.grupo.value;
    let semestre = e.target.semestre.value;


    let generacion = e.target.generacion.value;
    let turno = e.target.turno.value;
    let certBach = e.target.certBach.checked;
    let actaNac = e.target.actaNac.checked;
    let certM = e.target.certM.checked;
    let fotosI = e.target.fotosI.checked;
    let CURPcheck = e.target.CURPcheck.checked;
    // let previsualizar = e.target.previsualizar.src;
    let foto = e.target.foto.files[0];
    let foto_preview = e.target.foto_preview.value;
    let otros = e.target.otros.value;

    let beca = e.target.beca.checked;
    let monto = e.target.monto.value;
    let observaciones = e.target.observaciones.value;
    let status = e.target.status.value;
    let rol = e.target.rol.value;
    let Id = e.target.IdAlumno.value

    console.log(NoProgresivo);

    let datos = new FormData();
    datos.append("Id",Id);
    datos.append("NoProgresivo",NoProgresivo);
    datos.append("CURP",CURP);
    datos.append("nombre",nombre);
    datos.append("apellidoP",apellidoP);
    datos.append("apellidoM",apellidoM);
    datos.append("fechaN",fechaN);
    datos.append("edad",edad);
    datos.append("sexo",sexo);
    datos.append("civil",civil);
    datos.append("lugarN",lugarN);
    datos.append("estadoNac",estadoNac);
    datos.append("calle",calle);
    datos.append("noExt",noExt);
    datos.append("noInt",noInt);
    datos.append("colonia",colonia);
    datos.append("CP",CP);
    datos.append("municipio",municipio);
    datos.append("colonia",colonia);
    datos.append("localidad",localidad);
    datos.append("estado",estado);
    datos.append("telefono",telefono);
    datos.append("movil",movil);
    datos.append("email",email);
    datos.append("tutor",tutor);

    datos.append("nivel",nivel);
    datos.append("id_nivel",id_nivel);
    datos.append("grado",grado);
    datos.append("grupo",grupo);
    datos.append("semestre",semestre);

    datos.append("generacion",generacion);
    datos.append("turno",turno);
    datos.append("certBach",certBach);
    datos.append("actaNac",actaNac);
    datos.append("certM",certM);
    datos.append("fotosI",fotosI);
    datos.append("CURPcheck",CURPcheck);
    // datos.append("previsualizar",previsualizar);
    datos.append("foto",foto);
    datos.append("foto_preview",foto_preview);
    datos.append("otros",otros);
    datos.append("beca",beca);
    datos.append("monto",monto);
    datos.append("observaciones",observaciones);
    datos.append("status",status);
    datos.append("rol",rol);


            $.ajax({
                url: urlPrincipal()+'Views/Ajax/actualizar.alumnos.ajax.php',
                method: 'POST',
                data : datos,
                dataType : 'json',
                cache: false,
                contentType: false,
                processData: false,
            success: function (resultado) {
                console.log(resultado);
                if(resultado == true){
                  
                    document.querySelector(".cerrarAlumno").setAttribute("disabled","")
                    document.querySelector(".actualizarAlumno").setAttribute("disabled","")
                    swalMixin("top","info","espera... actualizando.")
                    setTimeout(() => {
                        swalMixin("top","success","Actualizado exitosamente.")
                        location.reload();
                    }, 2000);
                }  
              
            }
            })

    }

if(formActualizar){
    formActualizar.addEventListener("submit", funcionFormActualizar);
}

