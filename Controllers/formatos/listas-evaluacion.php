<?php 
ob_start();

require_once 'vendor/autoload.php';

class evaluacionListaCtr{

 public static function evaluacionCtr(){

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

         $periodo = $_POST["evaluacionLista"];


         $tabla = "cedula";
         $id_nivel = $ruta[1];
         $id_grado = $ruta[3];
         $grupo = $ruta[5];
         $generacion = $ruta[2];
         $status = "ACTIVO";
         $cedulaLista = alumnosCtr::consultarAlumnosNivelGradoGrupoGeneracionStatusCtr($tabla, $id_nivel,  $id_grado, $grupo, $generacion, $status);


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
                 <p style="font-size: 20px; text-align:center; margin:0px"><b>LISTA DE EVALUACIÓN</b></p>
                <p  style="font-size: 18px; text-align:center;margin:0px"><b></b></p>
                ';

                $plantilla .= '<p style="font-size: 12px; width:70%; margin:auto">Francisco I. Madero Ote. #800, Col. Esquipulas, Cd. Altamirano,Gro. Tel. 767-67-688-07-74</p>';

                 $plantilla .= '</div>';
                 $plantilla .= '</div>';

                 $plantilla .= '<div class="clearfix" style="margin-top:-10px">';

                $plantilla .= ' <div style="font-size: 15px; margin: 5px 0 0 ">Nivel: <span><b><u>'.mb_strtoupper(str_replace("-"," ", $ruta[0])).'</u></b></span></div>';


                   $plantilla .= '<div style="font-size: 15px; margin: 9px 0 10px "><span>Nombre del Docente:</span>________________________________________________</div>

                     <div>


                      <div style="text-align:center; margin-top:10px; font-size:16px">
                      <span style="margin:0 5px 0 0">Periodo No: <b><u>'.$periodo.'</u></b> </span> &nbsp; &nbsp;
                      <span style="margin:0 5px 0 0">Grado: <b><u>'.$ruta[1].'°</u></b> </span> &nbsp; &nbsp;
                      <span style="margin:0 5px 0 0">Grupo: <b><u>"'.$ruta[5].'"</u></b> </span> &nbsp; &nbsp;
                      <span style="margin:0 5px 0 0">Turno: <b><u>Matutino</u></b></span> &nbsp; &nbsp;
                  
                       ';
                    
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
                        $plantilla .= ' <table   cellpadding="0px" autosize="1" width="100%"  class="table-bordered" style="height:-50px; page-break-inside:avoid;overflow: wrap; margin-top:-90px; width:140%; font-size:25px">';
                }else{
                    $plantilla .= ' <table   cellpadding="0px" autosize="1" width="100%" class="table-bordered" style="height:-50px; page-break-inside:avoid;overflow: wrap; margin-top:-30px; width:100%; font-size:25px">';
                }
                
                   $plantilla .= '<thead>
                     <tr>';


                         $plantilla .= '
                         <th style="font-size:15px;" class="numth">No.</th>
                         <th style="font-size:15px; text-align:center" class="nom" >Nombre del alumno</th>';
                        $materias = materiasCtr::consultarMateriasCalificacionesCtr($ruta[1], $ruta[3]);
                        $totalMaterias = count($materias);

                        foreach ($materias as $key => $value) {
                            $plantilla .= '
                         <th style="text-align:center; height:5%;  width:5%; text-rotate: 90;
                         font-size: 15px;
                         text-align: center;
                         ">'.$value["Nombre"].'
                         </th>';
                        }
                        
                       $plantilla .= '
                       
                       </tr>
                   </thead>
                   <tbody>';

                 
                   if(!empty($cedulaLista)){
                 foreach ($cedulaLista as $item => $alumno) {

                        $plantilla .= '<tr>
                        <td style="font-size:15px" class="num">'.($item+1).'</td>
                    <td style="font-size:15px" class="nom">'.$alumno["ApellidoP"] ." ".$alumno["ApellidoM"]." ".$alumno["Nombre"].'</td>' ;
                
                    for ($i=0; $i < $totalMaterias; $i++) {
                        $plantilla.= '<td></td>';
                    }
                    $plantilla .= '
               
                    </tr>
                
                ';

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

         $mpdf->Output("LISTA DE ASISTENCIAS DE ".$_POST["no_cuatrimestre"]." DE ".mb_strtoupper(str_replace("-"," ", $_POST["nombreLicenciatura"])).".pdf", "I");


    }
}