
<div class="page-content">
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">...</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo mb_strtoupper(str_replace("-"," ",$url[0]))?></li>
    </ol>
</nav>


<div class="row">
					<div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <h3 class="text-center mb-3 mt-4">NIVELES DEL CENTRO UNIVERSITARIO MOCTEZUMA</h3>
                <p class="text-muted text-center mb-4 pb-2">
                    Cada nivel cuenta con un total de alumnos dividido entre mujeres y hombres.
                </p>
           
                  <div class="row">

                    <?php
                        $id = null;
                        $niveles = nivelesCtr::consultarNivelesIdCtr($id);

                        // Alumnos
                        $alumnos  = alumnosCtr::consultarAlumnosChartCtr();
                        $preescolar = 0;
                        $primaria = 0;
                        $secundaria = 0;
                        $bachillerato = 0;

                        $preescolarMujeres = 0;
                        $primariaMujeres = 0;
                        $secundariaMujeres = 0;
                        $bachilleratoMujeres = 0;

                        $preescolarHombres = 0;
                        $primariaHombres = 0;
                        $secundariaHombres = 0;
                        $bachilleratoHombres = 0;

                        foreach ($alumnos as $key => $value) {
                                if($value["id_nivel"] == 1 && $value["Status"] == "ACTIVO"){
                                    $preescolar++;
                                }
                                if($value["id_nivel"] == 2 && $value["Status"] == "ACTIVO"){
                                    $primaria++;
                                }
                                if($value["id_nivel"] == 3 && $value["Status"] == "ACTIVO"){
                                    $secundaria++;
                                }
                                if($value["id_nivel"] == 4 && $value["Status"] == "ACTIVO"){
                                    $bachillerato++;
                                }

                                if($value["id_nivel"] == 1 && $value["Status"] == "ACTIVO" && $value["Sexo"] == "FEMENINO"){
                                    $preescolarMujeres++;
                                }
                                if($value["id_nivel"] == 2 && $value["Status"] == "ACTIVO" && $value["Sexo"] == "FEMENINO"){
                                    $primariaMujeres++;
                                }
                                if($value["id_nivel"] == 3 && $value["Status"] == "ACTIVO" && $value["Sexo"] == "FEMENINO"){
                                    $secundariaMujeres++;
                                }
                                if($value["id_nivel"] == 4 && $value["Status"] == "ACTIVO" && $value["Sexo"] == "FEMENINO"){
                                    $bachilleratoMujeres++;
                                }

                                if($value["id_nivel"] == 1 && $value["Status"] == "ACTIVO" && $value["Sexo"] == "MASCULINO"){
                                    $preescolarHombres++;
                                }
                                if($value["id_nivel"] == 2 && $value["Status"] == "ACTIVO" && $value["Sexo"] == "MASCULINO"){
                                    $primariaHombres++;
                                }
                                if($value["id_nivel"] == 3 && $value["Status"] == "ACTIVO" && $value["Sexo"] == "MASCULINO"){
                                    $secundariaHombres++;
                                }
                                if($value["id_nivel"] == 4 && $value["Status"] == "ACTIVO" && $value["Sexo"] == "MASCULINO"){
                                    $bachilleratoHombres++;
                                }



                        }

                        $alumnosTotales = array($preescolar, $primaria, $secundaria, $bachillerato);
                        $alumnosMujeres = array($preescolarMujeres, $primariaMujeres, $secundariaMujeres, $bachilleratoMujeres);
                        $alumnosHombres = array($preescolarHombres, $primariaHombres, $secundariaHombres, $bachilleratoHombres);


                        foreach ($niveles as $key => $value) {?>

                    <div class="col-md-3 stretch-card grid-margin grid-margin-md-0">
                      <div class="card cardNiveles">
                        <div class="card-body">
                          <h4 class="text-center mt-3 mb-4"><?php echo $value["nivel"] ?></h4>
                          <img style="width: 120px;display:block; margin:auto" src="<?php echo $rutaLocal."Views/images/".$value["ruta"].".png"?>">
                        
                          <table class="mx-auto mt-4 w-100 m-auto" style="font-size: 15px">
                            <tr style="margin:auto; text-align:center"> 
                              <thead  style="margin:auto; text-align:center">
                                <th><?php echo $alumnosMujeres[$key]?></th>
                                <th><?php echo $alumnosTotales[$key]?></th>
                                <th><?php echo $alumnosHombres[$key]?></th>
                              </thead>
                            </tr>
                            <tr style="margin:auto; text-align:center"> 
                              <td>MUJERES  </td>
                              <td>TOTAL ALUMNOS </td>
                              <td>HOMBRES</td>
                            </tr>
                          </table>
                          <div class="d-grid">
                            <a href="<?php echo $rutaLocal.$value["ruta"]."/".$value["Id"] ?>" class="btn btn-outline-<?php echo $value["bg"]?> mt-4"><i data-feather="eye"></i> Ver grados</a>
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
        
</div>

