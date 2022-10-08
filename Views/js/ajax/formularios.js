// EXPORTAMOSLAS FUNCIONES
import {swalMixin, validarTexto, urlPrincipal} from '../modulos/modules.js'; // IMPORTAMOS LA FUNCIÓN SWALMIXIN PARA SER UTILIZADA

//Ajax formularios

// AGREGAR LOCALIDADES

const formLocalidades = document.querySelector("#agregarLocalidades");
const formEstados = document.querySelector("#agregarEstados");
const formMunicipio = document.querySelector("#agregarMunicipio");
const formGeneracion = document.querySelector("#agregarGeneracion");
const formGrupos = document.querySelector("#agregarGrupos");

// AGREGAR LAS LOCALIDADESW
const agregarLocalidades = e => {
    e.preventDefault();
    let localidades = e.target.agregarLoc.value;

    if(localidades == ""){
        e.target.agregarLoc.style.border = "1px solid red";
        swalMixin("top","error","Este campo está vacío")
        return;
    }

    if(!validarTexto(localidades)){
        swalMixin("top","info","No se aceptan caracteres especiales");
        return;
    }
   

  

    let dato = new FormData();
    dato.append("localidades",localidades)

    $.ajax({
        url: urlPrincipal()+'Views/Ajax/formularios.ajax.php',
        method: 'POST',
        data : dato,
        dataType : 'json',
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
        console.log('ok')
    },
        success: function (resultado) {
            console.log(resultado);
            if(resultado == true){
              formLocalidades.reset();
                 e.target.agregarLoc.style.border = "1px solid #e9ecef";
                swalMixin("top","success","Localidad agregada correctamente")
                location.href="formularios";
        }
    }
    })


}

if(formLocalidades){
    formLocalidades.addEventListener("submit", agregarLocalidades);
}


// AGREGAMOS LOS ESTADOS
const agregarEstados = e => {
    e.preventDefault();
    let estado = e.target.agregarEst.value;

    if(estado == ""){
        e.target.agregarEst.style.border = "1px solid red";
        swalMixin("top","error","Este campo está vacío")
        return;
    }

    if(!validarTexto(estado)){
        swalMixin("top","info","No se aceptan caracteres especiales");
        return;
    }
   

  

    let dato = new FormData();
    dato.append("estado",estado)

    $.ajax({
        url: urlPrincipal()+'Views/Ajax/formularios.ajax.php',
        method: 'POST',
        data : dato,
        dataType : 'json',
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
        console.log('ok')
    },
        success: function (resultado) {
            console.log(resultado);
            if(resultado == true){
                 formEstados.reset();
                 e.target.agregarEst.style.border = "1px solid #e9ecef";
                swalMixin("top","success","Estado agregado correctamente")
                location.href="formularios";
        }
    }
    })


}
if(formEstados){
    formEstados.addEventListener("submit", agregarEstados);
}


// AGREGAR MUNICIPIOS
const agregarMunicipio = e => {
    e.preventDefault();
    let municipio = e.target.agregarMun.value;

    if(municipio == ""){
        e.target.agregarMun.style.border = "1px solid red";
        swalMixin("top","error","Este campo está vacío")
        return;
    }

    if(!validarTexto(municipio)){
        swalMixin("top","info","No se aceptan caracteres especiales");
        return;
    }
   

  

    let dato = new FormData();
    dato.append("municipio",municipio)

    $.ajax({
        url: urlPrincipal()+'Views/Ajax/formularios.ajax.php',
        method: 'POST',
        data : dato,
        dataType : 'json',
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
        console.log('ok')
    },
        success: function (resultado) {
            console.log(resultado);
            if(resultado == true){
              formMunicipio.reset();
                 e.target.agregarMun.style.border = "1px solid #e9ecef";
                swalMixin("top","success","Municipio agregado correctamente")
                location.href="formularios";
        }
    }
    })


}


if(formMunicipio){
    formMunicipio.addEventListener("submit", agregarMunicipio);
}





// formGeneracion.addEventListener("change", e => {
//     let generacion1 = e.target.generacion1.value;
//     let generacion2 = e.target.generacion2.value;
//     console.log(generacion1);
//     console.log(generacion2);

// })

// AGREGAR LAS GENERACIONES
const agregarGeneracion = e => {

    e.preventDefault();
    let generacion1 = e.target.generacion1.value;
    let generacion2 = e.target.generacion2.value;

    let  generacionesConcat= e.target.generacionesConcat.value = generacion1+"-"+generacion2;

    let  nivelIdGeneracion = e.target.nivelIdGeneracion.value = e.target.nivelGeneracion.value;


    if(generacion1 == "" || generacion2 == "" || nivelIdGeneracion == "0"){
        e.target.generacion1.style.border = "1px solid red";
        e.target.generacion2.style.border = "1px solid red";
        e.target.nivelIdGeneracion.style.border = "1px solid red";
        swalMixin("top","error","Este campo está vacío")
        return;
    }

    let dato = new FormData();
    dato.append("generacionesConcat",generacionesConcat)
    dato.append("nivelIdGeneracion",nivelIdGeneracion)

    $.ajax({
        url: 'Views/Ajax/formularios.ajax.php',
        method: 'POST',
        data : dato,
        dataType : 'json',
        cache: false,
        contentType: false,
        processData: false,
        success: function (resultado) {
            if(resultado == true){
                formGeneracion.reset();
                   e.target.generacion1.style.border = "1px solid #e9ecef";
                   e.target.generacion2.style.border = "1px solid #e9ecef";
                   e.target.nivelIdGeneracion.style.border = "1px solid #e9ecef";
                  swalMixin("top","success","Generación agregada correctamente")
                  location.href="formularios";
          }
    }
    })


}

if(formGeneracion){
    formGeneracion.addEventListener("submit", agregarGeneracion);
}



// AGREGAR LAS GRUPOS
const agregarGrupos = e => {

    e.preventDefault();
    let grupo = e.target.grupo.value;
    let nivel = e.target.nivelGrupo.value;
    let grado = e.target.gradoGrupo.value;



    if(grupo == "0" || nivel == "0" || grado == "0"){
        e.target.grupo.style.border = "1px solid red";
        e.target.nivelGrupo.style.border = "1px solid red";
        e.target.gradoGrupo.style.border = "1px solid red";
        swalMixin("top","error","Este campo está vacío")
        return;
    }

    let dato = new FormData();
    dato.append("grupo",grupo)
    dato.append("nivel",nivel)
    dato.append("grado",grado)

    $.ajax({
        url: 'Views/Ajax/formularios.ajax.php',
        method: 'POST',
        data : dato,
        dataType : 'json',
        cache: false,
        contentType: false,
        processData: false,
        success: function (resultado) {
            if(resultado == true){
                formGeneracion.reset();
                   e.target.grupo.style.border = "1px solid #e9ecef";
                   e.target.nivelGrupo.style.border = "1px solid #e9ecef";
                   e.target.gradoGrupo.style.border = "1px solid #e9ecef";
                  swalMixin("top","success","Grupo agregado correctamente")
                  location.href="formularios";
          }
    }
    })


}

if(formGrupos){
    formGrupos.addEventListener("submit", agregarGrupos);
}