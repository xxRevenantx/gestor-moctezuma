<?php
class materiasCtr{

        //insertar  materias 
        static public function agregarMateriaCtr($datos){
          if($datos["nivel"] == 1 || $datos["nivel"] == 2 || $datos["nivel"] == 3){
              $tabla = "materias_preescolar_primaria_secundaria";
            }else if($datos["nivel"] == 4){
              $tabla = "materias_bachillerato";
            }

          $respuesta = materiasMdl::agregarMateriaMdl($tabla, $datos);
          return $respuesta;
        }
        //Consultar las materias 
        static public function consultarMateriasCtr($nivel, $grado){
            $ruta = explode("/",$_GET["url"]);

            if($ruta[1] == 1 || $ruta[1] == 2 || $ruta[1] == 3){
                $tabla = "materias_preescolar_primaria_secundaria";
              }else if($ruta[1] == 4){
                $tabla = "materias_bachillerato";
              }

            $respuesta = materiasMdl::consultarMateriasMdl($tabla, $nivel, $grado);
            return $respuesta;
        }
        //Consultar las materias para calificaciones
        static public function consultarMateriasCalificacionesCtr($nivel, $grado){
            $ruta = explode("/",$_GET["url"]);

            if($ruta[1] == 1 || $ruta[1] == 2 || $ruta[1] == 3){
                $tabla = "materias_preescolar_primaria_secundaria_calificaciones";
              }else if($ruta[1] == 4){
                $tabla = "materias_bachillerato";
              }

            $respuesta = materiasMdl::consultarMateriasCalificacionesMdl($tabla, $nivel, $grado);
            return $respuesta;
        }


                //Eliminar  materias
          static public function eliminarMateriaCtr($id){
                $tabla = "materias_preescolar_primaria_secundaria";
                $respuesta = materiasMdl::eliminarMateriaMdl($tabla, $id);
                return $respuesta;
          }

          // Consultar materia por Id
  
          static public function consultarMateriaIdCtr($id){
            $tabla = "materias_preescolar_primaria_secundaria";
            $respuesta = materiasMdl::consultarMateriaIdMdl($tabla, $id);
            return $respuesta;
          }


          // Actualizar materias
          static public function actualizarMateriaCtr($datos){
            $tabla = "materias_preescolar_primaria_secundaria";
            $respuesta = materiasMdl::actualizarMateriaMdl($tabla, $datos);
            return $respuesta;
          }
        
          // Actualizar orden de  materias
          static public function actualizarOrdenMateriaCtr($orden){
            $tabla = "materias_preescolar_primaria_secundaria";
            $respuesta = materiasMdl::actualizarOrdenMateriaMdl($tabla, $orden);
            return $respuesta;
          }
         
        // static public function consultarMateriasBachilleratoCtr(){
        //     $tabla = "materias_bachillerato";
        //     $respuesta = materiasMdl::consultarMateriasBachilleratoMdl($tabla);
        //     return $respuesta;
        // }

        // Consultar las materias por Id en la template
        static public function consultarMateriaIdTemplateMateriaCtr($tabla, $id){
          $respuesta = materiasMdl::consultarMateriaIdTemplateMateriaMdl($tabla, $id);
          return $respuesta;
        }
 }

    