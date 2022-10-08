<?php

 class pagosCtr{
            
        //insertar pago de inscripción
        static public function insertarPagoInscripcionCtr($datos){
                $tabla = "pago_inscripciones";
                $respuesta = pagosMdl::insertarPagoInscripcionMdl($tabla, $datos);
                return $respuesta;
        }
        
        // seleccionar el pago de inscripción
        static public function seleccionarPagoInscripcionCtr($id){
                $tabla = "pago_inscripciones";
                $respuesta = pagosMdl::seleccionarPagoInscripcionMdl($tabla, $id);
                return $respuesta;
        }
        // editar  pago de inscripción
        static public function editarPagoInscripcionCtr($id){
                $tabla = "pago_inscripciones";
                $respuesta = pagosMdl::editarPagoInscripcionMdl($tabla, $id);
                return $respuesta;
        }
       
        // actualizar  pago de inscripción
        static public function actualizarPagoInscripcionCtr($datos){
                $tabla = "pago_inscripciones";
                $respuesta = pagosMdl::actualizarPagoInscripcionMdl($tabla, $datos);
                return $respuesta;
        }

}


    