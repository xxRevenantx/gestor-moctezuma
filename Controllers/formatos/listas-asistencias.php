<?php 
ob_start();

require_once 'vendor/autoload.php';

class listaFormatoCtr{

 public static function listaCtr(){

         $css = file_get_contents('Views/css/styles_pdf.css');
         $mpdf = new \Mpdf\Mpdf([
//                  "format" => "letter"
                                               //ancho  largo
               //   'mode' => 'utf-8', 'format' => [139.7, 215.9]
               'mode' => 'utf-8', 'format' => 'letter',
               "orientation" => "L"
               //   'mode' => 'utf-8', 'format' => [139.7, 215.9 ]
         ]);
         $mpdf->SetWatermarkImage(
             'Views/images/letra.png',
             0.09,
             array(160,130)

         );
         $mpdf->showWatermarkImage = true;
         date_default_timezone_set("America/Mexico_City");
         setlocale(LC_TIME, 'spanish');
         $fecha = strftime("%d de %B de %Y");
         $fecha2 = date("d/m/Y");
         
         $ruta = explode("/", $_GET["url"]);

         $idNivel = $_POST["idNivel"];
         $periodo = $_POST["periodoLista"];

         $tabla = "cedula";
         $id_nivel = $ruta[1];
         $id_grado = $ruta[3];
         $grupo = $ruta[5];
         $generacion = $ruta[2];
         $status = "ACTIVO";
         $cedulaLista = alumnosCtr::consultarAlumnosNivelGradoGrupoGeneracionStatusCtr($tabla, $id_nivel,  $id_grado, $grupo, $generacion, $status);

            // Para el ciclo escolar
            $fechaactual = date('Y');// 
            $nuevafecha = strtotime ('+1 year' , strtotime($fechaactual)); //Se resta un año menos
            $nuevafecha = date ('Y',$nuevafecha);

            $fechaCiclo = date('Y')."-".$nuevafecha;

         
         $plantilla = '<body class="margenes">
               <header class="clearfix">
                 <div id="logos">';
                 $plantilla .= '<img style="float: left; width:220px; margin-top: 20px" src="Views/images/logo.png">';


                 switch ($idNivel) {
                    case '1':
                        $plantilla .=  ' <div ><img style="float: right; width:100px; margin-top: 0px"  src="Views/images/preescolar.png"> </div>';
                        break;
                    case '2':
                        $plantilla .=  ' <div ><img style="float: right; width:100px; margin-top: 0px"  src="Views/images/primaria.png"> </div>';
                        break;
                    case '3':
                        $plantilla .=  ' <div ><img style="float: right; width:100px; margin-top: 0px"  src="Views/images/secundaria.png"> </div>';
                        break;
                    case '4':
                        $plantilla .=  ' <div ><img style="float: right; width:100px; margin-top: 0px"  src="Views/images/bachillerato.png"> </div>';
                        break;
                    
                    default:
                        # code...
                        break;
                }
            
                 $plantilla .= ' <div  style="width: 50%; margin:-100px auto 0; text-align:center;">
                 <h3 style= "font-size: 23px; margin:5px"><b>CENTRO UNIVERSITARIO MOCTEZUMA</b></h3>
                 <p style="font-size: 20px; text-align:center; margin:0px"><b>LISTA DE ASISTENCIA Y EVALUACIÓN</b></p>
                 <p style="font-size: 20px; text-align:center; margin:0px"><b>Ciclo escolar '.$fechaCiclo.'</b></p>
                <p  style="font-size: 18px; text-align:center;margin:0px"><b></b></p>
                ';

                $plantilla .= '<p style="font-size: 12px; width:70%; margin:auto">Francisco I. Madero Ote. #800, Col. Esquipulas, Cd. Altamirano,Gro. Tel. 767-67-688-07-74</p>';

                 $plantilla .= '</div>';
                 $plantilla .= '</div>';

                 $plantilla .= '<div class="clearfix" style="margin-top:-10px">';

                $plantilla .= ' <div style="font-size: 15px; margin: 5px 0 0 ">Nivel: <span><b><u>'.mb_strtoupper(str_replace("-"," ", $ruta[0])).'</u></b></span></div>';
                $plantilla .= '<div style="font-size: 15px; margin: 9px 0 10px "><span>Nombre del Docente:</span>________________________________________________</div>';
                   

                   
                   if($ruta[1] ==  1 || $ruta[1] ==  2){
                    $plantilla .= '<div style="font-size: 15px; margin: 9px 0 15px"></div>';
                   }else{
                    $plantilla .= '<div style="font-size: 15px; margin: 9px 0 15px"><span>Materia:</span>__________________________________________</div>';
                   }
             

                    if($ruta[1] == 4){
                        $plantilla .= '<div>
                        <div style="text-align:center; margin-top:10px; font-size:16px">
                        <span style="margin:0 5px 0 0">Parcial: <b><u>'.$periodo.'</u></b> </span> &nbsp; &nbsp;
                        <span style="margin:0 5px 0 0">Grado: <b><u>'.$ruta[3].'°</u></b> </span> &nbsp; &nbsp;
                        <span style="margin:0 5px 0 0">Semestre: <b><u>'.$ruta[7].'°</u></b> </span> &nbsp; &nbsp;
                        <span style="margin:0 5px 0 0">Grupo: <b><u>"'.$ruta[5].'"</u></b> </span> &nbsp; &nbsp;
                        <span style="margin:0 5px 0 0">Turno: <b><u>Matutino</u></b></span> &nbsp; &nbsp;
                         ';
                    }else{
                        $plantilla .= '<div>
                        <div style="text-align:center; margin-top:10px; font-size:16px">
                        <span style="margin:0 5px 0 0">Periodo: <b><u>'.$periodo.'</u></b> </span> &nbsp; &nbsp;
                        <span style="margin:0 5px 0 0">Grado: <b><u>'.$ruta[3].'°</u></b> </span> &nbsp; &nbsp;
                        <span style="margin:0 5px 0 0">Grupo: <b><u>"'.$ruta[5].'"</u></b> </span> &nbsp; &nbsp;
                        <span style="margin:0 5px 0 0">Turno: <b><u>Matutino</u></b></span> &nbsp; &nbsp;
                         ';
                    }
                  
                    
                     $plantilla .= '</div>

                     <div style="text-align:center; font-size:15px; margin-top: 10px">';
                      $plantilla .= '<span style="margin:10px 0">que comprende las fechas  _____________________ </span> &nbsp;
                      <span style="margin:0 10px 0 0"> al  _____________________</span> &nbsp; &nbsp;
                     </div>

                     </div>

                 </div>

                 </div>
               </header>
               <main>';

               if(!empty($cedulaLista)){
                        $plantilla .= ' <table class="table-bordered" style="margin-top:-90px; width:100%; font-size:20px">';
                }else{
                    $plantilla .= ' <table class="table-bordered" style="margin-top:-30px; width:100%; font-size:20px">';
                }
                
                   $plantilla .= '<thead>
                     <tr>';


                         $plantilla .= '
                         <th style="font-size:17px" class="numth" rowspan="2">No.</th>
                         <th style="font-size:17px" class="nom" rowspan="2" >Nombre del alumno</th>

                         <th style="text-align:center; font-size:17px" rowspan="2"  colspan="50">Asistencias</th>
                         <th style="text-align:center; font-size:17px" colspan="6" >Evaluación</th>



                         ';


                       $plantilla .= '</tr>
                   </thead>
                   <tbody>';

                   $plantilla .= ' <tr>

                   <td style="transform: rotate(180deg);">Asistencias</td>
                   <td>Participaciones</td>
                   <td>Tareas</td>
                   <td>Evidencias</td>
                   <td>Examen</td>
                   <td>Cal.Final</td>
                   </tr>';
                 
                   if(!empty($cedulaLista)){
                 foreach ($cedulaLista as $item => $alumno) {

                        $plantilla .= '<tr>
                        <td style="font-size:18px" class="num">'.($item+1).'</td>
                    <td style="font-size:18px" class="nom">'.

                    $alumno["ApellidoP"] ." ".$alumno["ApellidoM"]." ".$alumno["Nombre"].
                    '</td>

                    '

                    ;
                    $td = "<td></td>";
                    for ($i=0; $i <= 49; $i++) {
                        $plantilla.= '<td></td>';
                    }
                $plantilla .= '
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>';

                }
              }else{
                    $plantilla .= '<tr><td style="text-align:center" colspan="60">No hay alumnos</td></tr>';
                }

         $plantilla .= '</tbody>
                 </table>

                 <p style="font-size:16px; margin-top:30px">Nombre y firma del Docente:  _________________________________________</p>';


                     $plantilla .= '<span style="font-size:16px; margin:30px 50px 0 0 ">CAMPOS A EVALUAR &nbsp; &nbsp; _____________________________</span>&nbsp; &nbsp;&nbsp; &nbsp;';

                 $plantilla .= '<span style="font-size:16px; margin:30px 50px 0 0"> _______________________________</span>&nbsp; &nbsp;&nbsp; &nbsp;
                 <span style="font-size:16px; margin:20px 50px 0 0"> _______________________________</span>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<br><br>
                 &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>  ________________________________________________</span>
                  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<span>  ________________________________________________</span>

               </main>
               <footer>
              CENTRO UNIVERSITARIO MOCTEZUMA - LISTA DE ASISTENCIA Y EVALUACIÓN  - '. mb_strtoupper( $fecha).'

             </footer>

               </body>
           ';





         $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
         // $html = mb_convert_encoding($plantilla, 'UTF-8', 'UTF-8');
         $mpdf->WriteHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);



         ob_end_clean();

         $mpdf->Output("LISTA DE ASISTENCIAS DE ".$ruta[3]."° DE ".mb_strtoupper($ruta[0]).".pdf", "I");


    }
}