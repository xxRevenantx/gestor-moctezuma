<?php
require_once "conexion.php";

class dashboardMdl{
    static public function consultarDashboardMdl($tabla){
        $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $PDO->execute();
        return $PDO->fetchAll();
    }
   
   // Consultar pago de inscripciones
    static public function consultarPagoInscripcionesMdl($tabla){
        $PDO = Conexion::conectar()->prepare("SELECT SUM(Pago_inscripcion) as inscripcion FROM $tabla");
        $PDO->execute();
        return $PDO->fetch();
    }
   // Consultar pago de colegiaturas
    static public function consultarPagoColegiaturasMdl($tabla){
        $PDO = Conexion::conectar()->prepare("SELECT SUM(Pago_colegiatura) as colegiatura FROM $tabla");
        $PDO->execute();
        return $PDO->fetch();
    }
   // Consultar recibos
    static public function consultarRecibosMdl($tabla){
        $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $PDO->execute();
        return $PDO->fetchAll();
    }
}