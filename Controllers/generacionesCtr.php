<?php


class generacionesCtr{

        //Función para formularios
        static public function consultarGeneracionesCtr($url){
                $tabla = "generacion";
                $respuesta = generacionesMdl::consultarGeneracionesMdl($tabla, $url);
                return $respuesta;
        }

        //Función para las generaciones
        static public function consultarGeneracionesNivelesCtr($url){
                $tabla = "generacion";
                $respuesta = generacionesMdl::consultarGeneracionesNivelesMdl($tabla, $url);
                return $respuesta;
        }
            
}

    