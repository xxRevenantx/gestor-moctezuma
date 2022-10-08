<div class="page-content">

          <?php
          include 'Views/modules/componentes/breadcrum.php';
         ?>

          <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">

        <!-- <?php
                              $tabla = "grados"; 
                              $get = $url[1];
                              $grados = nivelesCtr::consultarGradosCtr($tabla, $get);
                            foreach ($grados as $key => $value) {
                                if($url[1] == 4){
                                if($value["grado"] == $url[3]){
                              ?>
                                <a
                            class="cuatrimestreCalificaciones col-md-2 grid-margin stretch-card"
                            href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/".$url[6]."/".$url[7]."/".$url[8] ?>">
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
                        
                        <?php }else{ ?>
                            <a
                            class="cuatrimestreCalificaciones col-md-2 grid-margin stretch-card"
                            href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$value["grado"]."/".$url[4]."/".$url[5]."/".$url[6]."/".$url[7]."/".$url[8] ?>">
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
                        
                        <?php }
                                
                            }else { 
                            if($value["grado"] == $url[3]){
                                ?>

                                <a
                            class="cuatrimestreCalificaciones col-md-2 grid-margin stretch-card"
                            href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/".$url[6] ?>">
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
                        
                        <?php }else{ ?>
                            <a
                            class="cuatrimestreCalificaciones col-md-2 grid-margin stretch-card"
                            href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$value["grado"]."/".$url[4]."/".$url[5]."/".$url[6]?>">
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
                        
                        <?php }
                        

                        }
                        
                            }?> -->
        


              </div>
            </div>
        </div> 




    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                <h6 class="card-title">HORARIOS</h6>
              
                                       <!-- TABLAA -->

                    <div class="row mt-4">

                            <form id="agregarHoras">
                        <div class="col-sm-8">

                        <div class="d-flex align-items-end">
                                    <div>
                                    <label class="form-label">Agregar horas</label>
                                     <input class="form-control" name="agregarHoras" placeholder="ejem: 7:00am - 8:00am" type="text">
                                     <input class="form-control" name="nivelHoras" readonly type="hidden" value="<?php echo $url[1]?>">
                                     <input class="form-control" name="gradoHoras" readonly type="hidden" value="<?php echo $url[3]?>">
                                     <input class="form-control" name="grupoHoras" readonly type="hidden" value="<?php echo $url[5]?>">
                                     </div>
                                     <button class="btn btn-outline-primary ml-3">Agregar horas</button>

                            </div>
                            </div>
                        </form>


                        <div class="col-12 float-right">
                            
                        <form method="POST">
                        <div class="row mt-2">



                            <div class="col-sm-4">
                                <div class="mb-3">
                                <label class="form-label">Nivel</label>
                                <?php
                                $niveles = nivelesCtr::consultarNivelesIdCtr($url[1]);
                                     echo '  
                                     <input class="form-control" name="NivelHorario" readonly type="text" value="'.$niveles["nivelM"].'">
                                     <input class="form-control" name="NivelHorarioId" readonly type="hidden" value="'.$niveles["Id"].'">
                                     
                                     ';
                                ?>
                              
                                   
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Grado</label>
                                    <?php
                                    echo '<input class="form-control" name="gradosHorario" readonly type="text" value="'.$url[3].'">';

                                   
                                ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                <label class="form-label">Grupo</label>
                                <input class="form-control" name="grupoHorario" readonly type="text" value="<?php echo $url[5]?>">
                                </div>
                            </div>
                            <!-- Col -->
                        </div>
                        <!-- Row -->
                      
                           <?php include 'Views/modules/formularios/dias-semana.php';?>
                        

                        <button type="submit" class="btn btn-primary submit">Agregar</button>
                    </form>
                                    <?php
                                        $horario = new horariosCtr;
                                        $horario -> insertarHorarioCtr();
                                    ?>
                        </div>
                    </div>    


                    
                    
                    <div class="table-responsive mt-5">
                
                        <table class="table table-hover table-bordered table-striped" id="horarios">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hora</th>
                                   <?php
                                   $dias = horariosCtr::consultarHorarioDiasCtr();
                                        foreach ($dias as $key => $dia) {
                                           echo '<th>'.$dia["dia"].'</th>';
                                        }
                                   ?>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        // $tabla = "horarios";
                                        // $horarios =  horariosCtr::consultarHorarioCtr($tabla, $url[1], $url[3], $url[4], $dia["Id"]);
                                        $nivel = $url[1];
                                        $grado = $url[3];
                                        $grupo = $url[5];
                                        $horas = horariosCtr::consultarHorasCtr($nivel, $grado, $grupo);
                                        foreach ($horas as $key => $hora) {
                                            echo '
                                                <tr idHorario="'.$hora["Id"].'">
                                                    <td>'.($key+1).'</td>
                                                    <td>'.$hora["horas"].'</td> ';

                                            
                                        $dias = horariosCtr::consultarHorarioDiasCtr();
                                        foreach ($dias as $key => $dia) {
                                        $tabla = "horarios";
                                        $horarios =  horariosCtr::consultarHorarioCtr($tabla, $dia["Id"],$url[1], $url[3], $url[5], $hora["Id"]);


                                        if(!empty($horarios["materia"])){
                                            $materia = materiasCtr::consultarMateriaIdCtr($horarios["materia"]);
                                            echo '<td>'.$materia["Nombre"].'</td>';
                                            
                                        }else{
                                            echo '<td>---</td>';
                                        } 
                            
                                        }


                                     echo '
                                     <td>
                                            

                                                   
                                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Eliminar horario" type="button" class="btn btn-danger btn-icon eliminarHorario">
                                                    <i data-feather="trash-2"></i>
                                                </button>

                                     </td>
                                     
                                     </tr>';
                                            
                                           



                                         }
                                        
                                    ?>

                            </tbody>
                        </table>
                          

                        <div class="d-flex  align-items justify-content-between">
                        <form method="POST" target="_blank" class="mt-4">
                        <button type="submit" name="verHorario" class="btn btn-outline-info">Ver horario</button>
                        </form>
                            
                        <button title="Editar horario" data-bs-toggle="modal" data-bs-target="#editarHorarioModal"  
                                 type="button" class="btn btn-warning editarHorario mt-4">
                                 <i data-feather="edit-2"></i>  Editar
                        </button>

                        </div>
                        
                        
                        <?php 
                        $horario = new formatosCtr();
                        $horario -> formatoCtr(); //  horarioFormatoCtr::verHorarioCtr();
                        
                        ?>

                    </div>

                </div>
            </div>
        </div>
    </div>



    
