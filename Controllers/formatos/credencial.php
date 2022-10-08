<?php 
ob_start();
require_once 'vendor/autoload.php';

class credencialFormatoCtr{

 public static function credencialCtr(){

    $css = file_get_contents('Views/css/styles_credencial.css');

    $mpdf = new \Mpdf\Mpdf([
            // "format" => [54,86],
            "format" => 'letter'

        ]);
        $idCredencial = $_POST["idCredencial"];
        $ruta = explode("/", $_GET["url"]);

        $tabla = "cedula";
        $alumno = alumnosCtr::consultarDatosCtr($tabla, $ruta[1], $ruta[3], $idCredencial);

        //PRIMARIA
        if($ruta[1]== 2){
    $plantilla = '<body class="credencial">
                            <div class="credencial_frontal" style="background-image: url(Views/images/credencial-primaria.jpg)" >
                                      <p class="nombre"><b><span class="lN">N</span>ombre: </b>'.mb_strtoupper($alumno["Nombre"]." " .$alumno["ApellidoP"]." ".$alumno["ApellidoM"]).'</p>
                                      <p class="matricula"><b><span class="lN">C</span>URP: </b>'.$alumno["CURP"].'</p>
                                      <p class="gradoGrupo"><b><span class="lN">G</span>rado: </b> '.$alumno["id_grado"]."° ".' <b><span class="lN">G</span>rupo: </b>"'.$alumno["Grupo"].'"</p>
                                      <p class="ciclo"><b><span class="lN">C</span>iclo escolar: </b>2021 - 2022</p>
                                     <div class="foto">
                                      <img  src="'.substr($alumno["Foto"],6).'">
                                      </div>
                                      </div>
                            <div class="credencial_trasera" style="background-image: url(Views/images/credencial-primaria-trasera.jpg)">

                            <div class"datos">
                            <p class="calle"><b>Calle: </b>' .mb_strtoupper($alumno["Calle"]).' No. #'.$alumno["NoExt"]  .'</p>
                            <p class="colonia"><b>Colonia: </b>' .mb_strtoupper($alumno["Colonia"]).'</p>
                            <p class="municipio"><b>Municipio: </b>'.$alumno["Municipio"].'</p>
                            <p class="Entidad"><b>Entidad: </b>'.$alumno["EstadoAct"].'</p>
                            <p class="tutor"><b>Tutor: </b>'.$alumno["Tutor"].'</p>
                            <p class="info">La información contenida en esta identificación
                            está sujeta a validación de antecedentes escolares. Esta credencial
                            es intransferible y no es válida si presenta tachaduras o enmendaduras</p>
                                </div>
                            </div>
                    </body>
      ';
        }
            // SECUNDARIA
        else if($ruta[1]== 3){
            $plantilla = '<body class="credencial">
                            <div class="credencial_frontal" style="background-image: url(Vistas/imagenes/credencial-secundaria-frontal.jpg)" >
                                      <p class="nombre"><b><span class="lN">N</span>ombre: </b>'.mb_strtoupper($alumno["Nombre"]." " .$alumno["ApellidoP"]." ".$alumno["ApellidoM"]).'</p>
                                      <p class="matricula"><b><span class="lN">C</span>URP: </b>'.$alumno["CURP"].'</p>
                                      <p class="gradoGrupo"><b><span class="lN">G</span>rado: </b> '.$alumno["id_grado"]."° ".' <b><span class="lN">G</span>rupo: </b>"'.$alumno["Grupo"].'"</p>
                                      <p class="telefono"><b><span class="lN">T</span>eléfono: </b>'.$alumno["Telefono"].'</p>
                                      <p class="ciclo"><b><span class="lN">C</span>iclo escolar: </b>2021 - 2022</p>
                                     <div class="foto">
                                     <img src="'.$alumno["Foto"].'">
                                      </div>
                                      </div>
                            <div class="credencial_trasera" style="background-image: url(Vistas/imagenes/credencial-primaria-trasera.jpg)">

                            <div class"datos">
                            <p class="calle"><b>Calle: </b>' .mb_strtoupper($alumno["Calle"]).' No. #'.$alumno["NoExt"]  .'</p>
                            <p class="colonia"><b>Colonia: </b>' .mb_strtoupper($alumno["Colonia"]).'</p>
                            <p class="municipio"><b>Municipio: </b>'.$alumno["Municipio"].'</p>
                            <p class="Entidad"><b>Entidad: </b>'.$alumno["EstadoAct"].'</p>
                            <p class="tutor"><b>Tutor: </b>'.$alumno["Tutor"].'</p>
                            <p class="info">La información contenida en esta identificación
                            está sujeta a validación de antecedentes escolares. Esta credencial
                            es intransferible y no es válida si presenta tachaduras o enmendaduras</p>
                                </div>
                            </div>
                    </body>
      ';
            // BACHILLERATO
        }else if($ruta[1] == 4){
            $plantilla = '<body class="credencial">
            <div class="credencial_frontal" style="background-image: url(Vistas/imagenes/credencial-bachi.jpg)" >
                      <p class="nombre"><b><span class="lN">N</span>ombre: </b>'.mb_strtoupper($alumno["Nombre"]." " .$alumno["ApellidoP"]." ".$alumno["ApellidoM"]).'</p>
                      <p class="matricula"><b><span class="lN">C</span>URP: </b>'.$alumno["CURP"].'</p>';

                      if($alumno["Semestre"][0] == 1){
                        $plantilla .= ' <p class="gradoGrupo"><b><span class="lN">G</span>rado: </b> '.$alumno["id_grado"]."° ".'PRIMER SEMESTRE</p>';
                      }
                      else if($alumno["Semestre"][0] == 2){
                            $plantilla .= ' <p class="gradoGrupo"><b><span class="lN">G</span>rado: </b> '.$alumno["id_grado"]."° ".'SEGUNDO SEMESTRE</p>';
                      }
                      else if($alumno["Semestre"][0] == 3){
                            $plantilla .= ' <p class="gradoGrupo"><b><span class="lN">G</span>rado: </b> '.$alumno["id_grado"]."° ".'TERCER SEMESTRE</p>';
                      }
                      else if($alumno["Semestre"][0] == 4){
                            $plantilla .= ' <p class="gradoGrupo"><b><span class="lN">G</span>rado: </b> '.$alumno["id_grado"]."° ".'CUARTO SEMESTRE</p>';
                      }
                      else if($alumno["Semestre"][0] == 5){
                            $plantilla .= ' <p class="gradoGrupo"><b><span class="lN">G</span>rado: </b> '.$alumno["id_grado"]."° ".'QUINTO SEMESTRE</p>';
                      }
                      else if($alumno["Semestre"][0] == 6){
                            $plantilla .= ' <p class="gradoGrupo"><b><span class="lN">G</span>rado: </b> '.$alumno["id_grado"]."° ".'SEXTO SEMESTRE</p>';
                      }


                      $plantilla .= '
                      <p class="ciclo"><b><span class="lN">C</span>iclo escolar: </b>2021 - 2022</p>
                     <div style="margin-top:-70px" class="foto">
                     <img  src="'.$alumno["Foto"].'">
                      </div>
                      </div>
                      <div class="credencial_trasera" style="background-image: url(Vistas/imagenes/credencial-bachi-trasera.jpg)">

                      <div class"datos">
                      <p class="calle"><b>Calle: </b>' .mb_strtoupper($alumno["Calle"]).' No. #'.$alumno["NoExt"]  .'</p>
                      <p class="colonia"><b>Colonia: </b>' .mb_strtoupper($alumno["Colonia"]).'</p>
                      <p class="municipio"><b>Municipio: </b>'.$alumno["Municipio"].'</p>
                      <p class="Entidad"><b>Entidad: </b>'.$alumno["EstadoAct"].'</p>
                      <p class="tutor"><b>Tutor: </b>'.$alumno["Tutor"].'</p>
                      <p class="info">La información contenida en esta identificación
                      está sujeta a validación de antecedentes escolares. Esta credencial
                      es intransferible y no es válida si presenta tachaduras o enmendaduras</p>
                          </div>
                      </div>
    </body>';
        }


   
        $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
        // $html = mb_convert_encoding($plantilla, 'UTF-8', 'UTF-8');
        $mpdf->WriteHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

        ob_end_clean();

    $mpdf->Output("CREDENCIAL DE ". mb_strtoupper($alumno["Nombre"]." ".$alumno["ApellidoP"]." ".$alumno["ApellidoM"]).".pdf", "I");

 }


 
}

    
