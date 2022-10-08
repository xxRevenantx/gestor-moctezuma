// EXPORTAMOSLAS FUNCIONES
import {swalMixin, urlPrincipal} from '../modulos/modules.js'; // IMPORTAMOS LA FUNCIÓN SWALMIXIN PARA SER UTILIZADA

//Ajax login
let form = document.querySelector("#login");

let login  = (e) => {
    e.preventDefault();
    let usuario = e.target.matricula.value;
    let password = e.target.password.value;


    if (usuario == "" || password == "") {
           swalMixin("top","error","Existen campos vacíos");
            return;
    } 

     let dato = new FormData();
     dato.append("usuario",usuario)
     dato.append("password",password)
    
    $.ajax({ 
    url: urlPrincipal()+"Views/Ajax/login.ajax.php",
    method: "POST",
    data: dato,
    dataType: "json",
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
        console.log(data);
        if(data.response == "baja"){
            swalMixin("top","error","Para poder accerder al sitio, favor de ponerse al corriente con las colegiaturas.")
            return;
        }

        if(data.response == "true"){
            
            if(data.usuario == "Admin"){
                let button =  e.target[2];
                button.setAttribute("disabled","");
                e.target.matricula.setAttribute("disabled","");
                e.target.password.setAttribute("disabled","");     
                swalMixin("top","success","Accediendo a tu cpanel.");   
                setTimeout(() => window.location.href = "dashboard" ,1000)
            }else{
                let button =  e.target[2];
                button.setAttribute("disabled","");
                e.target.matricula.setAttribute("disabled","");
                e.target.password.setAttribute("disabled","");     
                swalMixin("top","success","Accediendo a tu panel.");   
                setTimeout(() => window.location.href = "dashboard" ,1000)
            }
       
        }else{
            swalMixin("top","error","Campos incorrectos");   
        }
        
       
    }
    });
    
}
// Esta condicional evalúa si el id del form existe, para que no surja el error
/*
Uncaught TypeError: Cannot read properties of null (reading 'addEventListener')
*/
if(form){
form.addEventListener("submit",login);
}