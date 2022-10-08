<?php

class nivelesCtr{

        // Consultar niveles para menú
    static public function consultarNivelesCtr($ruta){
        $tabla = "niveles";
        $respuesta = nivelesMdl::consultarNivelesMdl($tabla, $ruta);
        return $respuesta;
    }

        // Consultar niveles por Id
    static public function consultarNivelesIdCtr($id){
        $tabla = "niveles";
        $respuesta = nivelesMdl::consultarNivelesIdMdl($tabla, $id);
        return $respuesta;
    }

        // Consultar grados
    static public function consultarGradosCtr($tabla, $get){
        $respuesta = nivelesMdl::consultarGradosMdl($tabla, $get);
        return $respuesta;
    }
        // Consultar grupos
    static public function consultarGruposCtr($tabla, $nivel, $grado){
        $respuesta = nivelesMdl::consultarGruposMdl($tabla, $nivel, $grado);
        return $respuesta;
    }

    // Consultar grupos url
    static public function consultarGruposUrlCtr($tabla, $nivel, $grado,$get){
        $respuesta = nivelesMdl::consultarGruposUrlMdl($tabla, $nivel, $grado,$get);
        return $respuesta;
    }
    // Consultar los semestres
    static public function seleccionarSemestresCtr($tabla, $nivel, $grado){
        $respuesta = nivelesMdl::seleccionarSemestresMdl($tabla, $nivel, $grado);
        return $respuesta;
    }
   
    // Consultar los semestres para la url 
    static public function seleccionarSemestresUrlCtr($tabla, $semestre){
        $respuesta = nivelesMdl::seleccionarSemestresUrlMdl($tabla,$semestre);
        return $respuesta;
    }
    // Consultar los periodos
    static public function consultarPeriodosCtr($tabla){
        $respuesta = nivelesMdl::consultarPeriodosMdl($tabla);
        return $respuesta;
    }

}
?>