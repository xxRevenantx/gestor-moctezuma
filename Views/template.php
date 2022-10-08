<?php
// Iniciamos sesión en la plantilla
 session_start();
//Cambiar ya que esté en producción
//"http://localhost/mi-framework/";
$rutaLocal = Ruta::rutaCtr();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <link rel="shortcut icon" href="<?php echo $rutaLocal?>Views/images/logo-moctezuma.jpg" type="image/png">


    <link rel="stylesheet" href="<?php echo $rutaLocal ?>Views/vendors/core/core.css">


    <!-- TABLA -->
    <link rel="stylesheet" href="<?php echo $rutaLocal ?>Views/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
      <!-- Core CSS -->
          <!-- Layout styles -->  
    <link rel="stylesheet" href="<?php echo $rutaLocal ?>Views/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="<?php echo $rutaLocal ?>Views/vendors/dropify/dist/dropify.min.css">
	<link rel="stylesheet" href="<?php echo $rutaLocal ?>Views/css/style.css">

      <!-- icons -->
      <link rel="stylesheet" href="<?php echo $rutaLocal?>Views/fonts/iconfont.css" />

    <!-- MIS ESTILOS-->
     <link rel="stylesheet" href="<?php echo $rutaLocal ?>Views/css/my-styles.css" />

      <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />


      <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"> -->

    <script src="<?php echo $rutaLocal ?>Views/js/plugins/jquery/jquery.min.js"></script>
	<script src="<?php echo $rutaLocal ?>Views/js/libs/feather-icons/feather.min.js"></script>


    

    <!-- sweet alert -->
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="<?php echo $rutaLocal ?>Views/js/libs/swal-alert2.js"></script>
     <!-- Helpers -->
     <script src="<?php echo $rutaLocal?>Views/js/helpers.js"></script>

    <title>Gestor - Moctezuma</title>
</head>
<body class="sidebar-folded">
    



<?php