<!-- Modal -->
<div class="modal fade " id="editarHorarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Editar horario  #<span class="noIdHorario"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        
      <form method="POST" id="formHorariosEditar">  
            
      <div class="table-responsive mt-5">
<table class="table table-hover table-bordered table-striped" id="horarios">

<?php

$tabla = "horarios";
$nivel = $url[1];
$grado = $url[3];
$grupo = $url[5];

$horario = horariosCtr:: consultarHorarioFetchAllCtr($tabla,$nivel, $grado, $grupo);

?>
<thead>
    <tr>
        <th>#</th>
        <th>Hora</th>
        <?php
                        $dias = horariosCtr::consultarHorarioDiasCtr();
                        foreach ($dias as $key => $dia) {
                        echo '<th>'.$dia["dia"].'</th>';
                   }
          ?>
    </tr>
</thead>
<tbody >
    <?php
    $nivel = $url[1];
    $grado = $url[3];
    $grupo = $url[5];
    $horas = horariosCtr::consultarHorasCtr($nivel, $grado, $grupo);
    foreach ($horas as $key => $hora) {

        echo '
            <tr idHorario="'.$hora["Id"].'">
                <td>'.($key+1).'</td>
                <td>
                <input value="'.$hora["horas"].'" type="text" class="form-control">
                </td> ';

                $dias = horariosCtr::consultarHorarioDiasCtr();
                foreach ($dias as $key => $dia) {
                $tabla = "horarios";

            
                $h =  horariosCtr::consultarHorarioCtr($tabla, $dia["Id"],$url[1], $url[3], $url[5], $hora["Id"]);

                if(!empty($h["materia"])){
                echo '<td>';

                    echo '<select class="form-select actualizarMateriaHorarios" name="actualizarHorarios['.$h["Id"].']" data-width="100%" >';   
                    $materia = materiasCtr::consultarMateriaIdCtr($h["materia"]);

                
                    echo '<option value="'.$h["profesor"].",".$materia["Id"].'">'.$materia["Nombre"].'</option>';
                        


           
                                              
                    $nivel = $url[1];
                    $grado = $url[3];
                    $materias = materiasCtr::consultarMateriasCtr($nivel, $grado);
                        foreach ($materias as $key => $value) {

                           
                            
                            $profesor = profesoresCtr::consultarProfesorIdCtr($value["Id_profesor"]);
                          
                            echo '
                            <option value="'.$profesor["Id"].",".$value["Id"].'">'.$value["Nombre"].'</option>
                            ';
                        }   
                        
                       
                    echo '</select>';


                    echo '</td>';

                }
            }

                
            echo '</tr>';

    }

 
    ?>

   
    
</tbody>
    </table>
            
</div>
            
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cerrarHorario" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" name="actualizarHorarioMateria" class="btn btn-primary actualizarHorarioMateria">Guardar cambios</button>
      </div>
      
      <?php
      
      $actualizar = new horariosCtr();
      $actualizar -> actualizarHorariosMateriasCtr();
      ?>
      </form>
    </div>
  </div>
</div> 


</div>