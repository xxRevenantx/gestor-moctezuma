
<?php
        
   class profesoresCtr{

        //Insertar Profesor
        static public function insertarProfesorCtr($datos){
                        $tabla = "profesores";
                        $respuesta = profesoresMdl::insertarProfesorMdl($tabla, $datos);
                        return $respuesta;   
        }

        //Consultar profesor
        static public function consultarProfesorCtr(){
                $tabla = "profesores";
                $respuesta = profesoresMdl::consultarProfesorMdl($tabla);
                return $respuesta;
        }

        //Consultar profesor por id
        static public function consultarProfesorIdCtr($id){
                $tabla = "profesores";
                $respuesta = profesoresMdl::consultarProfesorIdMdl($tabla, $id);
                return $respuesta;
        }
        //Consultar profesor por nivel
        static public function consultarProfesorNivelCtr($nivel){
                $tabla = "profesores";
                $respuesta = profesoresMdl::consultarProfesorNivelMdl($tabla, $nivel);
                return $respuesta;
        }
        
        //Editar profesor
        static public function editarProfesorCtr($dato){
                $tabla = "profesores";
                $respuesta = profesoresMdl::editarProfesorMdl($tabla, $dato);
                return $respuesta;
        }
            
        //Actualizar profesor
        static public function actualizarProfesorCtr($datos){
                $tabla = "profesores";
                $respuesta = profesoresMdl::actualizarProfesorMdl($tabla, $datos);
                return $respuesta;
        }

        // Eliminar profesor
         static public function eliminarProfesorCtr($id){
                $tabla = "profesores";
                $respuesta = profesoresMdl::eliminarProfesorMdl($tabla, $id);
                return $respuesta;
        }


        
            
}

    