<?php 
ob_start();
require_once 'vendor/autoload.php';

class evaluacionCtr{

 public static function evaluacionPeriodo(){

        $ruta = explode("/", $_GET["url"]);

        if($ruta[7] != 4){

        $ruta = explode("/", $_GET["url"]);

        $id = $_POST["cedulaId"];
        $cedula = alumnosCtr::consultarAlumnoIdCtr($id);
            

         $css = file_get_contents('Views/css/calificacion.css');
         $mpdf = new \Mpdf\Mpdf([
//                  "format" => "letter"
                                               //ancho  largo
               //   'mode' => 'utf-8', 'format' => [139.7, 215.9]
               'mode' => 'utf-8', 'format' => 'letter'
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

         $plantilla = '<body>
               <header class="clearfix">
                 <div id="logos">
                     
                     <img style="float: left; width:150px;" src="Views/images/logo-unificado.jpg">
                     ';
 
                     
 
 
                    switch ($ruta[1]) {
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
                    
                    default:
                        # code...
                        break;
                }
 
                 $plantilla .= '     <div  style="width: 50%; margin:-100px 160px 0 auto; text-align:center;">
                 <h4 style= "font-size: 18px; margin:0px 0"><b>CENTRO UNIVERSITARIO MOCTEZUMA</b></h4>
                      <p  style="font-size: 18px; text-align:center;margin:-3px 0 -4px"><b>CICLO ESCOLAR 2022 - 2023</b></p>
                      <h3 style= "font-size: 22px"><b>BOLETA DE CALIFICACIONES</b></h3>
                
               
                   </div>';
                  
 
                 $plantilla .= '</div>';
               
 
 
                 $plantilla .= '<div class="clearfix">';
                  $plantilla .= '
                
 
 
 
                      <table  class="table-bordered" style="margin-top:-8px">';

                      $plantilla .= '

                      <tr  style="background: #929292; ">
 
                      <td colspan="12" style="font-size:12px; color: #fff; text-align:center;"><b>DATOS DE LA ESCUELA</b>
                      </td>
                       </tr>
                      
                      
                      <tr>
                        <td colspan="2"  style="font-size:13px; background: #f7f7f7">'.$ruta[7].'° PERIODO</td>
                        <td colspan="3"  style="font-size:13px; background: #f7f7f7">'.$cedula["Nivel"].'</td>
                        <td colspan="3"  style="font-size:13px; background: #f7f7f7">'.$ruta[3].'° grado</td>
                        <td colspan="2"  style="font-size:13px; background: #f7f7f7">'.$cedula["Grupo"].'</td>
                        <td colspan="2"  style="font-size:13px; background: #f7f7f7">'.$cedula["Generacion"].'</td>
                        </tr>

                        <tr>
                          <td colspan="2" style="font-size:10px; border-right: none">PERIODO</td>
                          <td colspan="3" style="font-size:10px; border-right: none">NIVEL</td>
                        <td colspan="3" style="font-size:10px; border-right: none; border-left: none">GRADO</td>
                        <td colspan="2" style="font-size:10px; border-right: none; border-left: none">GRUPO</td>
                          <td colspan="2" style="font-size:10px; border-left: none">GENERACIÓN</td>
                        </tr>

                        <tr>
                        <td colspan="4" style="font-size:9px; width:250px; background: #f7f7f7">FRANCISCO I. MADERO OTE #800, COL. ESQUIPULAS, 
                        CD. ALTAMIRANO.
                        </td>
                        <td colspan="4" style="font-size:13px; background: #f7f7f7">PUNGARABATO</td>
                        <td colspan="2" style="font-size:13px; background: #f7f7f7">12PPB</td>
                        <td colspan="2" style="font-size:13px; background: #f7f7f7">GUERRERO</td>
                        </tr>

                        <tr>
 
                        <td colspan="4" style="font-size:10px; border-right: none">DIRECCIÓN
                        </td>
                        <td colspan="4" style="font-size:10px; border-left: none; border-right: none">MUNICIPIO</td>
                        <td colspan="2" style="font-size:10px; border-left: none; border-right: none">C.C.T.</td>
                        <td colspan="2" style="font-size:10px; border-left: none">ESTADO</td>
                         </tr>

                         <tr  style="background: #929292; ">
 
                        <td colspan="12" style="font-size:12px; color: #fff; text-align:center;"><b>DATOS DEL ALUMNO</b>
                        </td>
                         </tr>


                         <tr>
                         <td colspan="4" style="font-size:13px; border-right:none"><u>'.mb_strtoupper($cedula["ApellidoP"]).'</u></td>
                         <td colspan="4" style="font-size:13px; border-right: none; border-left:none"><u>'.mb_strtoupper($cedula["ApellidoM"]).'</u></td>
                         <td colspan="4" style="font-size:13px; border-left:none"><u>'.mb_strtoupper($cedula["Nombre"]).'</u></td>
                         </tr>
                        
                         <tr>
                        <td colspan="4" style="font-size:10px; border-right: none">APELLIDO PATERNO
                        </td>
                        <td colspan="4" style="font-size:10px; border-left: none; border-right: none">APELLIDO MATERNO</td>
                        <td colspan="4" style="font-size:10px; border-left: none">NOMBRE(S)</td>
                         </tr>
                        
                         <tr>
                          <td colspan="12" style="padding:13px; border:none"></td>
                        </tr>

                        <tr style="background: #929292; ">
                         <td colspan="7"  style="font-size:15px;  padding:5px; color: #fff"><b>ASIGNATURA</b></td>
                        <td colspan="5" style="font-size:15px;  padding:5px; color: #fff"><b>CALIFICACIÓN</b></td>
                          </tr>
                        
                        ';
                        $promedio = 0;
                        $nivel= $ruta[1];
                        $grado = $ruta[3];
                        $materias = materiasCtr::consultarMateriasCalificacionesCtr($nivel, $grado);
                        
                        //MATERIAS
                        foreach ($materias as $key => $value) {
                          $calificacion = calificacionCtr::consultarCalificacionesCtr($cedula["Id"], $value["Id"], $ruta[1], $ruta[3],$ruta[5], $ruta[7]);

                            $promedio += $calificacion["calificacion"];
                            

                            $plantilla .= '
                                <tr>
                                <td colspan="7" style="font-size:13px;  width:250px;  padding:7px 0;" >'.mb_strtoupper($value["Nombre"]).'</td>
                                <td colspan="5" style="font-size:13px;  padding:7px 0; border-bottom: none" >'.$calificacion["calificacion"].'</td>
                                </tr>

                            ';
                        }

                                $plantilla .= '
                                
                                <tr>
                                <td  colspan="7" style="font-size:13px;  width:250px;  padding:7px 5px; text-align: right"><b>CALIFICACIÓN PARCIAL</b></td>
                                <td  colspan="5" style="font-size:13px;   padding:7px 0; text-align: center"><b>'.Funciones::promedio($promedio/(count($materias))).'</b></td>
                                </tr>
                                ';



                      $plantilla .= '</table>
                    
 
                 </div> 
              
                 </div> 
               </header>
 
 
               <main>
 
               </main>
               <footer>
              Centro Universitario Moctezuma | Boleta de calificaciones | Francisco I. Madero Ote. #800, col. Esquipulas. Cd. Altamirano, Gro. | Tel. 767 688 0774 | Fecha de expedición: '.$fecha.'
              
             </footer>
           
               </body>
           ';
             
 
 
             
             
         $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
         // $html = mb_convert_encoding($plantilla, 'UTF-8', 'UTF-8');
         $mpdf->WriteHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
 
          
             
         ob_end_clean();
           
         $mpdf->Output("LISTA DE CALIFICACIONES de ".mb_strtoupper($cedula["Nombre"]. " ". $cedula["ApellidoP"])." ".$cedula["ApellidoM"].".pdf", "I");

        }else{
          
            // EVALUACIÓN FINAL DEL NIVEL BÁSICO
            $ruta = explode("/", $_GET["url"]);

            $id = $_POST["cedulaId"];
            $cedula = alumnosCtr::consultarAlumnoIdCtr($id);
                
    
             $css = file_get_contents('Views/css/calificacion.css');
             $mpdf = new \Mpdf\Mpdf([
    //                  "format" => "letter"
                                                   //ancho  largo
                   //   'mode' => 'utf-8', 'format' => [139.7, 215.9]
                   'mode' => 'utf-8', 'format' => 'letter'
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
    
             $plantilla = '<body>
                   <header class="clearfix">
                     <div id="logos">
                         
                         <img style="float: left; width:150px;" src="Views/images/logo-unificado.jpg">
                         ';
     
                         
     
     
                        switch ($ruta[1]) {
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
                        
                        default:
                            # code...
                            break;
                    }
     
                     $plantilla .= '     <div  style="width: 50%; margin:-100px 160px 0 auto; text-align:center;">
                     <h4 style= "font-size: 18px; margin:0px 0"><b>CENTRO UNIVERSITARIO MOCTEZUMA</b></h4>
                          <p  style="font-size: 18px; text-align:center;margin:-3px 0 -4px"><b>CICLO ESCOLAR 2022 - 2023</b></p>
                          <h3 style= "font-size: 18px"><b>BOLETA DE CALIFICACIONES FINALES</b></h3>
                    
                   
                       </div>';
                      
     
                     $plantilla .= '</div>';
                   
     
     
                     $plantilla .= '<div class="clearfix">';
                      $plantilla .= '
                    
     
     
     
                          <table  class="table-bordered" style="margin-top:-8px">';
    
                          $plantilla .= '
    
                          <tr  style="background: #929292; ">
     
                          <td colspan="12" style="font-size:12px; color: #fff; text-align:center;"><b>DATOS DE LA ESCUELA</b>
                          </td>
                           </tr>
                          
                          
                          <tr>
                            <td colspan="2"  style="font-size:13px; background: #f7f7f7">EVALUACIÓN FINAL</td>
                            <td colspan="3"  style="font-size:13px; background: #f7f7f7">'.$cedula["Nivel"].'</td>
                            <td colspan="3"  style="font-size:13px; background: #f7f7f7">'.$ruta[3].'° grado</td>
                            <td colspan="2"  style="font-size:13px; background: #f7f7f7">'.$cedula["Grupo"].'</td>
                            <td colspan="2"  style="font-size:13px; background: #f7f7f7">'.$cedula["Generacion"].'</td>
                            </tr>
    
                            <tr>
                              <td colspan="2" style="font-size:10px; border-right: none">PERIODO</td>
                              <td colspan="3" style="font-size:10px; border-right: none">NIVEL</td>
                            <td colspan="3" style="font-size:10px; border-right: none; border-left: none">GRADO</td>
                            <td colspan="2" style="font-size:10px; border-right: none; border-left: none">GRUPO</td>
                              <td colspan="2" style="font-size:10px; border-left: none">GENERACIÓN</td>
                            </tr>
    
                            <tr>
                            <td colspan="4" style="font-size:9px; width:250px; background: #f7f7f7">FRANCISCO I. MADERO OTE #800, COL. ESQUIPULAS, 
                            CD. ALTAMIRANO.
                            </td>
                            <td colspan="4" style="font-size:13px; background: #f7f7f7">PUNGARABATO</td>
                            <td colspan="2" style="font-size:13px; background: #f7f7f7">12PPB</td>
                            <td colspan="2" style="font-size:13px; background: #f7f7f7">GUERRERO</td>
                            </tr>
    
                            <tr>
     
                            <td colspan="4" style="font-size:10px; border-right: none">DIRECCIÓN
                            </td>
                            <td colspan="4" style="font-size:10px; border-left: none; border-right: none">MUNICIPIO</td>
                            <td colspan="2" style="font-size:10px; border-left: none; border-right: none">C.C.T.</td>
                            <td colspan="2" style="font-size:10px; border-left: none">ESTADO</td>
                             </tr>
    
                             <tr  style="background: #929292; ">
     
                            <td colspan="12" style="font-size:12px; color: #fff; text-align:center;"><b>DATOS DEL ALUMNO</b>
                            </td>
                             </tr>
    
    
                             <tr>
                             <td colspan="4" style="font-size:13px; border-right:none"><u>'.mb_strtoupper($cedula["ApellidoP"]).'</u></td>
                             <td colspan="4" style="font-size:13px; border-right: none; border-left:none"><u>'.mb_strtoupper($cedula["ApellidoM"]).'</u></td>
                             <td colspan="4" style="font-size:13px; border-left:none"><u>'.mb_strtoupper($cedula["Nombre"]).'</u></td>
                             </tr>
                            
                             <tr>
                            <td colspan="4" style="font-size:10px; border-right: none">APELLIDO PATERNO
                            </td>
                            <td colspan="4" style="font-size:10px; border-left: none; border-right: none">APELLIDO MATERNO</td>
                            <td colspan="4" style="font-size:10px; border-left: none">NOMBRE(S)</td>
                             </tr>
                            
                             <tr>
                              <td colspan="12" style="padding:13px; border:none"></td>
                            </tr>
    
                            <tr style="background: #929292; ">
                             <td colspan="4"  style="font-size:15px;   padding:5px; color: #fff"><b>ASIGNATURA</b></td>
                            <td colspan="2" style="font-size:15px;   padding:5px; color: #fff"><b>1° PERIODO</b></td>
                            <td colspan="2" style="font-size:15px;   padding:5px; color: #fff"><b>2° PERIODO</b></td>
                            <td colspan="2" style="font-size:15px;   padding:5px; color: #fff"><b>3° PERIODO</b></td>
                            <td colspan="2" style="font-size:15px;   padding:5px; color: #fff"><b>PROMEDIO</b></td>
                              </tr>
                            
                            ';
                            $suma_promedios = 0;
                            $promedio = 0;
                            $nivel= $ruta[1];
                            $grado = $ruta[3];
                            $materias = materiasCtr::consultarMateriasCalificacionesCtr($nivel, $grado);
                            
                            //MATERIAS
                            foreach ($materias as $key => $value) {


                              $periodo1 = calificacionCtr::consultarCalificacionesCtr($cedula["Id"], $value["Id"], $ruta[1], $ruta[3],$ruta[5], 1);
                              $periodo2 = calificacionCtr::consultarCalificacionesCtr($cedula["Id"], $value["Id"], $ruta[1], $ruta[3],$ruta[5], 2);
                              $periodo3 = calificacionCtr::consultarCalificacionesCtr($cedula["Id"], $value["Id"], $ruta[1], $ruta[3],$ruta[5], 3);


                              $suma_periodos = Funciones::promedio((($periodo1["calificacion"]+$periodo2["calificacion"]+$periodo3["calificacion"])/3));
                              
                              $suma_promedios += $suma_periodos;
    

                                
    
                                $plantilla .= '
                                    <tr>
                                    <td colspan="4" style="font-size:13px;  width:250px;  padding:7px 0;" >'.mb_strtoupper($value["Nombre"]).'</td>
                                    <td colspan="2" style="font-size:13px;  width:100px; padding:7px 0; border-bottom: none" >'.$periodo1["calificacion"].'</td>
                                    <td colspan="2" style="font-size:13px;  width:100px; padding:7px 0; border-bottom: none" >'.$periodo2["calificacion"].'</td>
                                    <td colspan="2" style="font-size:13px;  width:100px; padding:7px 0; border-bottom: none" >'.$periodo3["calificacion"].'</td>
                                    <td colspan="2" style="font-size:13px;  width:100px; padding:7px 0; border-bottom: none" >'.$suma_periodos.'</td>
                                    </tr>
    
                                ';
                            }
    
                                    $plantilla .= '
                                    
                                    <tr>
                                    <td  colspan="6" style="font-size:13px;  width:250px;  padding:7px 5px; text-align: right"><b>CALIFICACIÓN FINAL</b></td>
                                    <td  colspan="6" style="font-size:13px;   padding:7px 0; text-align: center"><b>'.Funciones::promedio($suma_promedios/count($materias)).'</b></td>
                                    </tr>
                                    ';
    
    
    
                          $plantilla .= '</table>
                        
     
                     </div> 
                  
                     </div> 
                   </header>
     
     
                   <main>
     
                   </main>
                   <footer>
                  Centro Universitario Moctezuma | Boleta de calificaciones | Francisco I. Madero Ote. #800, col. Esquipulas. Cd. Altamirano, Gro. | Tel. 767 688 0774 | Fecha de expedición: '.$fecha.'
                  
                 </footer>
               
                   </body>
               ';
                 
     
     
                 
                 
             $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
             // $html = mb_convert_encoding($plantilla, 'UTF-8', 'UTF-8');
             $mpdf->WriteHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
     
              
                 
             ob_end_clean();
               
             $mpdf->Output("LISTA DE CALIFICACIONES de ".mb_strtoupper($cedula["Nombre"]. " ". $cedula["ApellidoP"])." ".$cedula["ApellidoM"].".pdf", "I");



        }
 
    }

}