if(isset($_SESSION['validar']) && $_SESSION['validar'] == true){


    echo ' 
    <div class="main-wrapper">';
    include 'modules/menu.php';
    echo '<div class="page-wrapper">
         ';
    include 'modules/cabecera.php';
    $url = array();
    $ruta1 = null;
    $ruta2 = null;
    $ruta3 = null;
    $ruta4 = null;
    $ruta5 = null;
    $ruta6 = null;
    $ruta7 = null;
    if(isset($_GET["url"])){
     $url = explode("/", $_GET["url"]);
    

      $ruta = $url[0];
      $niveles = nivelesCtr::consultarNivelesCtr($ruta); 
     foreach ($niveles as $key => $value) {
        if ($url[0] == $value["ruta"]) {
          $ruta1 = $url[0];
        }
    }

    // if(isset($url[3])){
    //       $ruta2 = "grupos";
    // }



    if(isset($url[2])){
     $generaciones = generacionesCtr::consultarGeneracionesCtr($url[2]);
     foreach ($generaciones as $key => $value) {
        if ($url[2] == $value["generacion"]) {
          $ruta2 = $url[2];
        }

    }
}
    
    if(isset($url[5])){
     $tabla = "grupos";
     $get = $url[5];
     $nivel = $url[1];
     $grado = $url[3];
     $grupos = nivelesCtr::consultarGruposUrlCtr($tabla, $nivel ,$grado, $get);

   
     foreach ($grupos as $key => $value) {
        if ($url[5] == $value["grupo"]) {
            $ruta4 = $url[4];
        }
    }
    }


    // PARA LOS DEMÁS NIVELES
    if(isset($url[6])){
    
     $tabla = "acciones"; 
     $get = $url[6];
     $acciones = subMenuCtr::consultarSubmenuCtr($tabla,$get);
     foreach ($acciones as $key => $value) {
        if ($url[6] == $value["url"]) {
            $ruta5 = $url[6];
        }
    }
    }
    



    // Ruta para los semestres de bachillerato
    if(isset($url[7])){

        if($url[1] != 4){
            $tabla ="periodos";
            $periodos = $url[7];
            $periodoss = nivelesCtr::consultarPeriodosCtr($tabla);
            foreach ($periodoss as $key => $value) {
                if ($url[7] == $value["Id"]) {
                    $ruta6 = $url[7];
                  }
            }


        }else{

            $tabla ="semestres_bachillerato";
            $semestre = $url[7];
            $semestres = nivelesCtr::seleccionarSemestresUrlCtr($tabla, $semestre);
            foreach ($semestres as $key => $value) {
                if ($url[7] == $value["no_semestre"]) {
                    $ruta6 = $url[7];
                  }
            }
        }



    }

        // PARA LOS SEMESTRES DE BACHILLERATO
        // if(isset($url[8])){
    
        //     $tabla = "acciones"; 
        //     $get = $url[8];
        //     $acciones = subMenuCtr::consultarSubmenuCtr($tabla,$get);
        //     foreach ($acciones as $key => $value) {
        //        if ($url[8] == $value["url"]) {
        //            $ruta7 = $url[8];
        //        }

        //    }
        //    }

           // PARA EDITAR LAS CALIFICACIONES MEDIANTE EL ID
           if(isset($url[8])){
    

            $tabla = "calificaciones_periodos"; 
            $materia = $url[8];
            $materias = materiasCtr::consultarMateriaIdTemplateMateriaCtr($tabla,$materia);
            foreach ($materias as $key => $value) {
               if ($url[8] == $value["id_materia"]) {
                   $ruta7 = $url[8];
               }
           }


           
        }

    
           

     if($_SESSION['rol'] == "Admin"){

        // if($ruta5 != null){
        //     include 'modules/formularios/materia-calificacion.php';
        // }
        // else if($ruta4 != null){
        //     if($ruta3 == "horarios"){
        //         include 'modules/formularios/horario.php';
        //       }else if($ruta3 == "calificaciones"){
        //         include 'modules/formularios/calificacion.php';
        //       }
        // }
    
  
        // Acciones para bachillerato
        if($ruta7 != null){
               
            include 'modules/formularios/editar-calificacion.php';
        }

        // Aciones que van de la url "semestres"
        else if($ruta6 != null){ 

            if($url[1] != 4){
                include 'modules/formularios/calificacion.php';
            }else{
                include 'modules/acciones.php';
            }
        
        }


        // Acciones de los demás niveles
        else if($ruta5 != null){   
          include 'modules/acciones/'.$url[6].'.php';
        }


        else if($ruta4 != null){
            if(isset($url[6])){
                if( $url[6] == "semestres"){
                    include 'modules/acciones/semestres.php';
                }
            }else{
                include 'modules/acciones.php';
            }
            
        }
        else if($ruta2 != null ){
            include 'modules/grupos.php';
        }else  if($ruta1 != null){
            include 'modules/generacion_grado.php';
        }          


         else if($url[0] == "crear"){
           include 'modules/mvcx/'.$url[0].'.php';
        }else if($url[0] == "inicio" || $url[0] == "logout" || $url[0] == "dashboard" || $url[0] == "listas-asistencias" || $url[0] == "alumnos"
        || $url[0] == "calificaciones" || $url[0] == "calificacion" || $url[0] == "niveles" || $url[0] == "horarios-individuales" ){
            include 'modules/'.$url[0].'.php';
        }
            //FORMULARIOS
        else if($url[0] == "formularios" || $url[0] == "horarios" || $url[0] == "horario"  || $url[0] == "profesores" || $url[0] == "personalizadores" ){
            include 'modules/formularios/'.$url[0].'.php';

        }else{
            include 'modules/dashboard.php';
         }

         }else if($_SESSION['rol'] == "ESTUDIANTE"){
                if($url[0] == "inicio" || $url[0] == "logout" ||  $url[0] == "dashboard"){
                    include 'modules/'.$url[0].'.php';
                }
                else if($url[0] == "mis-datos"){
                    include 'modules/alumnos/'.$url[0].'.php';

                }else{
                    include 'modules/dashboard.php';
                }

        
         }

    }else{
        include 'modules/dashboard.php';
    }

    echo '

    <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
				<p class="text-muted mb-1 mb-md-0">Copyright © '.date("Y").' <a href="https://centrouniversitariomoctezuma.com" target="_blank">Centro Universitario Moctezuma</a>.</p>
			
			</footer>

    </div>
    ';
    
    
}else{
        include "modules/login.php";
    }

include 'modules/footer.php';
?>


<script>

$('.datepicker').datepicker({
    dateFormat: 'dd/mm/yyyy',
});
</script>

