<?php

class dashboardCtr{

    static public function consultarDashboardCtr(){
        $tabla = "estadistica";
        $respuesta = dashboardMdl::consultarDashboardMdl($tabla);
        return $respuesta;
    }

    // Consultar el pago de inscripciones
    static public function consultarPagoInscripcionesCtr(){
        $tabla = "pago_inscripciones";
        $respuesta = dashboardMdl::consultarPagoInscripcionesMdl($tabla);
        return $respuesta;
    }
    // Consultar el pago de inscripciones
    static public function consultarPagoColegiaturasCtr(){
        $tabla = "pagos_colegiaturas";
        $respuesta = dashboardMdl::consultarPagoColegiaturasMdl($tabla);
        return $respuesta;
    }
    // Consultar recibos
    static public function consultarRecibosCtr(){
        $tabla = "recibos";
        $respuesta = dashboardMdl::consultarRecibosMdl($tabla);
        return $respuesta;
    }
}