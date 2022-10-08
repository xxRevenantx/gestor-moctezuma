

<div class="page-content">
    <?php

                        $id = $url[8];
                        $materia = materiasCtr::consultarMateriaIdCtr($id);
    ?>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
              <nav class="page-breadcrumb">
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/".$url[6]."/".$url[7] ?>">...Atrás</a></li>
              <li class="breadcrumb-item active" aria-current="page"><b><?php echo mb_strtoupper($materia["Nombre"]).
              " - ".mb_strtoupper(str_replace("-"," ",$url[0])).
              " - ".mb_strtoupper(str_replace("-"," ",$url[4]))." ".$url[5].
              " - ".mb_strtoupper(str_replace("-"," ",$url[2]))
              ?></b></li>
              </ol>
             </nav>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
          <a type="button" href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/"."inscribir-alumno" ?>" class="btn btn-primary btn-icon-text me-2 mb-2 mb-md-0 "><i class="link-icon mr-2" data-feather="eye"></i> Inscribir alumno</a>
          <a type="button" href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/"."ver-alumnos" ?>" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0 "><i class="link-icon mr-2" data-feather="eye"></i> Ver alumnos</a>
 
        </div>
      </div>



      <div class="row">
					<div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                    <h6 class="card-title">Editar - <?php echo $materia["Nombre"]; ?></h6>

                    
               <div class="row">
                
                        <div class="col-12 col-xl-12"  style="overflow-x: auto">
                            <div class="row flew-grow-1">
                            <div class="table-responsive card">
                <form method="POST">
                <table class="table table-hover table-bordered table-responsive" style="font-size: 13px;">

                    <thead>
                      <tr>
                        <th style="width:10px">#</th>
                        <th style="width:20px">Matricula</th>
                        <th style="width:20px">Apellido Paterno</th>
                        <th style="width:20px">Apellido Materno</th>
                        <th style="width:20px">Nombre (s)</th>
                        <th>Calificacion</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                                 
                            <?php 
                                       $tabla = "cedula";
                                      $id_nivel = $url[1];
                                      $id_grado = $url[3];
                                      $grupo = $url[5];
                                      $generacion = $url[2];
                                      $status = "ACTIVO";
                                      $cedula = alumnosCtr::consultarAlumnosNivelGradoGrupoGeneracionStatusCtr($tabla, $id_nivel,  $id_grado, $grupo, $generacion, $status);
                                    foreach ($cedula as $key => $value) {

      
                                        echo '
                                            <tr>
                                    
                                            <td>'.($key+1).'</td>
                                            <td>'.$value["Matricula"].'</td>
                                            <td>'.$value["ApellidoP"].'</td>
                                            <td>'. $value["ApellidoM"].'</td>
                                            <td>'.$value["Nombre"].'</td>';    

                                            $calificacion = calificacionCtr::consultarCalificacionesCtr($value["Id"], $materia["Id"], $url[1], $url[3],$url[5], $url[7]);
                                        

                                                        echo '<td class="text-center">
                                                        <input class="form-control" type="text" name="actualizarCalificacion['.$value["Id"].']"
                                                         value="'.$calificacion["calificacion"].'">
                                                        </td>';
                                                    
                                                                             
                                              echo '
                                            </tr>
                                            
                                            ';

                                          
                                    }

                                    echo '<tr>
                                    <td colspan="5"></td>
                                    <td>
                                    <button name="botonActualizarCalificacion" style="width:200px" type="submit" class="form-control btn btn-secondary" >Actualizar calificaciones</button>
                                    </td>
                                    </tr>';
                            
                            ?>

                    </tbody>
                  </table>
                  <?php
                    $actualizarCalificacion = new calificacionCtr();
                    $actualizarCalificacion -> actualizarCalificacionesCtr();
                  ?>
                  
                  </form>
                  </div>
                            </div>

                        </div>



                    </div>


             
                </div>

      
</div>
</div>
</div>



</div>