<script>
$(document).ready(function() {
    $(".formularios").DataTable({
    "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "No se encuentran registros",
            // "info": "Página _PAGE_ de _PAGES_",
            "info":" _TOTAL_ registros totales",
            "infoEmpty": "No hay registros",
            "search":         "Buscar:",
            "infoFiltered": "(filtrado de un total de _MAX_ registros )",
         "oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
        },
        
    dom: "Bfrtip",
    buttons: [
        {
            extend: "excel",                // Extend the excel button
            text: "Excel",
            title: "Excel",
            className: 'btn btn-success',
            // EXPORTAR UN NUMERO DE COLUMNAS
            exportOptions: {
                columns: [ 0, 2,3,4,5,6,7,8,9]
                },
                autoFilter: true,
                sheetName: 'Filtrado',
            pageStyle: {
                sheetPr: {
                    pageSetUpPr: {
                        fitToPage: 1            // Fit the printing to the page
                    }
                },
                printOptions: {
                    horizontalCentered: true,
                    verticalCentered: true,
                },
                pageSetup: {
                    orientation: "landscape",   // Orientation
                    paperSize: "9",             // Paper size (1 = Letter, 9 = A4)
                    fitToWidth: "1",            // Fit to page width
                    fitToHeight: "0",           // Fit to page height
                },
                pageMargins: {
                    left: "0.2",
                    right: "0.2",
                    top: "0.4",
                    bottom: "0.4",
                    header: "0",
                    footer: "0",
                },
                repeatHeading: true,    // Repeat the heading row at the top of each page
                repeatCol: 'A:A',       // Repeat column A (for pages wider than a single printed page)
            },

        },

        // {
        //    extend:"print",
        //    text:"Imprimir",
        //    title:"Alumnos",
        //     className: 'btn btn-info',
        //     // IMPRIMIR UN NUMERO DE COLUMNAS
        //     exportOptions: {
        //         columns: [ 0, 2,3,4,5,6,7,8,9]
        //         }
        // },
        {
            extend: 'pdfHtml5',
            download: 'open',
           text:"PDF",
           title:"Registros",
            className: 'btn btn-primary',
            // EXPORTAR UN NUMERO DE COLUMNAS
            exportOptions: {
                columns: [ 0,1]
                }
        },
       
    ],
});

$("#table1").DataTable({
    "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "No se encuentran alumnos",
            // "info": "Página _PAGE_ de _PAGES_",
            "info":" _TOTAL_ alumnos totales",
            "infoEmpty": "No hay alumnos",
            "search":         "Buscar:",
            "infoFiltered": "(filtrado de un total de _MAX_ alumnos )",
         "oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
        },
        
    dom: "Bfrtip",
    buttons: [
        {
            extend: "excel",                // Extend the excel button
            text: "Excel",
            title: "Excel",
            className: 'btn btn-success',
            // EXPORTAR UN NUMERO DE COLUMNAS
            exportOptions: {
                columns: [ 0, 2,3,4,5,6,7,8,9,10,11,12,13]
                },
                autoFilter: true,
                sheetName: 'Filtrado',
            pageStyle: {
                sheetPr: {
                    pageSetUpPr: {
                        fitToPage: 1            // Fit the printing to the page
                    }
                },
                printOptions: {
                    horizontalCentered: true,
                    verticalCentered: true,
                },
                pageSetup: {
                    orientation: "landscape",   // Orientation
                    paperSize: "9",             // Paper size (1 = Letter, 9 = A4)
                    fitToWidth: "1",            // Fit to page width
                    fitToHeight: "0",           // Fit to page height
                },
                pageMargins: {
                    left: "0.2",
                    right: "0.2",
                    top: "0.4",
                    bottom: "0.4",
                    header: "0",
                    footer: "0",
                },
                repeatHeading: true,    // Repeat the heading row at the top of each page
                repeatCol: 'A:A',       // Repeat column A (for pages wider than a single printed page)
            },

        },

        // {
        //    extend:"print",
        //    text:"Imprimir",
        //    title:"Alumnos",
        //     className: 'btn btn-info',
        //     // IMPRIMIR UN NUMERO DE COLUMNAS
        //     exportOptions: {
        //         columns: [ 0, 2,3,4,5,6,7,8,9]
        //         }
        // },
        {
            extend: 'pdfHtml5',
            //orientation: 'landscape',
            pageSize: 'letter',
            download: 'open',
           text:"PDF",
           title:"",
            className: 'btn btn-primary',
            // EXPORTAR UN NUMERO DE COLUMNAS
            exportOptions: {
                columns: [ 0,3,4,5,6,7,8]
                }
        },
       
    ],
});


