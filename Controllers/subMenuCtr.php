<?php

class subMenuCtr{

    static public function consultarSubmenuCtr($tabla, $get){
        $respuesta = subMenuMdl::consultarSubmenuMdl($tabla, $get);
        return $respuesta;
    }
}