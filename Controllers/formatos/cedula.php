<?php 
ob_start();
require_once 'vendor/autoload.php';

class cedulaFormatoCtr{

 public static function cedulaCtr(){

        $ruta = explode("/", $_GET["url"]);

        $id = $_POST["cedulaId"];
        $id_nivel =$ruta[1];
        $id_grado = $ruta[3];
        $tabla = "cedula";
        $cedula = alumnosCtr::consultarDatosCtr($tabla, $id_nivel, $id_grado, $id);

         $css = file_get_contents('Views/css/cedula.css');
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

         $num = 1;




         $plantilla =  '
                           <body>
                       <section>
                           <div class="container">
                           <div class="clearfix">

                           <table class="tblEncabezado">
                           <tr>
                            <td>
                            <img style="width: 200px" src="Views/images/logo.png">
                            </td>

                            <td style="font-size:20px; padding: 10px; font-weight: bold; background: #9AB94E">
                           CÉDULA DE INSCRIPCIÓN
                            </td>

                            <td>
                            <span style="font-size:18px;font-weight: bold; ">FECHA: '.$fecha2.'</span>
                            </td>

                           </tr>
                           </table>

                             <h2 class="datos-generales">DATOS GENERALES</h2>

                                <table class="tblDatos">
                               <tr>
                                   <td colspan="4"  class="borde-r pd" class="bg"><span class="negritas borde-r">NOMBRE DEL ALUMNO (A)</span></td>
                                   <td colspan="3"  class="borde-r borde-l pd">'. mb_strtoupper($cedula["ApellidoP"]).'</td>
                                   <td colspan="1"  class="borde-r pd" >'.mb_strtoupper($cedula["ApellidoM"]).'</td>
                                   <td colspan="2"  class="borde-r pd">'.mb_strtoupper($cedula["Nombre"]).'</td>
                                   <td rowspan="4" colspan="2" class="foto-td borde-b "><img class="foto" src="'.substr($cedula["Foto"],6).'" alt=""></td>
                               </tr>
                               <tr>
                               <td colspan="4" class="noborder"></td>
                               <td colspan="3" class="noborder">A. PATERNO</td>
                               <td colspan="1" class="noborder">A. MATERNO</td>
                               <td  colspan="2" class="noborder">NOMBRES (S)</td>
                               </tr>

                               <tr>
                                   <td colspan="2"  class="negritas bg pd borde-b borde-r">EDAD </td>
                                   <td colspan="1" class="pd borde-r borde-b">'.$cedula["Edad"].' AÑOS</td>
                                   <td colspan="4" class="bg borde-r borde-b negritas pd">FECHA DE NACIMIENTO</td>
                                   <td colspan="1" class="pd borde-r borde-b">'.$cedula["FechaNacimiento"].'</td>
                                   <td colspan="1" class="bg borde-r borde-b negritas pd">SEXO</td>
                                   <td colspan="1" class="pd borde-r borde-b">'.$cedula["Sexo"].'</td>
                               </tr>

                               <tr>
                                   <td colspan="3" class="negritas bg pd borde-r borde-b">ESTADO CIVIL </td>
                                   <td colspan="2" class="pd borde-r borde-b">'.$cedula["EstadoCivil"].'</td>
                                   <td colspan="2" class="bg negritas pd borde-r borde-b">CURP</td>
                                   <td colspan="3" class="pd borde-r borde-b">'.$cedula["CURP"].'</td>

                               </tr>

                               <tr>
                                   <td colspan="3" class="negritas bg pd borde-r">LUGAR DE NACIMIENTO </td>
                                   <td colspan="3" class="pd borde-r">'.$cedula["LugarNacimiento"].'</td>
                                   <td colspan="1" class="pd borde-r">'.$cedula["Estado"].'</td>
                                   <td colspan="3" class="bg negritas pd borde-r">NACIONALIDAD</td>
                                   <td colspan="2" class="pd ">'.$cedula["Nacionalidad"].'</td>

                               </tr>

                               
                               <tr>
                               <td colspan="3" class="noborder"></td>
                               <td colspan="3" class="noborder">CIUDAD</td>
                               <td  class="noborder">ESTADO</td>
                               <td colspan="3" class="noborder"></td>

                               </tr>

                               <tr>
                                   <td colspan="4" class="negritas bg pd borde-r">DOMICILIO DE PROCEDENCIA </td>
                                   <td colspan="4" class="pd borde-r">'.$cedula["Calle"].'</td>
                                   <td colspan="2" class="pd borde-r">'.$cedula["NoExt"].'</td>
                                   <td colspan="2" class="pd ">'.$cedula["NoInt"].'</td>
                               </tr>
                               <tr>
                               <td colspan="4" class="noborder"></td>
                               <td colspan="4" class="noborder"></td>
                               <td colspan="2" class="noborder ">No. EXT</td>
                               <td colspan="2" class="noborder">No. INT</td>

                               </tr>

                               <tr>
                                   <td colspan="6" class="pd borde-r">'.$cedula["Colonia"].'</td>
                                   <td colspan="2" class="pd borde-r">'.$cedula["Cp"].'</td>
                                   <td colspan="4" class="pd">'.$cedula["Municipio"].'</td>
                               </tr>

                               <tr>
                               <td colspan="6" class="noborder">COLONIA</td>
                               <td colspan="2" class="noborder ">CP</td>
                               <td colspan="4" class="noborder">MUNICIPIO</td>

                               </tr>

                               <tr>
                                   <td colspan="7" class="pd borde-r">'.$cedula["Localidad"].'</td>
                                   <td colspan="5" class="pd">'.$cedula["EstadoAct"].'</td>
                               </tr>

                               <tr>
                               <td colspan="7" class="noborder ">CIUDAD/LOCALIDAD</td>
                               <td colspan="5" class="noborder">ESTADO</td>
                               </tr>

                               <tr>
                                   <td colspan="3" class="pd borde-r">'.$cedula["Telefono"].'</td>
                                   <td colspan="3" class="pd borde-r">'.$cedula["Movil"].'</td>
                                   <td colspan="3" class="negritas borde-r bg pd">EMAIL </td>
                                   <td colspan="3" class="pd">'.$cedula["Email"].'</td>
                               </tr>

                               <tr>
                               <td colspan="3" class="noborder">TELÉFONO</td>
                               <td colspan="3" class="noborder">CEULAR</td>
                               <td colspan="3" class="noborder"></td>
                               <td colspan="3" class="noborder "></td>
                               </tr>

                               <tr>
                               <td colspan="5" class="pd bg negritas borde-b borde-r">NOMBRE DEL PADRE O TUTOR:</td>
                               <td colspan="7" class="pd borde-b ">'.$cedula["Tutor"].'</td>
                                 </tr>

                        
                           

                           <tr><td colspan="12"><h2 class="datos-generales pd borde-t borde-b">DATOS ESCOLARES</h2></td></tr>

                           <tr>
                           <td colspan="3" class="negritas bg pd borde-b borde-r">NIVEL</td>
                           <td colspan="2" class="pd borde-b">'.$cedula["Nivel"].'</td>
                           <td colspan="2" class="negritas bg pd borde-b borde-r">GRADO</td>
                           <td colspan="2" class="pd borde-b">'.$cedula["id_grado"].'°</td>
                           <td colspan="2" class="negritas bg pd borde-b borde-r">GRUPO</td>
                           <td colspan="1" class="pd borde-b">'.$cedula["Grupo"].'</td>
                       </tr>

                                 <tr>
                               <td colspan="3" class="pd bg negritas borde-r borde-b">GENERACIÓN:</td>
                               <td colspan="4" class="pd borde-r borde-b">'.$cedula["Generacion"].'</td>
                               <td colspan="2" class="pd bg negritas borde-r borde-b">TURNO:</td>
                               <td colspan="3" class="pd borde-b">'.$cedula["Turno"].'</td>
                                 </tr>
                                 <tr>
                               <td colspan="9" class="bg negritas borde-r borde-b">REGISTRO DE DOCUMENTACIÓN:</td>
                               <td colspan="3" rowspan="7" class="pd borde-b">• LA DOCUMENTACIÓN MENCIONADA
                               DEBERÁ ENTREGARSE AL MOMENTO DE
                               INSCRIBIRSE. <br>
                               • EL ALUMNO PODRÁ INSCRIBIRSE
                               CARECIENDO DEL CERTIFICADO
                               CORRESPONDIENTE SIEMPRE Y
                               CUANDO PRESENTE CONSTANCIA DE
                               ACREDITACIÓN Y LO PRESENTE EN EL
                               PLAZO QUE INDIQUE, DE NO HACERLO
                               ASÍ, NO SE LE PODRÁ DAR
                               SEGUIMIENTO AL TRÁMITE
                               CORRESPONDIENTE ANTE LAS
                               AUTORIDADES EDUCATIVAS DEL
                               ESTADO Y POR LO TANTO SU
                               INSCRIPCIÓN SE ANULARÁ.
                               </td>
                                 </tr>

                                 <tr>
                                 <td colspan="7" class="pd negritas borde-r borde-b" style="text-align:left">CERTIFICADO</td>';

                                if($cedula["CertBach"] == 'true'){
                                    $plantilla .= '<td colspan="2" class="pd borde-r borde-b"><img style="width:20px; display:block" src="Views/images/check.png"></td>';
                                }else{
                                    $plantilla .= '<td colspan="2" class="pd borde-r borde-b"></td>';
                                }
                                 

                                $plantilla .= '</tr>
                                 <tr>
                                 <td colspan="7" class="pd negritas borde-r borde-b" style="text-align:left">ACTA DE NACIMIENTO </td>';
                                 if($cedula["ActNac"] == 'true'){
                                    $plantilla .= '<td colspan="2" class="pd borde-r borde-b"><img style="width:20px; display:block" src="Views/images/check.png"></td>';
                                }else{
                                    $plantilla .= '<td colspan="2" class="pd borde-r borde-b"></td>';
                                }
                                
                                $plantilla .= '</tr>
                                 <tr>
                                 <td colspan="7" class="pd negritas borde-r borde-b" style="text-align:left">CERTIFICADO MÉDICO</td>';
                               
                                 if($cedula["CertMed"] == 'true'){
                                    $plantilla .= '<td colspan="2" class="pd borde-r borde-b"><img style="width:20px; display:block" src="Views/images/check.png"></td>';
                                }else{
                                    $plantilla .= '<td colspan="2" class="pd borde-r borde-b"></td>';
                                }

                                $plantilla .= '</tr>
                                 <tr>
                                 <td colspan="7" class="pd negritas borde-r borde-b" style="text-align:left">6 FOTOGRAFÍAS TAMAÑO INFANTIL B/N</td>';
                                 if($cedula["FotosInf"] == 'true'){
                                    $plantilla .= '<td colspan="2" class="pd borde-r borde-b"><img style="width:20px; display:block" src="Views/images/check.png"></td>';
                                }else{
                                    $plantilla .= '<td colspan="2" class="pd borde-r borde-b"></td>';
                                }
                                
                                $plantilla .= '</tr>
                                 <tr>
                                 <td colspan="7" class="pd negritas borde-r borde-b" style="text-align:left">CURP</td>';
                                 if($cedula["CURPCheck"] == 'true'){
                                    $plantilla .= '<td colspan="2" class="pd borde-r borde-b"><img style="width:20px; display:block" src="Views/images/check.png"></td>';
                                }else{
                                    $plantilla .= '<td colspan="2" class="pd borde-r borde-b"></td>';
                                }
                                
                                $plantilla .= '</tr>
                                 <tr>
                                 <td colspan="3" class="pd negritas borde-r borde-b" style="text-align:left">OTROS:</td>
                                 <td colspan="6" class="pd borde-r borde-b">'.$cedula["Otros"].'</td>
                                </tr>
                                 <tr>
                                </tr>

                                 <tr>
                                 <td colspan="12" class="pd borde-b">
                                 ME COMPROMETO A ENTREGAR LOS DOCUMENTOS FALTANTES A MÁS TARDAR EL DÍA________ DE_______________________ DEL___________.
                                 ESTOY DE ACUERDO QUE EN CASO DE NO CUMPLIR CON EL COMPROMISO ANTERIOR, SEA CANCELADA MI INSCRIPCIÓN Y CAUSE BAJA SIN NINGUNA
                                 RESPONSABILIDAD PARA EL CENTRO UNIVERSITARIO MOCTEZUMA
                                 </td>
                                </tr>

                                <tr>';

                                if($cedula["Beca"] == 'true'){
                                    $plantilla .= '<td colspan="4" class="pd  negritas borde-r"><img style="width:20px; display:block" src="Views/images/check.png"> BECA</td>';
                                }else{
                                    $plantilla .= '<td colspan="4" class="pd  negritas borde-r">BECA</td>';
                                }
                             


                                $plantilla .= '<td colspan="4" class="pd borde-r">MONTO AUTORIZADO: $'.$cedula["Monto"].'</td>
                                <td colspan="4" class="pd ">CD. ALTAMIRANO, GRO., A '.mb_strtoupper($fecha). '</td>
                               </tr>



     


                           </table>

                           </div>


                           </div>

                           </section>
                  </body>';






                  $plantilla .='

                  <pagebreak>
                  <table style="width: 1200px">
                  <tr style="border:none">
                  <td style="border:none"> <img style="display:inline-block; width:400px; margin:0 auto 5px; " src="Views/images/logo.png">
                  </td>
                  </tr>
                  </table>
                  <div class="clausula">

                  <br>Todo pago que se efectúa al Centro Universitario Moctezuma presupone una serie de trámites internos, así como el apartado de un lugar en el curso por iniciar. Esto  implica que el alumno que cubra cuotas por cualquier concepto y desee darse de baja estará sujeto a las siguientes condiciones:
                  <br><br>a)	Los alumnos que hayan realizado el pago total o parcial de la  inscripción  y  cancelen  su  ingreso  al Centro Universitario Moctezuma, no se les reembolsará  monto alguno de lo pagado. Realizado el pago parcial de la inscripción deberán liquidar el 100% de la inscripción al valor vigente de la misma en que esto suceda.
                 <br><br>b) 	En  caso  de  reinscripción de alumnos en cuatrimestres o semestres avanzados, que cancelen  su  reingreso  al  Centro Universitario Moctezuma, no se les reembolsará monto alguno de lo pagado
                 <br><br>c) 	Cuando  el  alumno  deje de asistir a clases sin previo aviso, el  Centro  Universitario Moctezuma tendrá la facultad de procesar la baja correspondiente y el alumno  deberá  cubrir  las  colegiaturas correspondientes, de acuerdo a la fecha de baja procesada por el CUM.

                 <br><br><b>Pago Anticipado:</b>
                 <br><br>El pago del cuatrimestre o semestre por anticipado tendrá un 8% de  descuento  exclusivamente  sobre las colegiaturas sin incluir otras promociones. Como fecha límite para gozar de dicho descuento se tendrá la fecha establecida en el  calendario de vencimientos.
                 <br><br><b>Pagos Vencidos:</b>
                <br><br> a) 	Al acumularse dos pagos vencidos el alumno será suspendido, perdiendo el derecho al servicio educativo y administrativo aún  y  cuando  se  encontrara  en  periodo  de  exámenes parciales   hasta  que  no  liquide su adeudo. Las  faltas  no  son justificables.
                 <br><br>b) 	 Al acumular  tres  pagos vencidos el alumno podrá ser dado de baja,  no  pudiendo asistir a clases hasta en tanto liquide el adeudo pendiente.  Deberá  tomarse en cuenta que las faltas  acumuladas por  este  retraso  afectara  la  acreditación de sus asignaturas.
                <br><br>c) 	Al finalizar el ciclo escolar, no podrán presentar exámenes de fin de  período  y  extraordinarios si no se tienen liquidados al 100% los pagos de Colegiaturas, Inscripción, Reinscripción, Cursos de Regularización y /o cualquier otro servicio.
                <br><br>e)	Los pagos de colegiatura deberán realizarse dentro de los primeros cinco días de inicio del mes correspondiente.
                <br><br> DEBO Y PAGARE INCONDICIONALMENTE POR  ESTE  PAGARE  A  LA  ORDEN  DE  CENTRO UNIVERSITARIO MOCTEZUMA, EN _________________________________, EL DÍA _____________________ , LA CANTIDAD DE $_________________________ _____________________________________M.N.  POR CONCEPTO DE ADEUDOS EN COLEGIATURAS VENCIDAS.

                ESTE  PAGARE  CAUSARA  INTERESES  A  RAZÓN  DEL ____ MENSUAL  DESDE  LA  FECHA  DE  VENCIMIENTO  HASTA  SU  TOTAL LIQUIDACIÓN, PAGADERO CONJUNTAMENTE CON EL PRINCIPAL.

                <p style="text-align:center">ACEPTAMOS:<p><br>

                <table style="font-size: 13px; width: 600px; margin:auto; border:none;padding:0;  ">
                <tr style=" padding:0; margin:0; border:none">
                <td style=" padding:0; margin:0; border:none">'.mb_strtoupper($cedula["Nombre"]." " .$cedula["ApellidoP"]." ".$cedula["ApellidoM"]).'</td>
                <td rowspan="2" style="width: 100px; border:none"></td>
                <td style=" padding:0; margin:0; border:none">'.$cedula["Tutor"].'</td>
                </tr>


                <tr style=" margin:0; padding:0;">
                        <td  style=" border-left:none; border-bottom:none; border-right: none; width: 100px">
                        <p>ALUMNO</p>
                        <p>FIRMA</p>
                        </td>

                        <td  style=" border-left:none; border-bottom:none; border-right: none; width: 100px">
                        <p>PADRE O TUTOR</p>
                        <p>FIRMA</p>

                        </td>
                </tr>
                </table>




                 </div>
                  </pagebreak>
                  ';






         $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
         // $html = mb_convert_encoding($plantilla, 'UTF-8', 'UTF-8');
         $mpdf->WriteHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

         ob_end_clean();

        //  $mpdf->Output(mb_strtoupper("Cédula de inscripción - ".$cedula["Nombre"]. "_".$cedula["ApellidoP"]."_" .$cedula["ApellidoM"]).".pdf", "D");
         $mpdf->Output(mb_strtoupper("Cédula de inscripción - ".$cedula["Nombre"]. "_".$cedula["ApellidoP"]."_" .$cedula["ApellidoM"]).".pdf", "I");
                //  $mpdf->Output("Cedula/RECIBO_". $cedula["aTutor"]."_".$NoRecibo. ".pdf", "F");

    }
}