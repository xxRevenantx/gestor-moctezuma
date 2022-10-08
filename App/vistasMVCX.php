<?php

//Creamos las vistas para el MVCX - Modelo - Vista-Controlador - Ajax

class Mvcx{

        //Función para crear el modelo
    static public function modelMcvx($nombre){
        return '
            <?php
            include_once "conexion.php";
            class '.$nombre.'Mdl{
                
            }

        ';

    }

    // Función para crear el controllador
    static public function controllerMvcx($nombre){
        return '
        <?php
        class '.$nombre.'Ctr{
            
        }

    ';
    }
    //Función para crear las vistas
    static public function viewMcvx($nombre){
        return '<div class="page-content">'.$nombre.'</div>';
    }
    
    //Función para crear el ajax
    static public function ajaxMcvx($nombre){
        return '
        <?php
        require_once "../../Models/.php";
        require_once "../../Controllers/.php";
        

        
        /* CLASE  */
        
        class Ajax{
            
           // MÉTODOS
        
        }

          
         if(isset()){
            $c = new Ajax();
         }
        
          

    ';
    }
    //Función para crear el ajax del Js
    static public function ajaxJsMcvx($nombre){
        return '//Ajax '.$nombre.'';
    }
}