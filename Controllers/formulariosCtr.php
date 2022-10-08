<?php
        
        
class formulariosCtr{

        
        // AGREGAR LOCALIDADES
        static public function agregarLocalidadesCtr($datos){
                $tabla = "localidades";
                $respuesta = formulariosMdl::agregarLocalidadesMdl($tabla, $datos);
                return $respuesta;
        }
        // CONSULTAR LOCALIDADES
        static public function consultarLocalidadesCtr(){
                $tabla = "localidades";
                $respuesta = formulariosMdl::consultarLocalidadesMdl($tabla);
                return $respuesta;
        }
        // AGREGAR ESTADOS
        static public function agregarEstadosCtr($datos){
                $tabla = "estados";
                $respuesta = formulariosMdl::agregarEstadosMdl($tabla, $datos);
                return $respuesta;
        }
                // CONSULTAR ESTADOS
        static public function consultarEstadosCtr(){
                $tabla = "estados";
                $respuesta = formulariosMdl::consultarEstadosMdl($tabla);
                return $respuesta;
        }


        // AGREGAR MUNICIPIOS
        static public function agregarMunicipiosCtr($datos){
                $tabla = "municipios";
                $respuesta = formulariosMdl::agregarMunicipiosMdl($tabla, $datos);
                return $respuesta;
        }

        // CONSULTAR MUNICIPIOS
        static public function consultarMunicipiosCtr(){
                $tabla = "Municipios";
                $respuesta = formulariosMdl::consultarMunicipiosMdl($tabla);
                return $respuesta;
        }

        // AGREGAR GENERACIONES
        static public function agregarGeneracionesCtr($datos){
                $tabla = "generacion";
                $respuesta = formulariosMdl::agregarGeneracionesMdl($tabla, $datos);
                return $respuesta;
        }
        // CONSULTAR GENERACIONES
        static public function consultarGeneracionesCtr(){
                $tabla = "generacion";
                $respuesta = formulariosMdl::consultarGeneracionesMdl($tabla);
                return $respuesta;
        }

         // AGREGAR GRUPOS
         static public function agregarGruposCtr($datos){
                $tabla = "grupos";
                $respuesta = formulariosMdl::agregarGruposMdl($tabla, $datos);
                return $respuesta;
        }
         // CONSULTAR  GRUPOS
         static public function consultarGruposCtr(){
                $tabla = "grupos";
                $respuesta = formulariosMdl::consultarGruposMdl($tabla);
                return $respuesta;
        }


}

    