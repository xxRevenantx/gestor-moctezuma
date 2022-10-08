<?php


ob_start();
require_once 'vendor/autoload.php';

Class horarioIndividualCtr{

 public static function individualCtr(){

    $css = file_get_contents('Views/css/horario-individual.css');

       $mpdf = new \Mpdf\Mpdf([
           //                  "format" => "letter"
                                                          //ancho  largo
                          //   'mode' => 'utf-8', 'format' => [139.7, 215.9]
                          'mode' => 'utf-8', 
                          'format' => 'letter',
                          'orientation' => 'landscape'
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

    $dias = horariosCtr::consultarHorarioDiasCtr();
   //  $horarios_fetch =  horariosCtr::consultarHorarioCtr(null,$idLicenciatura, $generacion, $no_cuatrimestre);

   $profesor = $_POST["horarioIndividualId"];
   $tabla = "horarios";
   $horarios = horariosCtr::consultarHorariosIndividualesIdCtr($tabla, $profesor);

    $plantilla = '<body class="margenes">
          <header class="clearfix">
            <div id="logos">';
            $plantilla .= '<img style="float: left; width:150px; margin-top: -20px" src="Views/images/logo-unificado.jpg">';


       


            $plantilla .= ' <div>
            <h1><b>CENTRO UNIVERSITARIO MOCTEZUMA</b></h1>
            <p style="font-size: 20px; text-align:center; margin:0px"><b>HORARIO DE CLASES</b></p>
            ';
            $plantilla .= '</div>';
            $plantilla .= '</div>';

            $plantilla .= '<div class="clearfix" style="margin-top:-20px">
          </header>
          <main>

          <table class="horario" style="width:100%; margin-top:-5px">
           
           <tr>
           
           ';
                       foreach ($dias as $key => $dia) {
                       $plantilla .= '<td style="background: #bdd9ed; font-weight:bold">'.$dia["dia"].'</td>';
                   }

           $plantilla .= '</tr>';
                //    $nivel=3;
                //    $grado  = 1;
                //    $grupo = "A";
                   
                foreach ($horarios as $key => $h) {
              
               $plantilla .= '
                   <tr>';
                   
                   foreach ($dias as $key => $dia) {
           

                    if(!empty($h["materia"])){
                        $materia = materiasCtr::consultarMateriaIdCtr($h["materia"]);
                            $plantilla .= '<td style="line-height:15px; width:100px">'.$materia["Nombre"].'</td>';
                        
                     
                    }else{
                        $plantilla .= '
                        <td style="background: #CBDCB0; border-right:none; border-left: none"></td>
                        ';
                    } 
                    } 
                
          
        $plantilla .=  '</tr>';
             
        } 
           
            


          $plantilla .= '</table>';


          


          $plantilla .= '</main>
        

          </body>
      ';





    $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
    // $html = mb_convert_encoding($plantilla, 'UTF-8', 'UTF-8');
    $mpdf->WriteHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);



    ob_end_clean();

    $mpdf->Output("HORARIO.pdf", "I");


    }
}
    