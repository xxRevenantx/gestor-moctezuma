<?php

class crearMcvx{
    static public function crearMvcxCtr()
    {
        if(isset($_POST["crearMVCX"])){
                $nombre=$_POST['crearMVCX'];
                $model=fopen("Models/".$nombre.'Mdl.php','w');//abrir archivo, nombre archivo, modo apertura
                $controller=fopen("Controllers/".$nombre.'Ctr.php','w');//abrir archivo, nombre archivo, modo apertura
                $vista=fopen("Views/modules/".$nombre.'.php','w');//abrir archivo, nombre archivo, modo apertura
                $ajax=fopen("Views/Ajax/".$nombre.'.ajax.php','w');//abrir archivo, nombre archivo, modo apertura
                $ajaxJs=fopen("Views/js/ajax/".$nombre.'.js','w');//abrir archivo, nombre archivo, modo apertura
               
                // Incluimos el contenido
               
                fwrite($model, Mvcx::modelMcvx($nombre)); 
                fwrite($controller, Mvcx::controllerMvcx($nombre));
                fwrite($vista, Mvcx::viewMcvx($nombre));
                fwrite($ajax, Mvcx::ajaxMcvx($nombre));
                fwrite($ajaxJs, Mvcx::ajaxJsMcvx($nombre));

                Funciones::swal("success","Ok","MVCX creado exitosamente","crear");
        }

    }
}