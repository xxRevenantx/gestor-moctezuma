<?php 
ob_start();

require_once 'vendor/autoload.php';

class personalizadorCtr{

 public static function personlizadoresCtr(){

         $css = file_get_contents('Views/css/styles_pdf.css');
         $mpdf = new \Mpdf\Mpdf([
//                  "format" => "letter"
                                               //ancho  largo
               //   'mode' => 'utf-8', 'format' => [139.7, 215.9]
               'mode' => 'utf-8', 'format' => 'letter',
               "orientation" => "L"
               //   'mode' => 'utf-8', 'format' => [139.7, 215.9 ]
         ]);

         $mpdf->showWatermarkImage = true;
         date_default_timezone_set("America/Mexico_City");
         setlocale(LC_TIME, 'spanish');

         
         $ruta = explode("/", $_GET["url"]);

         $idNivel = $_POST["idNivel"];
         $periodo = $_POST["periodoLista"];

         $tabla = "cedula";
         $id_nivel = $ruta[1];
         $id_grado = $ruta[3];
         $grupo = $ruta[5];
         $generacion = $ruta[2];
         $status = "ACTIVO";
         $cedula = alumnosCtr::consultarAlumnosNivelGradoGrupoGeneracionStatusCtr($tabla, $id_nivel,  $id_grado, $grupo, $generacion, $status);


         
         $plantilla = '<body class="margenes">

         
         '; 
            foreach ($cedula as $key => $value) {
               
                $plantilla .= '
                   <p style="width:15.5cm; height:1cm; border:1px solid #000; margin:0; padding:0; line-height:30px; font-size: 16px; padding-left: 10px
                   ">'. mb_strtoupper( $value["Nombre"]." ".$value["ApellidoP"]." ".$value["ApellidoM"]).' | '.$value["id_grado"]."° ".mb_strtoupper($value["Nivel"]).' | '.$value["Generacion"].'</p>
                   ';
            }

            
              

        $plantilla .= '
        

        </body>';





         $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
         // $html = mb_convert_encoding($plantilla, 'UTF-8', 'UTF-8');
         $mpdf->WriteHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);



         ob_end_clean();

         $mpdf->Output("PERSONALIZADORES ".$ruta[3]."° DE ".mb_strtoupper($ruta[0]).".pdf", "I");


    }
}