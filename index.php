<?php

//APP
include_once 'App/crearMVCX.php';
include_once 'App/vistasMVCX.php';
include_once 'App/funciones.php';


// Controladores
include_once "Controllers/templateCtr.php";
include_once "Controllers/rutaCtr.php";
include_once "Controllers/loginCtr.php";
include_once "Controllers/alumnosCtr.php";
include_once "Controllers/formulariosCtr.php";
include_once "Controllers/profesoresCtr.php";
include_once "Controllers/horariosCtr.php";
include_once "Controllers/materiasCtr.php";
include_once "Controllers/nivelesCtr.php";
include_once "Controllers/subMenuCtr.php";
include_once "Controllers/calificacionesCtr.php";
include_once "Controllers/generacionesCtr.php";
include_once "Controllers/alumnosTotales.php";
include_once "Controllers/pagosCtr.php";
include_once "Controllers/dashboardCtr.php";

// Formatos
include_once "Controllers/formatosCtr.php";
include_once "Controllers/formatos/cedula.php";
include_once "Controllers/formatos/listas-asistencias.php";
include_once "Controllers/formatos/listas-evaluacion.php";
include_once "Controllers/formatos/horario.php";
include_once "Controllers/formatos/credencial.php";
include_once "Controllers/formatos/filtro-salud.php";
include_once "Controllers/formatos/horario-individual.php";
include_once "Controllers/formatos/evaluacion.php";
include_once "Controllers/formatos/listaVertical.php";
include_once "Controllers/formatos/personalizador.php";


// Modelos
include_once "Models/loginMdl.php";
include_once "Models/alumnosMdl.php";
include_once "Models/formulariosMdl.php";
include_once "Models/profesoresMdl.php";
include_once "Models/horariosMdl.php";
include_once "Models/materiasMdl.php";
include_once "Models/nivelesMdl.php";
include_once "Models/subMenuMdl.php";
include_once "Models/calificacionesMdl.php";
include_once "Models/generacionesMdl.php";
include_once "Models/dashboardMdl.php";
include_once "Models/pagosMdl.php";


$template = new Template();
$template->templateCtr();
