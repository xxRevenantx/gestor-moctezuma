<?php 
ob_start();

require_once 'vendor/autoload.php';

class listaVertificalCtr{

 public static function verticalCtr(){

         $css = file_get_contents('Views/css/styles_pdf_vertical.css');
         $mpdf = new \Mpdf\Mpdf([
//                  "format" => "letter"
                                               //ancho  largo
               //   'mode' => 'utf-8', 'format' => [139.7, 215.9]
               'mode' => 'utf-8', 'format' => 'letter',
               //"orientation" => "L"
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

         
         $plantilla = '<body >
                    <div class="listaVertical">
               <header class="clearfix" style="background: #fff">
                 <div id="logos">';
                 $plantilla .= '<img style="float: left; width:150px; margin-top: 20px" src="Views/images/logo.png">';


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
                 <h3 style= "font-size: 20px; margin:5px"><b>CENTRO UNIVERSITARIO MOCTEZUMA</b></h3>
                 <p style="font-size: 15px; text-align:center; margin:0px"><b>LISTA DE ASISTENCIA</b></p>
                 <p style="font-size: 15px; text-align:center; margin:0px"><b>Ciclo escolar '.$fechaCiclo.'</b></p>
                <p  style="font-size: 18px; text-align:center;margin:0px"><b></b></p>
                ';

                $plantilla .= '<p style="font-size: 12px; width:70%; margin:auto">Francisco I. Madero Ote. #800, Col. Esquipulas, Cd. Altamirano,Gro. Tel. 767-67-688-07-74</p>';

                 $plantilla .= '</div>';
                 $plantilla .= '</div>';

                 $plantilla .= '<div class="clearfix" style="margin-top:-10px">';
             

                    if($ruta[1] == 4){
                        $plantilla .= '<div>
                        <div style="text-align:center; margin-top:10px; font-size:16px">
                        <span style="margin:0 5px 0 0">Nivel: <b><u>'.$ruta[0].'</u></b> </span> &nbsp; &nbsp;
                        <span style="margin:0 5px 0 0">Grado: <b><u>'.$ruta[3].'°</u></b> </span> &nbsp; &nbsp;
                        <span style="margin:0 5px 0 0">Semestre: <b><u>'.$ruta[7].'°</u></b> </span> &nbsp; &nbsp;
                        <span style="margin:0 5px 0 0">Grupo: <b><u>"'.$ruta[5].'"</u></b> </span> &nbsp; &nbsp;
                        <span style="margin:0 5px 0 0">Turno: <b><u>Matutino</u></b></span> &nbsp; &nbsp;
                         ';
                    }else{
                        $plantilla .= '<div>
                        <div style="text-align:center; margin-top:10px; font-size:16px">
                        <span style="margin:0 5px 0 0">Nivel: <b><u>'.$ruta[0].'</u></b> </span> &nbsp; &nbsp;
                        <span style="margin:0 5px 0 0">Grado: <b><u>'.$ruta[3].'°</u></b> </span> &nbsp; &nbsp;
                        <span style="margin:0 5px 0 0">Grupo: <b><u>"'.$ruta[5].'"</u></b> </span> &nbsp; &nbsp;
                        <span style="margin:0 5px 0 0">Turno: <b><u>Matutino</u></b></span> &nbsp; &nbsp;
                         ';
                    }
                  
                    
                     $plantilla .= '</div>

                     </div>

                 </div>

                 </div>
               </header>
               <main>';

               if(!empty($cedulaLista)){
                        $plantilla .= ' <table class="table-bordered" style="margin-top:-50px; width:100%; font-size:20px; background: #fff">';
                }else{
                    $plantilla .= ' <table class="table-bordered" style="margin-top:-30px; width:100%; font-size:20px; background: #fff">';
                }
                
                   $plantilla .= '<thead>
                     <tr>';


                        if($ruta[1] != 4 ){
                            $plantilla .= '
                            <th style="font-size:17px" class="numth">No.</th>
                            <th style="font-size:17px" class="nom" >Nombre del alumno</th>
                            <th style="text-align:center; font-size:17px">CURP</th>
                            ';
                        }else{
                            $plantilla .= '
                            <th style="font-size:17px" class="numth">No.</th>
                            <th style="font-size:17px" class="nom" >Nombre del alumno</th>
                            <th style="text-align:center; font-size:17px">MATRÍCULA</th>
                            ';
                        }
                        


                       $plantilla .= '</tr>
                   </thead>
                   <tbody>';
                 
                   if(!empty($cedulaLista)){
                 foreach ($cedulaLista as $item => $alumno) {

                        $plantilla .= '<tr >
                        <td style="font-size:18px" class="num">'.($item+1).'</td>
                    <td style="font-size:18px; background: #fff" class="nom">'.$alumno["ApellidoP"] ." ".$alumno["ApellidoM"]." ".$alumno["Nombre"].'</td>
                    <td style="font-size:18px; text-align:center; background: #fff" class="nom">'.$alumno["CURP"].'</td>
                    
                    ';

                $plantilla .= '
                </tr>';

                }
              }else{
                    $plantilla .= '<tr><td style="text-align:center" colspan="60">No hay alumnos</td></tr>';
                }

         $plantilla .= '</tbody>
                 </table>

               </main>
               <footer>
              CENTRO UNIVERSITARIO MOCTEZUMA - LISTA DE ASISTENCIA - '. mb_strtoupper( $fecha).'

             </footer>

                </div>
               </body>
           ';





         $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
         // $html = mb_convert_encoding($plantilla, 'UTF-8', 'UTF-8');
         $mpdf->WriteHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);



         ob_end_clean();

         $mpdf->Output("LISTA DE ASISTENCIAS DE ".$ruta[3]."° DE ".mb_strtoupper($ruta[0]).".pdf", "I");


    }
}