$("#profesores").DataTable({
    "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "No se encuentran profesores",
            // "info": "Página _PAGE_ de _PAGES_",
            "info":" _TOTAL_ profesores totales",
            "infoEmpty": "No hay profesores",
            "search":         "Buscar:",
            "infoFiltered": "(filtrado de un total de _MAX_ profesores )",
         "oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
        },
        
    dom: "Bfrtip",
    buttons: [
        {
            extend: "excel",                // Extend the excel button
            text: "Excel",
            title: "Excel",
            className: 'btn btn-success',
            // EXPORTAR UN NUMERO DE COLUMNAS
            exportOptions: {
                columns: [ 0,1,2,3,4,5,6]
                },
                autoFilter: true,
                sheetName: 'Filtrado',
            pageStyle: {
                sheetPr: {
                    pageSetUpPr: {
                        fitToPage: 1            // Fit the printing to the page
                    }
                },
                printOptions: {
                    horizontalCentered: true,
                    verticalCentered: true,
                },
                pageSetup: {
                    orientation: "landscape",   // Orientation
                    paperSize: "9",             // Paper size (1 = Letter, 9 = A4)
                    fitToWidth: "1",            // Fit to page width
                    fitToHeight: "0",           // Fit to page height
                },
                pageMargins: {
                    left: "0.2",
                    right: "0.2",
                    top: "0.4",
                    bottom: "0.4",
                    header: "0",
                    footer: "0",
                },
                repeatHeading: true,    // Repeat the heading row at the top of each page
                repeatCol: 'A:A',       // Repeat column A (for pages wider than a single printed page)
            },

        },

        // {
        //    extend:"print",
        //    text:"Imprimir",
        //    title:"Alumnos",
        //     className: 'btn btn-info',
        //     // IMPRIMIR UN NUMERO DE COLUMNAS
        //     exportOptions: {
        //         columns: [ 0, 2,3,4,5,6,7,8,9]
        //         }
        // },
        {
            extend: 'pdfHtml5',
            pageSize: 'legal',
            download: 'open',
            orientation: "landscape",
           text:"PDF",
           title:"Profesores",
            className: 'btn btn-primary',
            // EXPORTAR UN NUMERO DE COLUMNAS
            exportOptions: {
                columns: [ 1,2,3,4,5,6,7,8,9,10,11]
                }
        },
       
    ],
});

// $("#horarios").DataTable({
//     "language": {
//             "lengthMenu": "Mostrar _MENU_ registros por página",
//             "zeroRecords": "No se encuentran horarios",
//             // "info": "Página _PAGE_ de _PAGES_",
//             "info":" _TOTAL_ horarios totales",
//             "infoEmpty": "No hay horarios",
//             "search":         "Buscar:",
//             "infoFiltered": "(filtrado de un total de _MAX_ horarios )",
//          "oPaginate": {
// 				"sFirst":    "Primero",
// 				"sLast":     "Último",
// 				"sNext":     "Siguiente",
// 				"sPrevious": "Anterior"
// 			},
//         },
        
// });

$("#materias").DataTable({
    "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "No se encuentran materias",
            // "info": "Página _PAGE_ de _PAGES_",
            "info":" _TOTAL_ materias totales",
            "infoEmpty": "No hay materias",
            "search":         "Filtrar:",
            "infoFiltered": "(filtrado de un total de _MAX_ materias )",
         "oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
        },
        
    dom: "Bfrtip",
    buttons: [
        {
            extend: "excel",                // Extend the excel button
            text: "Excel",
            title: "Excel",
            className: 'btn btn-success',
                autoFilter: true,
                sheetName: 'Filtrado',
            pageStyle: {
                sheetPr: {
                    pageSetUpPr: {
                        fitToPage: 1            // Fit the printing to the page
                    }
                },
                printOptions: {
                    horizontalCentered: true,
                    verticalCentered: true,
                },
                pageSetup: {
                    orientation: "landscape",   // Orientation
                    paperSize: "9",             // Paper size (1 = Letter, 9 = A4)
                    fitToWidth: "1",            // Fit to page width
                    fitToHeight: "0",           // Fit to page height
                },
                pageMargins: {
                    left: "0.2",
                    right: "0.2",
                    top: "0.4",
                    bottom: "0.4",
                    header: "0",
                    footer: "0",
                },
                repeatHeading: true,    // Repeat the heading row at the top of each page
                repeatCol: 'A:A',       // Repeat column A (for pages wider than a single printed page)
            },

        },

        // {
        //    extend:"print",
        //    text:"Imprimir",
        //    title:"Alumnos",
        //     className: 'btn btn-info',
        //     // IMPRIMIR UN NUMERO DE COLUMNAS
        //     exportOptions: {
        //         columns: [ 0, 2,3,4,5,6,7,8,9]
        //         }
        // },
        {
           extend: 'pdfHtml5',
           download: 'open',
           text:"PDF",
           title:"Materias",
          className: 'btn btn-primary',
          exportOptions: {
            extension: ".pdf",
            filename: "Materias",
            }
        },

       
    ],
});


$("#calificaciones").DataTable({
    "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "No se encuentran materias",
            // "info": "Página _PAGE_ de _PAGES_",
            "info":" _TOTAL_ materias totales",
            "infoEmpty": "No hay materias",
            "search":         "Filtrar:",
            "infoFiltered": "(filtrado de un total de _MAX_ materias )",
        },
});



} );
</script>



<!-- TOOLTIPS -->
<script>
 var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>


</body>
</html>