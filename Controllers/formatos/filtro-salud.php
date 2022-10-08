<?php 
ob_start();
require_once 'vendor/autoload.php';

class filtroSaludFormatoCtr{

 public static function filtroCtr(){


            $ruta = explode("/",$_GET["url"]);
           $css = file_get_contents('Views/css/styles_pdf.css');
           $mpdf = new \Mpdf\Mpdf([
                   // "format" => [215.9,355.6],
                   "format" => 'letter',
                   "orientation" => "L"
               ]);
    
           $mpdf->SetWatermarkImage(
               'Views/images/letra.png',
               0.07,
               array(160,130)
           );
    
           $mpdf->showWatermarkImage = true;
    
    
           date_default_timezone_set("America/Mexico_City");
           setlocale(LC_TIME, 'spanish');
           $fecha = strftime("%d de %B de %Y %H:%M");


           $tabla = "cedula";
           $id_nivel = $ruta[1];
           $id_grado = $ruta[3];
           $grupo = $ruta[4];
           $status = "ACTIVO";
           $datos = alumnosCtr::consultarAlumnosNivelGradoGrupoStatusCtr($tabla, $id_nivel,  $id_grado, $grupo, $status);
           $num = 1;
    
    
           $plantilla = '<body class="margenes">
                 <header class="clearfix">
                   <div id="logos">
    
                       <img style="float: left; width:150px;" src="Views/images/logo-unificado.jpg">
                       ';
    
    

                    $niveles = array("","preescolar.png","primaria.png", "secundaria.png", "bachillerato.png");

                    for ($i=0; $i < count($niveles); $i++) {                         
                        if($i == $ruta[1]){
                            $plantilla .=  '
                            <div >
                            <img style="float: right; width:100px; margin-top: 0px"  src="Views/images/'.$niveles[$i].'"> 
                           
                            </div>';
                        }
                    }

    
    
                   $plantilla .= '     <div  style="width: 50%; margin:-100px auto 0; text-align:center;">
                   <h3 style= "font-size: 23px; margin:5px"><b>CENTRO UNIVERSITARIO MOCTEZUMA </b></h3>
                   <p style="font-size: 20px; text-align:center; margin:0px"><b>FILTRO ESCOLAR DE SALUD</b></p>
                        <p  style="font-size: 18px; text-align:center;margin:0px"><b>Ciclo escolar 2021 - 2022</b></p>';
    
    
                        if($ruta[1] == 2){
                           $plantilla .= '<p style="font-size: 12px; width:70%; margin:auto">Francisco I. Madero Ote. #800, Col. Esquipulas, Cd. Altamirano,Gro,C.C.T. 12PPR0070B, Tel. 767-67-688-07-74</p>';
                        }else if($ruta[1] == 3){
                           $plantilla .= '<p style="font-size: 12px; width:70%; margin:auto">Francisco I. Madero Ote. #800, Col. Esquipulas, Cd. Altamirano,Gro,C.C.T. 12PES0105U, Tel. 767-67-688-07-74</p>';
                        }else if($ruta[1] == 4){
                           $plantilla .= '<p style="font-size: 12px; width:70%; margin:auto">Francisco I. Madero Ote. #800, Col. Esquipulas, Cd. Altamirano,Gro,C.C.T. 12PBH0071R, Tel. 767-67-688-07-74</p>';
    
                        }else if($ruta[1] == 5){
                           $plantilla .= '<p style="font-size: 12px; width:70%; margin:auto">Francisco I. Madero Ote. #800, Col. Esquipulas, Cd. Altamirano,Gro,C.C.T. 12PSU01731, Tel. 767-67-688-07-74</p>';
    
                        }
    
    
    
                   $plantilla .= '</div>';
    
    
                   $plantilla .= '</div>';
                   // if($_GET["id_nivel"] != 5){
                   //  $plantilla .= '<h3>LISTA DE ASISTENCIA DE '.$_GET["grado"].'° DE '.mb_strtoupper($datosNivel["nivel"]).' </h3>';
    
                   // }else{
                   //     $plantilla .= '<h3>LISTA DE ASISTENCIA DE '.mb_strtoupper($carreras["nombre_grado"]).' </h3>';
                   // }
    
    
    
    
                   $plantilla .= '<div class="clearfix" style="margin-top:-10px">';
    
                   if($ruta[1] == 2){
                           $plantilla .='<div style="font-size: 15px; margin: -20px 0 "><span>Zona escolar:  <b><u>030</u></b></div>';
                   }else if($ruta[1] == 3){
                       $plantilla .='<div style="font-size: 15px; margin: -20px 0 "><span>Zona escolar:  <b><u>02</u></b></div>';
                   }
    
                    $plantilla .= '
                    <div style="font-size: 15px; margin: 5px 0 0 "><span>Nivel académico: <b><u>'.mb_strtoupper($ruta[0]).' </u></b></span></div>';
    
    
    
                     $plantilla .= '<div style="font-size: 15px; margin: 9px 0 10px "><span>Nombre del Docente a cargo:</span>________________________________________________________</div>
                     <div style="font-size: 15px; margin: 9px 0 15px"><span>Fecha:</span>_____________________________________________</div>
    
                       <div>
    
    
                        <div style="text-align:center; margin-top:-10px; font-size:16px">';
    
                        if($ruta[1] == 1 || $ruta[1] == 2 || $ruta[1] == 3){
                        $plantilla .= '
                        <span style="margin:0 5px 0 0">Grado:  <b>'.$ruta[3].'°</b> </span> &nbsp; &nbsp;
                        <span style="margin:0 5px 0 0">Grupo: <b>"'.$ruta[4].'"</b> </span> &nbsp; &nbsp;
                        <span style="margin:0 5px 0 0">Turno: <b>Matutino</b></span> &nbsp; &nbsp; ';
    
                        }else if($ruta[4]== 4){
                           $plantilla .= '
    
                           <span style="margin:0 5px 0 0">Grado:  <b>'.$_GET["grado"].'°</b> </span> &nbsp; &nbsp;
                           <span style="margin:0 5px 0 0">Grupo: <b>"A"</b> </span> &nbsp; &nbsp;
                           <span style="margin:0 5px 0 0">Turno: <b>Matutino</b></span> &nbsp; &nbsp;
                            ';
                        }

    
                       $plantilla .= '</div>
    
                       <div style="text-align:center; font-size:15px; margin-top: 0 0 0">';
                       if($_GET["id_nivel"] != 1){
    
                       }else{
    
                       }
    
                        $plantilla .= '
    
    
                       </div>
    
                       </div>
                     <!--<div>455 Foggy Heights,<br /> AZ 85004, US</div>
                     <div>(602) 519-0450</div>
                     <div><a href="mailto:company@example.com">company@example.com</a></div>-->
                   </div>
                   <!--<div id="project">
                     <div><span>Maestra</span> Erika Nuñez</div>
                     <div><span>CLIENT</span> John Doe</div>
                     <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
                     <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div>
                     <div><span>DATE</span> August 17, 2015</div>
                     <div><span>DUE DATE</span> September 17, 2015</div> -->
                   </div>
                 </header>
                 <main>
                   <table class="table-bordered" style="margin-top:-70px">
                     <thead>
                       <tr>';
    
    
                           $plantilla .= '
                           <th style="font-size:13px" class="numth" rowspan="2">No.</th>
                           <th style="font-size:13px" class="nom" rowspan="2" >Nombre del alumno</th>
    
                           <th style="text-align:center; font-size:13px" rowspan="2" >Temperatura</th>
                           <th style="text-align:center; font-size:13px" colspan="6" >Presenta algún síntoma</th>
    
    
    
                           ';
    
    
                         $plantilla .= '</tr>
                     </thead>
                     <tbody>';
    
                     $plantilla .= ' <tr>
                     <td style="text-align:center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fiebre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                     <td style="text-align:center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                     <td style="text-align:center">Flujo nasal</td>
                     <td style="text-align:center">Dolor de garganta</td>
                     <td style="text-align:center">Dolor muscular</td>
                     </tr>';
    
           foreach ($datos as $item => $alumno) {
    
                   $plantilla .= '<tr>
                   <td class="num">'.$num++.'</td>
               <td style="font-size:13px" class="nom">'.
    
               $alumno["ApellidoP"] ." ".$alumno["ApellidoM"]." ".$alumno["Nombre"].
               '</td>
    
               '
    
               ;
             $plantilla .= '
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             </tr>';
    
    
           }
    
           $plantilla .= '</tbody>
                   </table>
    
    
                 <footer>
                Centro Universitario Moctezuma - FILTRO ESCOLAR DE SALUD
    
               </footer>
    
                 </body>
             ';
    
    
    
    
    
           $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
           // $html = mb_convert_encoding($plantilla, 'UTF-8', 'UTF-8');
           $mpdf->WriteHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
    
    
    
           ob_end_clean();
    
           $mpdf->Output("FILTRO ESCOLAR DE SALUD ".mb_strtoupper($carreras["nombre_grado"]).".pdf", "I");

 }

}

    
