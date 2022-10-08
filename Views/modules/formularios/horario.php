<div class="page-content">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
              <nav class="page-breadcrumb">
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]?>">Acciones</a></li>
              <li class="breadcrumb-item active" aria-current="page">HORARIOS <b><?php echo mb_strtoupper("DEL ".$url[1]."° CUATRIMESTRE DE LA ".str_replace("-"," ",$url[0])). " - GENERACIÓN ".$url[2]?></b></li>
              </ol>
             </nav>
             </div>
             <div class="d-flex align-items-center flex-wrap text-nowrap">
               <a type="button" href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/"."inscribir-alumno" ?>" class="btn btn-primary btn-icon-text me-2 mb-2 mb-md-0 "><i class="link-icon mr-2" data-feather="user-plus"></i> Inscribir alumno</a>
            <a type="button" href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/"."ver-alumnos" ?>" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0 "><i class="link-icon mr-2" data-feather="eye"></i> Ver alumnos</a>
            </div>
           
          </div>

          <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">

        <?php
                            $ruta = $url[1] ;
                            $generaciones = generacionesCtr::consultarGeneracionesLicenciaturaCtr($ruta);
                                foreach ($generaciones as $key => $value) {
                                        
                                        if($value["generacion"] == $url[2]){
                                            echo '
                                    
                                            <a class="cuatrimestreCalificaciones col-md-3 grid-margin stretch-card" href="'.$rutaLocal.$url[0]."/".$url[1]."/".$value["generacion"]."/horarios/".$url[4].'" >
                                              <div class="card cuatrimestreHover bg-info text-white">
                                                <div class="card-body">
                                              
                                                  <div class="d-flex justify-content-start align-items-center">
                                                  <img style="width:40px; display:inline-block; margin-right: 20px" src="'.$rutaLocal.'Views/images/generacion.png" alt="generacion">
                                                  <h6 class="card-title mb-0">'.$value["generacion"].'</h6>
                                                  </div>
                                                                                
                                                  
                                                </div>
                                              </div>
                                              </a>
                                         
                    
                                                         ';
                                        }else{
                                            echo '
                                    
                                            <a class="cuatrimestreCalificaciones col-md-3 grid-margin stretch-card" href="'.$rutaLocal.$url[0]."/".$url[1]."/".$value["generacion"]."/horarios/".$url[4].'"  >
                                              <div class="card cuatrimestreHover">
                                                <div class="card-body">
                                              
                                                  <div class="d-flex justify-content-start align-items-center">
                                                  <img style="width:40px; display:inline-block; margin-right: 20px" src="'.$rutaLocal.'Views/images/generacion.png" alt="generacion">
                                                  <h6 class="card-title mb-0">'.$value["generacion"].'</h6>
                                                  </div>
                                                                                
                                                  
                                                </div>
                                              </div>
                                              </a>
                                         
                    
                                                         ';
                                        }
                                  
                                }
            ?>


              </div>
            </div>
        </div> 




    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                <h6 class="card-title">HORARIyyyOS</h6>
              
                            <?php
                            $tabla = "cuatrimestres";
                            $id = $url[1];
                            $cuatrimestres = materiasCtr::consultarCuatrimestresCtr($tabla, $id);
                                foreach ($cuatrimestres as $key => $value) {
                                    if($url[4] == $value["no_cuatrimestre"]){
                                        echo '
                                        <div class="btn-group" role="group mb-4" aria-label="Basic example">
                                        <a class="btn bg-secondary text-white"  type="button" href="'.$rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$value["no_cuatrimestre"].'">'.$value["Cuatrimestre"].'</a>
                                        </div>';
                                    }else{
                                        echo '
                                        <div class="btn-group" role="group mb-4" aria-label="Basic example">
                                        <a class="btn btn btn-outline-secondary"  type="button" href="'.$rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$value["no_cuatrimestre"].'">'.$value["Cuatrimestre"].'</a>
                                        </div>';
                                    }
                                  
                                }
                            ?>

                    <form method="POST">
                        <div class="row mt-2">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                <label class="form-label">Licenciatura</label>
                                <?php
                                $licenciaturas = licenciaturasCtr::consultarLicenciaturaIdCtr($url[1]); 
                                     echo '  <input class="form-control" name="licenciaturaHorario" readonly type="text" value="'.$licenciaturas["Carrera"].'">';
                                ?>
                              
                                   
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Cuatrimestre</label>
                                    <?php
                                      $tabla = null;
                                      $id_licenciatura =  $url[1];
                                      $no_cuatrimestre =  $url[4];
                                      $cuatrimestres = materiasCtr::consultarCuatrimestresIdCtr($tabla, $id_licenciatura, $no_cuatrimestre); 

                                    echo '<input class="form-control" name="cuatrimestresHorario" readonly type="text" value="'.$cuatrimestres["Cuatrimestre"].'">';

                                   
                                ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                <label class="form-label">Modalidad</label>
                                <select class="js-example-basic-single form-select" name="modalidadHorario" data-width="100%">
                                    <?php
                                        $turno = alumnosCtr::seleccionarTurnoCtr();
                                        foreach ($turno as $key => $value) {
                                            echo '
                                            <option value="'.$value["turno"].'">'.$value["turno"].'</option>
                                            ';
                                        }
                                    ?>
                                </select>

                                   
                                  
                                </div>
                            </div>
                            <!-- Col -->
                        </div>
                        <!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                <label class="form-label">Hora</label>
                                <select class="js-example-basic-single form-select" name="horaHorario" data-width="100%">
                                <?php
                                $horas = horariosCtr::consultarHorasCtr(); 
                                    foreach ($horas as $key => $value) {
                                        echo '
                                        <option value="'.$value["horas"].'">'.$value["horas"].'</option>
                                        ';
                                    }
                                  
                                ?>
                                    </select>
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                <label class="form-label">Materia</label>
                                <select class="js-example-basic-single form-select" name="materiaHorario" data-width="100%">
                                <option value="">...</option>
                                <option value="RECESO">RECESO</option>
                                <?php
                                $tabla ="materias";
                                $id_licenciatura =  $url[1];
                                $no_cuatrimestre =  $url[4];
                                $materias = materiasCtr::consultarMateriasCuatriIdCtr($tabla, $id_licenciatura, $no_cuatrimestre); 
                                    foreach ($materias as $key => $value) {
                                        echo '
                                        <option value="'.mb_strtoupper($value["Clave"]." - ".$value["Nombre"]).'">'.mb_strtoupper($value["Clave"]." - ".$value["Nombre"]).'</option>
                                        ';
                                    }
                                  
                                ?>
                                    </select>
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                <label class="form-label">Profesor</label>
                                <select class="js-example-basic-single form-select" name="profesorHorario" data-width="100%">
                                <option value="">...</option>
                                <?php
                                $profesor = profesoresCtr::consultarProfesorCtr(); 
                                    foreach ($profesor as $key => $value) {
                                        echo '
                                        <option value="'.mb_strtoupper($value["Titulo"]."".$value["Nombre"]." ".$value["PrimerApellido"]." ".$value["SegundoApellido"]).'">'.mb_strtoupper($value["Titulo"]." ".$value["Nombre"]." ".$value["PrimerApellido"]." ".$value["SegundoApellido"]." - ". $value["Perfil"]).'</option>';
                                    }
                                  
                                ?>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="no_cuatrimestreHorario" value="<?php echo $url[4] ?>">
                            <input type="hidden" name="id_licenciaturaHorario" value="<?php echo $url[1] ?>">
                            <!-- Col -->
                        </div>

                        <button type="submit" class="btn btn-primary submit">Agregar</button>
                    </form>
                                    <?php
                                        $horario = new horariosCtr;
                                        $horario -> insertarHorarioCtr();
                                    ?>

                                       <!-- TABLAA -->

                    <div class="row mt-4">
                        <div class="col-12 float-right">
                        <form method="POST" target="_blank">
                        <button type="submit" name="verHorario" class="btn btn-outline-info">Ver horario</button>
                        <input type="hidden" name="horarioLicenciatura" value="<?php echo $url[1] ?>">
                        <input type="hidden" name="horarioIdCuatrimestre" value="<?php echo $url[4] ?>">
                        </form>
                        <?php 
                        $horario = new formatosCtr();
                        $horario -> formatoCtr(); //  horarioFormatoCtr::verHorarioCtr();
                        
                        ?>
                        </div>
                    </div>    
                    
                    
                    <div class="table-responsive mt-5">
                        <table class="table table-hover table-bordered table-striped " id="horarios">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Folio</th>
                                    <th>Hora</th>
                                    <th>Materia</th>
                                    <th>Profesor</th>
                                    <th>Cuatrimestre</th>
                                    <th>Modalidad</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        $tabla = "horarios";
                                        $consultarHorario = horariosCtr::consultarHorarioCtr($tabla,$url[1], $url[2] ,$url[4]);

                                        foreach ($consultarHorario as $key => $value) {
                                           echo '<tr idHorario="'.$value["Id"].'">
                                                    <td>'.($key+1).'</td>
                                                    <td>'.$value["Id"].'</td>
                                                    <td>'.$value["hora"].'</td>
                                                    <td>'.$value["materia"].'</td>
                                                    <td>'.$value["profesor"].'</td>
                                                    <td>'.$value["cuatrimestre"].'</td>
                                                    <td>'.$value["modalidad"].'</td>
                                                    <td>
                                                 

                                                    <button title="Editar horario" data-bs-toggle="modal" data-bs-target="#editarHorarioModal"  
                                                    type="button" editarHorario="'.$value["Id"].'" class="btn btn-primary btn-icon editarHorario">
                                                    <i data-feather="edit-2"></i>
                                                    </button>
                                                       
                                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Eliminar horario" type="button" class="btn btn-danger btn-icon eliminarHorario">
                                                        <i data-feather="trash-2"></i>
                                                    </button>
                                                
                                                    </td>
                                           </tr>';
                                        }
                                    
                                    ?>

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>



    
<!-- Modal -->
<div class="modal fade " id="editarHorarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Editar horario Folio #<span class="noIdHorario"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        
      <form id="formHorarios">  
         <div class="row">
     
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                <label class="form-label">Licenciatura</label>
                                <?php
                                $licenciaturas = licenciaturasCtr::consultarLicenciaturaIdCtr($url[1]); 
                                     echo '  <input class="form-control" name="licenciaturaHorario" readonly type="text" value="'.$licenciaturas["Carrera"].'">';
                                ?>
                              
                                        <input type="hidden" name="idHorario" class="idHorario form-control">
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Cuatrimestre</label>
                                    <?php
                                      $tabla = null;
                                      $id_licenciatura =  $url[1];
                                      $no_cuatrimestre =  $url[4];
                                      $cuatrimestres = materiasCtr::consultarCuatrimestresIdCtr($tabla, $id_licenciatura, $no_cuatrimestre); 

                                    echo '<input class="form-control" name="cuatrimestresHorario" readonly type="text" value="'.$cuatrimestres["Cuatrimestre"].'">';

                                   
                                ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                <label class="form-label">Modalidad</label>
                                <select class="form-select modalidadHorarioE" name="modalidadHorarioE" data-width="100%">
                                    <?php
                                        $turno = alumnosCtr::seleccionarTurnoCtr();
                                        foreach ($turno as $key => $value) {
                                            echo '
                                            <option value="'.$value["turno"].'">'.$value["turno"].'</option>
                                            ';
                                        }
                                    ?>
                                </select>

                                   
                                  
                                </div>
                            </div>
                            <!-- Col -->
                        </div>
                        <!-- Row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                <label class="form-label">Hora</label>
                                <select class="form-select horaHorarioE" name="horaHorarioE" data-width="100%">
                                <?php
                                $horas = horariosCtr::consultarHorasCtr(); 
                                    foreach ($horas as $key => $value) {
                                        echo '
                                        <option value="'.$value["horas"].'">'.$value["horas"].'</option>
                                        ';
                                    }
                                  
                                ?>
                                    </select>
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-12">
                                <div class="mb-3">
                                <label class="form-label">Materia</label>
                                <select class="form-select materiaHorarioE" name="materiaHorarioE" data-width="100%">
                                <option value="">...</option>
                                <option value="RECESO">RECESO</option>
                                <?php
                                $tabla ="materias";
                                $id_licenciatura =  $url[1];
                                $no_cuatrimestre =  $url[4];
                                $materias = materiasCtr::consultarMateriasCuatriIdCtr($tabla, $id_licenciatura, $no_cuatrimestre); 
                                    foreach ($materias as $key => $value) {
                                        echo '
                                        <option value="'.mb_strtoupper($value["Clave"]." - ".$value["Nombre"]).'">'.mb_strtoupper($value["Clave"]." - ".$value["Nombre"]).'</option>
                                        ';
                                    }
                                  
                                ?>
                                    </select>
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-12">
                                <div class="mb-3">
                                <label class="form-label">Profesor</label>
                                <select class="form-select profesorHorarioE" name="profesorHorarioE" data-width="100%">
                                <option value="">...</option>
                                <?php
                                $profesor = profesoresCtr::consultarProfesorCtr(); 
                                    foreach ($profesor as $key => $value) {
                                        echo '
                                        <option value="'.mb_strtoupper($value["Titulo"]."".$value["Nombre"]." ".$value["PrimerApellido"]." ".$value["SegundoApellido"]).'">'.mb_strtoupper($value["Titulo"]." ".$value["Nombre"]." ".$value["PrimerApellido"]." ".$value["SegundoApellido"]." - ". $value["Perfil"]).'</option>';
                                    }
                                  
                                ?>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="no_cuatrimestreHorario" value="<?php echo $url[4] ?>">
                            <input type="hidden" name="id_licenciaturaHorario" value="<?php echo $url[1] ?>">
                            <!-- Col -->
                        </div>

                
      
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cerrarHorario" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary actualizarHorario">Guardar cambios</button>
      </div>
      </form>
    </div>
  </div>
</div> 


</div>