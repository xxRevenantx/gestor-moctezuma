
<?php
include_once "conexion.php";



class formulariosMdl{

        // AGREGAR LOCALIDADES

        static public function agregarLocalidadesMdl($tabla, $datos){
        $PDO = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");
        $PDO->bindParam(":nombre",$datos,PDO::PARAM_STR);
        
        if($PDO->execute()){
            return true;
        }else{
            return false;
        }
    }

        // CONSULTAR LOCALIDADES
        static public function consultarLocalidadesMdl($tabla){
            $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $PDO->execute();
        return $PDO->fetchAll();
        }

        // AGREGAR ESTADOS

        static public function agregarEstadosMdl($tabla, $datos){
        $PDO = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");
        $PDO->bindParam(":nombre",$datos,PDO::PARAM_STR);

        if($PDO->execute()){
            return true;
        }else{
            return false;
        }
    }

        // CONSULTAR LOCALIDADES
        static public function consultarEstadosMdl($tabla){
            $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $PDO->execute();
        return $PDO->fetchAll();
        }

        // AGREGAR MUNICIPIOS

        static public function agregarMunicipiosMdl($tabla, $datos){
        $PDO = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");
        $PDO->bindParam(":nombre",$datos,PDO::PARAM_STR);

        if($PDO->execute()){
            return true;
        }else{
            return false;
        }
    }

        // CONSULTAR MUNICIPIOS
        static public function consultarMunicipiosMdl($tabla){
            $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $PDO->execute();
        return $PDO->fetchAll();
        }


          // AGREGAR GENERACIONES

          static public function agregarGeneracionesMdl($tabla, $datos){
            $PDO = Conexion::conectar()->prepare("INSERT INTO $tabla (id_nivel, generacion) VALUES (:id_nivel, :generacion)");
            $PDO->bindParam(":id_nivel",$datos["nivel"],PDO::PARAM_INT);
            $PDO->bindParam(":generacion",$datos["generacion"],PDO::PARAM_STR);
          
    
            if($PDO->execute()){
                return true;
            }else{
                return false;
            }
        }

        // CONSULTAR GENERACIONES
        static public function consultarGeneracionesMdl($tabla){
            $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
            $PDO->execute();
        return $PDO->fetchAll();
        }


          // AGREGAR GENERACIONES

          static public function agregarGruposMdl($tabla, $datos){
            $PDO = Conexion::conectar()->prepare("INSERT INTO $tabla (id_nivel, id_grado, grupo) VALUES (:id_nivel, :id_grado, :grupo)");
            $PDO->bindParam(":id_nivel",$datos["nivel"],PDO::PARAM_INT);
            $PDO->bindParam(":id_grado",$datos["grado"],PDO::PARAM_INT);
            $PDO->bindParam(":grupo",$datos["grupo"],PDO::PARAM_STR);
          
    
            if($PDO->execute()){
                return true;
            }else{
                return false;
            }
        }
           // CONSULTAR GRUPOS
           static public function consultarGruposMdl($tabla){
            $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $PDO->execute();
        return $PDO->fetchAll();
        }
}

        
