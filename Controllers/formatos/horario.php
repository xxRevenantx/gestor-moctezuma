<?php 
ob_start();
require_once 'vendor/autoload.php';

class horarioFormatoCtr{

 public static function verHorarioCtr(){

    $ruta = explode("/", $_GET["url"]);
         $css = file_get_contents('Views/css/horario.css');

         if($ruta[1] == 1 || $ruta[1] == 2){
            $mpdf = new \Mpdf\Mpdf([
                //                  "format" => "letter"
                                                               //ancho  largo
                               //   'mode' => 'utf-8', 'format' => [139.7, 215.9]
                               'mode' => 'utf-8', 
                               'format' => 'letter',
                               'orientation' => 'landscape'
                               //   'mode' => 'utf-8', 'format' => [139.7, 215.9 ]
                         ]);
         }else{
            $mpdf = new \Mpdf\Mpdf([
                //                  "format" => "letter"
                                                               //ancho  largo
                               //   'mode' => 'utf-8', 'format' => [139.7, 215.9]
                               'mode' => 'utf-8', 
                               'format' => 'letter',
                            
                               //   'mode' => 'utf-8', 'format' => [139.7, 215.9 ]
                         ]);
         }
 

         
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

         $generacion = $ruta[2];
         $dias = horariosCtr::consultarHorarioDiasCtr();
        //  $horarios_fetch =  horariosCtr::consultarHorarioCtr(null,$idLicenciatura, $generacion, $no_cuatrimestre);
 
         $ciclo = 2022 ." - ". date('Y', strtotime('+1 years'));
     

         $plantilla = '<body class="margenes">
               <header class="clearfix">
                 <div id="logos">';
                 $plantilla .= '<img style="float: left; width:150px; margin-top: -20px" src="Views/images/logo-unificado.jpg">';


                 switch ($ruta[1]) {
                    case '1':
                        $plantilla .=  ' <div ><img style="float: right; width:110px; margin-top: -20px"  src="Views/images/preescolar.png"> </div>';
                        break;
                    case '2':
                        $plantilla .=  ' <div ><img style="float: right; width:110px; margin-top: -20px"  src="Views/images/primaria.png"> </div>';
                        break;
                    case '3':
                        $plantilla .=  ' <div ><img style="float: right; width:110px; margin-top: -20px"  src="Views/images/secundaria.png"> </div>';
                        break;
                    case '4':
                        $plantilla .=  ' <div ><img style="float: right; width:110px; margin-top: -20px"  src="Views/images/bachillerato.png"> </div>';
                        break;
                    case '6':
                        $plantilla .=  ' <div ><img style="float: right; width:110px; margin-top: -20px"  src="Views/images/logo-moctezuma.jpg"> </div>';
                        break;
                    
                    default:
                        # code...
                        break;
                }
            


                 $plantilla .= ' <div  style="width: 60%; margin:-90px auto 0; text-align:center;">
                 <h3 style= "font-size: 20px; margin:5px"><b>CENTRO UNIVERSITARIO MOCTEZUMA</b></h3>
                 <p style="font-size: 20px; text-align:center; margin:0px"><b>HORARIO DE CLASES</b></p>
                 <p style="font-size: 20px; text-align:center; margin:0px"><b>CICLO ESCOLAR '.$ciclo.'</b></p>
                 <p style="font-size: 20px; text-align:center; margin:0px; color: #006598"><b>'.$ruta[3].'° DE '. mb_strtoupper($ruta[0]).' GRUPO: '.$ruta[5].'</b></p>
                 ';
                 $plantilla .= '</div>';
                 $plantilla .= '</div>';

                 $plantilla .= '<div class="clearfix" style="margin-top:-20px">
               </header>
               <main>';

               if($ruta[1] == 1 || $ruta[1] == 2){
                    $plantilla .= '    <table class="horario" style="width:100%; margin-top:35px">';
               }else{
                $plantilla .= '<table class="horario" style="width:100%; margin-top:-5px">';
               }

           
                $plantilla .= '
                <tr>
                <td style="background: #bdd9ed; font-weight:bold">HORARIO</td>';
                            foreach ($dias as $key => $dia) {
                            $plantilla .= '<td style="background: #bdd9ed; font-weight:bold">'.$dia["dia"].'</td>';
                        }

                $plantilla .= '</tr>';


                $nivel = $ruta[1];
                $grado = $ruta[3];
                $grupo = $ruta[5];
                $horas = horariosCtr::consultarHorasCtr($nivel, $grado, $grupo);
                foreach ($horas as $key => $hora) {
                    $plantilla .= '
                        <tr>
                            <td style="width:140px"><b>'.$hora["horas"].'</b></td> ';
                foreach ($dias as $key => $dia) {
                $tabla = "horarios";
                $horarios =  horariosCtr::consultarHorarioCtr($tabla, $dia["Id"],$ruta[1], $ruta[3], $ruta[5], $hora["Id"]);


                if(!empty($horarios["materia"])){
                    $materia = materiasCtr::consultarMateriaIdCtr($horarios["materia"]);

                    if(
                        $materia["Nombre"] == "RE" || $materia["Nombre"] == "C" || $materia["Nombre"] == "E" || $materia["Nombre"] == "S" || $materia["Nombre"] == "O"
                       || $materia["Nombre"] == "CO" || $materia["Nombre"] == "L" || $materia["Nombre"] == "A" || $materia["Nombre"] == "CI" || $materia["Nombre"] == "ÓN"
                       || $materia["Nombre"] == "M" || $materia["Nombre"] == "I" || $materia["Nombre"] == "D" || $materia["Nombre"] == "A"
                       ){
                        if($ruta[1] == 1 || $ruta[1] == 2){
                            $plantilla .= '<td style="line-height:29px; width:100px; background:#bdd9ed ">'.$materia["Nombre"].'</td>';
                       }else{
                        $plantilla .= '<td style="line-height:15px; width:100px; background:#bdd9ed ">'.$materia["Nombre"].'</td>';
                       }
                       
                    }else{
                        if($ruta[1] == 1 || $ruta[1] == 2){
                            $plantilla .= '<td style="line-height:29px; width:100px; ">'.$materia["Nombre"].'</td>';
                       }else{
                        $plantilla .= '<td style="line-height:15px; width:100px;">'.$materia["Nombre"].'</td>';
                       }
                    }
                 
                }else{
                    $plantilla .= '
                    <td style="background: #CBDCB0; border-right:none; border-left: none"></td>
                    ';
                } 
    
                }


             $plantilla .=  '</tr>';
                    
                
                 }


               $plantilla .= '</table>';



               // Para que no aparezcan los maestros en preescolar ni en primaria
               if($ruta[1] == 3 || $ruta[1] == 4){

                $plantilla .= ' <table class="docentes" style="margin-top:20px; width:880px">
                <tr>
                <td style="background: #bdd9ed; font-size:18px; padding:0">NOMBRE DE LA MATERIA</td>
                <td style="background: #bdd9ed; font-size:18px; padding:0">NOMBRE DEL DOCENTE</td>

                </tr>';
                $tabla = "horarios";
                $horarios =  horariosCtr::consultarHorarioFetchAllCtr($tabla,$ruta[1], $ruta[3], $ruta[5]);
                foreach ($horarios as $key => $horario) {
                    $materia = materiasCtr::consultarMateriaIdCtr($horario["materia"]);
                    $profesor = profesoresCtr::editarProfesorCtr($horario["profesor"]);
                   $plantilla .= '<tr>';

                   if($horario["profesor"] != "22"){
                        $plantilla .= ' <td style="padding:0; margin:0; font-size:18px;">'.Funciones::mayusculas($materia["Nombre"]).'</td>';
                   }
                   
                   if($horario["profesor"] != "22"){
                        $plantilla .= ' <td style="padding:0; margin:0; font-size:18px;">'.$profesor["Nombre"]." ".$profesor["PrimerApellido"]." ".$profesor["SegundoApellido"].'</td>';
                   }

                  $plantilla .= '
                  
                   </tr>';
                }


               $plantilla .= '</table>';
               }
               


               $plantilla .= '</main>
             

               </body>
           ';





         $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
         // $html = mb_convert_encoding($plantilla, 'UTF-8', 'UTF-8');
         $mpdf->WriteHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);



         ob_end_clean();

         $mpdf->Output("HORARIO DE ".$ruta[3].'° DE '. mb_strtoupper($ruta[0]).' GRUPO: '.$ruta[5].".pdf", "I");


    }
}