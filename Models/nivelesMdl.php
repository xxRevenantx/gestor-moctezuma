<?php
include_once "conexion.php";

class nivelesMdl{

        // Consultar niveles para menú
        static public function consultarNivelesMdl($tabla, $ruta){

            if($ruta == null){
                $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                $PDO->execute();
                return $PDO->fetchAll();
            }else{
                $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta = :ruta");
                $PDO->bindParam(":ruta", $ruta,PDO::PARAM_STR);
                $PDO->execute();
                return $PDO->fetchAll();
            }


        }
        // Consultar niveles por id
        static public function consultarNivelesIdMdl($tabla, $id){

                if($id != null){
                    $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Id = :id");
                    $PDO->bindParam(":id", $id, PDO::PARAM_INT);
                    $PDO->execute();
                    return $PDO->fetch();
                }else{
                    $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                    $PDO->execute();
                    return $PDO->fetchAll();
                }
               


        }
        // Consultar grados
        static public function consultarGradosMdl($tabla, $get){

               
                if($tabla != null){
                //Consulta por nivel
                    $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Id_nivel = :id_nivel");
                    $PDO->bindParam(":id_nivel", $get, PDO::PARAM_INT);
                    $PDO->execute();
                    return $PDO->fetchAll();
                }else{
                    // Consulta por grado
                    $PDO = Conexion::conectar()->prepare("SELECT * FROM grados WHERE grado = :grado");
                    $PDO->bindParam(":grado", $get, PDO::PARAM_INT);
                    $PDO->execute();
                    return $PDO->fetchAll();
                }



        }
        // Consultar grupos
        static public function consultarGruposMdl($tabla, $nivel, $grado){

                    $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_nivel = :nivel AND id_grado = :grado");
                    $PDO->bindParam(":nivel", $nivel, PDO::PARAM_INT);
                    $PDO->bindParam(":grado", $grado, PDO::PARAM_INT);
                    $PDO->execute();
                    return $PDO->fetchAll();
            
        }
        // Consultar grupos URL
        static public function consultarGruposUrlMdl($tabla, $nivel, $grado,$get){

                    $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_nivel = :nivel AND id_grado = :grado AND grupo = :grupo");
                    $PDO->bindParam(":nivel", $nivel, PDO::PARAM_INT);
                    $PDO->bindParam(":grado", $grado, PDO::PARAM_INT);
                    $PDO->bindParam(":grupo", $get, PDO::PARAM_STR);
                    $PDO->execute();
                    return $PDO->fetchAll();
            
        }
        // Consultar semestres
        static public function seleccionarSemestresMdl($tabla, $nivel, $grado){
                    $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Id_nivel = :nivel AND Id_grado = :grado");
                    $PDO->bindParam(":nivel", $nivel, PDO::PARAM_INT);
                    $PDO->bindParam(":grado", $grado, PDO::PARAM_INT);
                    $PDO->execute();
                    return $PDO->fetchAll();
            
        }
        // Consultar semestres para la url
        static public function seleccionarSemestresUrlMdl($tabla,$semestre){
                    $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE no_semestre = :no_semestre");
                    $PDO->bindParam(":no_semestre", $semestre, PDO::PARAM_INT);
                    $PDO->execute();
                    return $PDO->fetchAll();
            
        }
        // Consultar los periodos
        static public function consultarPeriodosMdl($tabla){
                    $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                    $PDO->execute();
                    return $PDO->fetchAll();
            
        }

    }