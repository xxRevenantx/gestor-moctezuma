<div class="row">
					<div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <h3 class="text-center mb-3 mt-4">GRADOS DE <?php echo mb_strtoupper(str_replace("-"," ",$url[0]))?></h3>
                <p class="text-muted text-center mb-4 pb-2">
                    Cada GRADO cuenta con un total de alumnos dividido entre mujeres y hombres.
                </p>
           
                  <div class="row">

                    <?php

                       // Alumnos
                      $alumnos  = alumnosCtr::consultarAlumnosChartCtr();
                      $totalAlumnos1 = 0;
                      $totalAlumnos2 = 0;
                      $totalAlumnos3 = 0;
                      $totalAlumnos4 = 0;
                      $totalAlumnos5 = 0;
                      $totalAlumnos6 = 0;

                      $totalMujeres1 = 0;
                      $totalMujeres2 = 0;
                      $totalMujeres3 = 0;
                      $totalMujeres4 = 0;
                      $totalMujeres5 = 0;
                      $totalMujeres6 = 0;

                      $totalHombres1 = 0;
                      $totalHombres2 = 0;
                      $totalHombres3 = 0;
                      $totalHombres4 = 0;
                      $totalHombres5 = 0;
                      $totalHombres6 = 0;
                      $suma = 0;
                      foreach ($alumnos as $key => $value) {

                            // ALUMNOS
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == 1 && $value["Generacion"] == $url[2] && $value["Status"] == "ACTIVO"){
                                  $totalAlumnos1++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == 2 && $value["Generacion"] == $url[2] && $value["Status"] == "ACTIVO"){
                                  $totalAlumnos2++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == 3 && $value["Generacion"] == $url[2] && $value["Status"] == "ACTIVO"){
                                  $totalAlumnos3++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == 4 && $value["Generacion"] == $url[2] && $value["Status"] == "ACTIVO"){
                                  $totalAlumnos4++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == 5 && $value["Generacion"] == $url[2] && $value["Status"] == "ACTIVO"){
                                  $totalAlumnos5++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == 6 && $value["Generacion"] == $url[2] && $value["Status"] == "ACTIVO"){
                                  $totalAlumnos6++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == 1 && $value["Generacion"] == $url[2] && $value["Status"] == "ACTIVO" && $value["Sexo"] == "FEMENINO"){
                                  $totalMujeres1++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == 2 && $value["Generacion"] == $url[2] && $value["Status"] == "ACTIVO" && $value["Sexo"] == "FEMENINO"){
                                  $totalMujeres2++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == 3 && $value["Generacion"] == $url[2] && $value["Status"] == "ACTIVO" && $value["Sexo"] == "FEMENINO"){
                                  $totalMujeres3++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == 4 && $value["Generacion"] == $url[2] && $value["Status"] == "ACTIVO" && $value["Sexo"] == "FEMENINO"){
                                  $totalMujeres4++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == 5 && $value["Generacion"] == $url[2] && $value["Status"] == "ACTIVO" && $value["Sexo"] == "FEMENINO"){
                                  $totalMujeres5++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == 6 && $value["Generacion"] == $url[2] && $value["Status"] == "ACTIVO" && $value["Sexo"] == "FEMENINO"){
                                  $totalMujeres6++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == 1 && $value["Generacion"] == $url[2] && $value["Status"] == "ACTIVO" && $value["Sexo"] == "MASCULINO"){
                                  $totalHombres1++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == 2 && $value["Generacion"] == $url[2] && $value["Status"] == "ACTIVO" && $value["Sexo"] == "MASCULINO"){
                                  $totalHombres2++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == 3 && $value["Generacion"] == $url[2] && $value["Status"] == "ACTIVO" && $value["Sexo"] == "MASCULINO"){
                                  $totalHombres3++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == 4 && $value["Generacion"] == $url[2] && $value["Status"] == "ACTIVO" && $value["Sexo"] == "MASCULINO"){
                                  $totalHombres4++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == 5 && $value["Generacion"] == $url[2] && $value["Status"] == "ACTIVO" && $value["Sexo"] == "MASCULINO"){
                                  $totalHombres5++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == 6 && $value["Generacion"] == $url[2] && $value["Status"] == "ACTIVO" && $value["Sexo"] == "MASCULINO"){
                                  $totalHombres6++;
                              }
                          }

                            $totalAlumnos = array($totalAlumnos1, $totalAlumnos2, $totalAlumnos3, $totalAlumnos4, $totalAlumnos5, $totalAlumnos6);
                            $totalMujeres = array($totalMujeres1, $totalMujeres2, $totalMujeres3, $totalMujeres4, $totalMujeres5, $totalMujeres6);
                            $totalHombres = array($totalHombres1, $totalHombres2, $totalHombres3, $totalHombres4, $totalHombres5, $totalHombres6);
                       
                        $tabla = "grados"; 
                        $get = $url[1];
                        $grados = nivelesCtr::consultarGradosCtr($tabla, $get);
                         foreach ($grados as $key => $value) {
                          ?>

                    <div class="col-md-3 stretch-card grid-margin m-auto  grid-margin-md-0">
                      <div class="card cardNiveles mb-3">
                        <div class="card-body">
                          <h4 class="text-center mt-3 mb-4"><?php echo $value["nombre_grado"] ?></h4>
                          <img style="width: 120px;display:block; margin:auto" src="<?php echo $rutaLocal.'Views/images/activos.png' ?>">
                        
                          <table class="mx-auto mt-4 w-100 m-auto" style="font-size: 15px">
                            <tr style="margin:auto; text-align:center"> 
                              <thead  style="margin:auto; text-align:center">
                             
                                <th><?php  echo $totalMujeres[$key] ?></th>
                                <th><?php  echo $totalAlumnos[$key] ?></th>
                                <th><?php  echo $totalHombres[$key] ?></th>
                                <th></th>
                            
                              </thead>
                            </tr>
                            <tr style="margin:auto; text-align:center"> 
                              <td>MUJERES  </td>
                              <td>TOTAL ALUMNOS </td>
                              <td>HOMBRES</td>
                            </tr>
                          </table>
                          <div class="d-grid">
                            <a href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/"."grupos"."/".$value["grado"]?>" class="btn btn-outline-primary mt-4"><i data-feather="eye"></i> Ver grupos</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <?php } ?>
                   
                    

                  </div>
              
              </div>
            </div>
					</div>
				</div>









<!-- <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">

        <?php


                                          $tabla = "grados"; 
                                          $get = $url[1];
                                          $grados = nivelesCtr::consultarGradosCtr($tabla, $get);
                                       foreach ($grados as $key => $value) {
                                            echo '
                                    
                                            <a class="nivelesCard col-md-3 grid-margin stretch-card" href="'.$rutaLocal.$url[0]."/".$url[1]."/".$value["grado"].'" >
                                              <div class="card">
                                                <div class="card-body nivelesCardHover">
                                              
                                                  <div class="d-flex justify-content-start align-items-center">
                                                  <img style="width:40px; display:inline-block; margin-right: 20px" src="'.$rutaLocal.'Views/images/activos.png" alt="generacion">
                                                  <h6 class="card-title mb-0">'.$value["nombre_grado"].'</h6>
                                                  </div>
                                                                                
                                                  
                                                </div>
                                              </div>
                                              </a>
                                                         ';
                                  
                                }
            ?>


              </div>
            </div>
        </div> 
 -->
