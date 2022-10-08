<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
              <nav class="page-breadcrumb">
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3] ?>">...Atrás</a></li>
            <li class="breadcrumb-item active" aria-current="page"> <b>SEMESTRES DE <?php echo $url[3]."° DE ".mb_strtoupper(str_replace("-"," ",$url[0]))?></b></li>
              </ol>
             </nav>
          </div>
      </div>

      <div class="row">

<?php

    $tabla = "grados"; 
    $get = $url[1];
    $grados = nivelesCtr::consultarGradosCtr($tabla, $get);
     foreach ($grados as $key => $value) {
        if($value["grado"] == $url[3]){

      ?>
      <a
     
    class="cuatrimestreCalificaciones col-md-2 grid-margin stretch-card"
    href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$value["grado"]."/".$url[4]."/".$url[5]."/".$url[6] ?>">
    <div class="card cuatrimestreHover bg-info text-white">
        <div class="card-body">
    
            <div class="d-flex justify-content-start align-items-center">
                <img
                    style="width:40px; display:inline-block; margin-right: 20px"
                    src="<?php echo $rutaLocal."Views/images/activos.png"?>"
                    alt="generacion">
                    <h6 class="card-title mb-0"><?php echo $value["nombre_grado"] ?></h6>
                </div>

            </div>
        </div>
    </a>

<?php 
}else{ ?>
    <a
    class="cuatrimestreCalificaciones col-md-2 grid-margin stretch-card"
    href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$value["grado"]."/".$url[4]."/".$url[5]."/".$url[6] ?>">
    <div class="card cuatrimestreHover">
        <div class="card-body">
            <div class="d-flex justify-content-start align-items-center">
                <img
                    style="width:40px; display:inline-block; margin-right: 20px"
                    src="<?php echo $rutaLocal."Views/images/activos.png"?>"
                    alt="generacion">
                    <h6 class="card-title mb-0"><?php echo $value["nombre_grado"] ?></h6>
                </div>

            </div>
        </div>
    </a>

<?php }}?>



</div>

      


      <div class="row">
					<div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <h3 class="text-center mb-3 mt-4">SEMESTRES DE <?php echo $url[3]."° DE ".mb_strtoupper(str_replace("-"," ",$url[0]))?></h3>
                <p class="text-muted text-center mb-4 pb-2">
                    Cada SEMESTRE cuenta con un total de alumnos dividido entre mujeres y hombres.
                </p>
           
                  <div class="row">

                    <?php

                       // Alumnos
                      $alumnos  = alumnosCtr::consultarAlumnosChartCtr();
                      $totalAlumnos = 0;
                      $totalMujeres = 0;
                      $totalHombres = 0;
                      $totalAlumnos2 = 0;
                      $totalMujeres2 = 0;
                      $totalHombres2 = 0;
                      $totalAlumnos3 = 0;
                      $totalMujeres3 = 0;
                      $totalHombres3 = 0;
                      $suma = 0;

                        $gruposArray = array("A","B","C","D","E", "F", "G");

                      foreach ($alumnos as $key => $value) {



                            // ALUMNOS
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == $url[3] && $value["Status"] == "ACTIVO" && $value["Generacion"] = $url[2] && $value["Grupo"] == "A" ){
                                  $totalAlumnos++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == $url[3] && $value["Status"] == "ACTIVO" && $value["Generacion"] = $url[2] && $value["Grupo"] == "A" && $value["Sexo"] == "FEMENINO" ){
                                  $totalMujeres++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == $url[3] && $value["Status"] == "ACTIVO" && $value["Generacion"] = $url[2] && $value["Grupo"] == "A" && $value["Sexo"] == "MASCULINO" ){
                                  $totalHombres++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == $url[3] && $value["Status"] == "ACTIVO" && $value["Generacion"] = $url[2] && $value["Grupo"] == "B" ){
                                  $totalAlumnos2++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == $url[3] && $value["Status"] == "ACTIVO" && $value["Generacion"] = $url[2] && $value["Grupo"] == "B" && $value["Sexo"] == "FEMENINO" ){
                                  $totalMujeres2++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == $url[3] && $value["Status"] == "ACTIVO" && $value["Generacion"] = $url[2] && $value["Grupo"] == "B" && $value["Sexo"] == "MASCULINO" ){
                                  $totalHombres2++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == $url[3] && $value["Status"] == "ACTIVO" && $value["Generacion"] = $url[2] && $value["Grupo"] == "C" ){
                                  $totalAlumnos3++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == $url[3] && $value["Status"] == "ACTIVO" && $value["Generacion"] = $url[2] && $value["Grupo"] == "C" && $value["Sexo"] == "FEMENINO" ){
                                  $totalMujeres3++;
                              }
                              if($value["id_nivel"] == $url[1] && $value["id_grado"] == $url[3] && $value["Status"] == "ACTIVO" && $value["Generacion"] = $url[2] && $value["Grupo"] == "C" && $value["Sexo"] == "MASCULINO" ){
                                  $totalHombres3++;
                              }

                            
                        }

                        $totalAlumnosNivel = array($totalAlumnos, $totalAlumnos2, $totalAlumnos3);
                        $totalAlumnosMujeres = array($totalMujeres, $totalMujeres2, $totalMujeres3);
                        $totalAlumnosHombres = array($totalHombres, $totalHombres2, $totalHombres3);

                        $tabla  = "semestres_bachillerato";
                        $nivel = $url[1];
                        $grado = $url[3];
                        $semestres = nivelesCtr::seleccionarSemestresCtr($tabla, $nivel, $grado);
                         foreach ($semestres as $key => $value) {
                          ?>

                    <div class="col-md-4 stretch-card grid-margin m-auto grid-margin-md-0">
                      <div class="card cardNiveles mb-3">
                        <div class="card-body">
                          <h4 class="text-center mt-3 mb-4"><?php echo $value["semestre"]?></h4>
                          <img style="width: 120px;display:block; margin:auto" src="<?php echo $rutaLocal.'Views/images/grupos.png' ?>">
                        
                          <table class="mx-auto mt-4 w-100 m-auto" style="font-size: 15px">
                            <tr style="margin:auto; text-align:center"> 
                              <thead  style="margin:auto; text-align:center">
                             
                                <th><?php  echo $totalAlumnosMujeres[$key] ?></th>
                                <th><?php  echo $totalAlumnosNivel[$key] ?></th>
                                <th><?php  echo $totalAlumnosHombres[$key] ?></th>
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
                            <?php 
                            
                            if($url[1] != 4){?>
                              
                              <a href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/grupo/".$value["grupo"]?>" class="btn btn-outline-primary mt-4"><i data-feather="eye"></i> Acciones</a>
                        
                          <?php } 
                          
                          else {
                            ?>
                            
                            <a href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/".$url[6]."/".$value["no_semestre"] ?>" class="btn btn-outline-primary mt-4"><i data-feather="eye"></i> Acciones</a>
                        
                          <?php } ?>
                        
                          
                        
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



</div> 