


<!-- CONSULTAR E INSERTAR CALIFICACIONES -->

<div class="page-content">
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
              <nav class="page-breadcrumb">
              <ol class="breadcrumb">

           
             
              <?php if($url[7] != 4 ) { ?>
                <li class="breadcrumb-item"><a href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5] ?>">Acciones</a></li>
              <li class="breadcrumb-item active" aria-current="page">CALIFICACIONES <b><?php echo mb_strtoupper("DEL ".$url[7]."° PERIODO DE ".$url[3]."° DE ".str_replace("-"," ",$url[0])). " - GENERACIÓN ".$url[2]?></b></li>
             
              <?php }else{ ?>
                <li class="breadcrumb-item"><a href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/".$url[6]."/1" ?>">Atrás</a></li>
                <li class="breadcrumb-item active" aria-current="page">CALIFICACIONES <b><?php echo mb_strtoupper("FINALES DE ".$url[3]."° DE ".str_replace("-"," ",$url[0])). " - GENERACIÓN ".$url[2]?></b></li>
              
                <?php } ?>
            
            </ol>
             </nav>
          </div>


       <div class="d-flex align-items-center flex-wrap text-nowrap">
          <a type="button" href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/"."inscribir-alumno" ?>" class="btn btn-primary btn-icon-text me-2 mb-2 mb-md-0 "><i class="link-icon mr-2" data-feather="eye"></i> Inscribir alumno</a>
          <a type="button" href=""<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/"."ver-alumnos" ?>" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0 "><i class="link-icon mr-2" data-feather="eye"></i> Ver alumnos</a>
 
        </div>


      </div>

 


      <?php if($url[7] != 4){ ?>



      <div class="row">
					<div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                    <h6 class="card-title">CALIFICACIONES</h6>
                    <?php
                             $tabla ="periodos";
                             $periodos = nivelesCtr::consultarPeriodosCtr($tabla);
                                foreach ($periodos as $key => $value) {
                                    if($url[7] == $value["Id"]){
                                        echo '
                                        <div class="btn-group" role="group mb-4" aria-label="Basic example">
                                        <a class="btn bg-secondary text-white"  type="button" href="'.$rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/".$url[6]."/".$value["Id"].'">'.$value["Periodos"].'</a>
                                        </div>';
                                    }else{
                                        echo '
                                        <div class="btn-group" role="group mb-4" aria-label="Basic example">
                                        <a class="btn btn btn-outline-secondary"  type="button" href="'.$rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/".$url[6]."/".$value["Id"].'">'.$value["Periodos"].'</a>
                                        </div>';
                                    }
                                  
                                }
                            ?>

                    
               <div class="row">
                
                    <?php 
                        $nivel= $url[1];
                        $grado= $url[3];
                        $materias = materiasCtr::consultarMateriasCalificacionesCtr($nivel, $grado);

                    ?>

                    <div class="col-12 col-xl-12  stretch-card mt-4">
                            <div class="row flex-grow-1">

                            <?php
                             foreach ($materias as $key => $value) {
                              $calificacion = calificacionCtr::consultarCalificacionesMateriaCtr($value["Id"], $url[7]);

                                echo '<div class="col-md-4 col-12">';
                                if(empty($calificacion["id_materia"]) && empty($calificacion["id_alumno"]) && empty($calificacion["id_periodo"]) ){
                                  echo '
                                  <a type="button" class="cuatrimestreCalificaciones grid-margin stretch-card materiaCalificacion" 
                                  materiaCalificacionId="'.$value["Id"].'"  
                                  materiaCalificacionNombre="'.$value["Nombre"].'"  
                                  materiaCalificacionProfesor="'.$value["Id_profesor"].'"  

                                  data-bs-toggle="modal" data-bs-target="#calificacionAlumno">
                                  <div class="card cuatrimestreHover shadow-sm">
                                      <div class="card-body">
                                      <div class="d-flex justify-content-start align-items-center">
                                      <img style="width:40px; display:inline-block; margin-right: 20px" src="'.$rutaLocal.'Views/images/user-materia.png" alt="user-materias">
                                      <h6 class="card-title mb-0">'.$value["Nombre"].'</h6>
                                      </div>
                                                                      
                                     
                                      </div>
                                  </div>
                                  </a>
                               ';
                                }else{
                                    // Si el id de la materia en la calificación ya tiene la calificación, entonces editamos
                                  echo '
                                  <a href="'.$rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/".$url[6]."/".$url[7]."/".$value["Id"].'" type="button"  class="cuatrimestreCalificaciones grid-margin stretch-card materiaCalificacionEditar" 
                                  idMateriaCalificacionEditar="'.$calificacion["id_materia"].'"  
                                  nivelCalificacionEditar="'.$calificacion["id_nivel"].'"  
                                  gradoCalificacionEditar="'.$calificacion["id_grado"].'"  
                                  periodoCalificacionEditar="'.$calificacion["id_periodo"].'"  
                                  materiaCalificacionNombreEditar="'.$value["Nombre"].'"  
                                  materiaCalificacionProfesorE ="'.$value["Id_profesor"].'" 

                                  
                                  >
                                  <div class="card shadow-sm cuatrimestrEditareHover">
                                      <div class="card-body">
                                      <button  style="position: absolute; top:0; right:0"
                                      
                                      type="button"  class="btn btn-warning btn-icon">
                                      <i data-feather="edit-2"></i>
                                      </button>
                                      <div class="d-flex justify-content-start align-items-center">
                                      <img style="width:40px; display:inline-block; margin-right: 20px" src="'.$rutaLocal.'Views/images/user-materia.png" alt="user-materias">
                                          <h6 class="card-title mb-0 w-75">'.$value["Nombre"].'</h6>
                                      </div>
                                                                      
                                     
                                      </div>
                                  </div>
                                  </a>
                                

                               ';
                                }

                              echo '</div>';
                            }
                            
                            ?>


                  </div>
                        </div>


                        <div class="col-12 col-xl-12"  style="overflow-x: auto">
                            <div class="row flew-grow-1">
                            <div class="table-responsive card">
                <table class="table table-hover table-bordered table-responsive " id="table1" style="font-size: 13px;">

                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Matricula</th>
                        <th>Nombre</th>
                        <?php
                            $nivel= $url[1];
                            $grado= $url[3];
                            $materias = materiasCtr::consultarMateriasCalificacionesCtr($nivel, $grado);
                            foreach ($materias as $key => $value) {
                                echo '  <th>'.$value["Nombre"].'</th>';
                            }
                        ?>



                        <th>PROMEDIO</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                                 
                            <?php 
                                $suma = 0;
                                $tabla = "cedula";
                                $id_nivel = $url[1];
                                $id_grado = $url[3];
                                $grupo = $url[5];
                                $generacion = $url[2];
                                $status = "ACTIVO";
                                  $cedula = alumnosCtr::consultarAlumnosNivelGradoGrupoGeneracionStatusCtr($tabla, $id_nivel,  $id_grado, $grupo, $generacion, $status);
                                    foreach ($cedula as $key => $alumno) {


                                        echo '
                                            <tr>
                                    
                                            <td>'.($key+1).'</td>
                                            <td>'.$alumno["Matricula"].'</td>
                                            <td>'.$alumno["ApellidoP"]. " ". $alumno["ApellidoM"]." ".$alumno["Nombre"].'</td>';    

                                            foreach ($materias as $key => $materia) {
                                                    $calificacion = calificacionCtr::consultarCalificacionesCtr($alumno["Id"], $materia["Id"], $url[1], $url[3],$url[5], $url[7]);

                                                 
                                                    $sumatorias = calificacionCtr::sumatoriaPeriodoCtr($alumno["Id"], $url[7]);
                                                    $promedio = Funciones::promedio(($sumatorias["suma"]/count($materias)));

                                                    if(!empty($calificacion["calificacion"])){
                                                  

                                                        echo '<td class="text-center">'.$calificacion["calificacion"].'</td>';
                                                    }else{
                                                        echo '<td class="text-center" style="background: #f7f7f7">0</td>';
                                                    }




                                                  
                                            }
                                              
                                            if(!empty($promedio)){
                                              echo '<td class="text-center font-weight-bold" style="background: #f7f7f7; font-wight: bold">'.$promedio.'</td>';
                                            }else{
                                              echo '<td class="text-center " style="background: #f7f7f7; font-wight: bold">0</td>';
                                            }
                                              

                                              
                                              
                                              echo '<td>    
                                              <form method="POST" target="_blank">
                                              <button data-bs-toggle="tooltip" data-bs-placement="top" title="Evaluación por periodo" type="submit" name="evaluacionPeriodo" class="btn btn-info btn-icon descargarAlumno">
                                                <i data-feather="download-cloud"></i>
                                               </button>
                                               <input type="hidden" name="cedulaId" value="'.$alumno["Id"].'">
                                               </form>
                                          
                                            </td>
                                         
                                            </tr>
                                            ';

                                          
                                    }

                                      $evualuacion = new formatosCtr();
                                      $evualuacion  -> formatoCtr();
                            
                            ?>

                    </tbody>
                  </table>
                  
                 
                  </div>
                            </div>

                        </div>



                    </div>


             
                </div>

      
</div>
</div>
</div>



<!-- Modal INSERTAR-->
<div  class="modal fade" data-backdrop="static" data-keyboard="false" id="calificacionAlumno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-xl" >
    <div class="modal-content" >
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel"><span class="nombreMateria"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        
      <form id="formCalificacion" method="POST">       
        <input type="hidden" name="idMateriaCalificacion" class="idMateriaCalificacion">                  
        <input type="hidden" name="idProfesorCalificacion" class="idProfesorCalificacion">   
         <div class="row">

         <table class="table table-hover table-bordered table-responsive " id="table1" style="font-size: 13px;">

            <thead>
              <tr>
                <th >#</th>

                <th style="width:20px">Primer Apellido</th>
                <th style="width:20px">Segundo Apellido</th>
                <th style="width:20px">Nombre</th>
                <th>Calificación</th>
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
                
                        <td class="text-center">'.($key+1).'</td>
                        <td>'.$value["ApellidoP"].'</td>   
                        <td>'.$value["ApellidoM"].'</td>
                        <td>'.$value["Nombre"].'</td>';    


                                    echo '<td>
                                    <input placeholder="Calificación de 5 a 10" class="form-control" name="calificacion['.$value["Id"].']"  type="text">
                                    </td>
                                    ';

                                

                                                         
                          echo '
                        </tr>
                        ';

                      
                }
        
                ?>

          </tbody>
          </table>
       


      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cerrarCalificacion" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary actualizarCalificacion">Guardar cambios</button>
      </div>
                <?php
                  $calificacion = new calificacionCtr();
                  $calificacion -> insertarCalificacionesCtr();
                ?>
      </form>
    </div>
  </div>
</div> 








<!-- Modal EDITAR-->
<div  class="modal fade" data-backdrop="static" data-keyboard="false" id="calificacionAlumnoEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-xl" >
    <div class="modal-content" >
      <div class="modal-header bg-secondary">
        <h5 class="modal-title text-white" id="exampleModalLabel"><span class="nombreMateriaE"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        
      <form id="formCalificacion" method="POST">       
        <input type="text" name="idMateriaCalificacionE" class="idMateriaCalificacionE">                  
        <input type="text" name="idProfesorCalificacionE" class="idProfesorCalificacionE">   
        <input type="text" name="periodoCalificacionE" class="periodoCalificacionE">   
        <input type="text" name="nivelCalificacionE" class="nivelCalificacionE">   
        <input type="text" name="gradoCalificacionE" class="gradoCalificacionE">   
         <div class="row">

         <table class="table table-hover table-bordered table-responsive " id="table1" style="font-size: 13px;">

            <thead>
              <tr>
                <th >#</th>

                <th style="width:20px">Primer Apellido</th>
                <th style="width:20px">Segundo Apellido</th>
                <th style="width:20px">Nombre</th>
                <th>Calificación</th>
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
                
                        <td class="text-center">'.($key+1).'</td>
                        <td>'.$value["ApellidoP"].'</td>   
                        <td>'.$value["ApellidoM"].'</td>
                        <td>'.$value["Nombre"].'</td>';    


                                    echo '<td>
                                    <input placeholder="Calificación de 5 a 10" class="form-control" name="calificacionE['.$value["Id"].']"  type="text">
                                    </td>
                                    ';

                                

                                                         
                          echo '
                        </tr>
                        ';

                      
                }
        
                ?>

          </tbody>
          </table>
       


      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cerrarCalificacionE" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary actualizarCalificacionE">Guardar cambios</button>
      </div>
                <?php
                  $calificacion = new calificacionCtr();
                  $calificacion -> actualizarCalificacionesCtr();
                ?>
      </form>
    </div>
  </div>
</div> 
 


<?php } else { ?>

  <!-- CALIFICACIONES FINALES -->
  
  
  <div class="col-12 col-xl-12"  style="overflow-x: auto">
                            <div class="row flew-grow-1">
                         
                <table class="table table-hover table-bordered table-responsive " id="table1" style="font-size: 13px;">

                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Matricula</th>
                        <th>Nombre</th>
                        <?php
                            $nivel= $url[1];
                            $grado= $url[3];
                            $materias = materiasCtr::consultarMateriasCalificacionesCtr($nivel, $grado);
                            foreach ($materias as $key => $value) {
                                echo '  <th>'.$value["Nombre"].'</th>';
                            }
                        ?>



                        <th>PROMEDIO FINAL</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                                 
                            <?php 
                                $suma = 0;
                                $tabla = "cedula";
                                $id_nivel = $url[1];
                                $id_grado = $url[3];
                                $grupo = $url[5];
                                $generacion = $url[2];
                                $status = "ACTIVO";
                                  $cedula = alumnosCtr::consultarAlumnosNivelGradoGrupoGeneracionStatusCtr($tabla, $id_nivel,  $id_grado, $grupo, $generacion, $status);
                                    foreach ($cedula as $key => $alumno) {


                                        echo '
                                            <tr>
                                    
                                            <td>'.($key+1).'</td>
                                            <td>'.$alumno["Matricula"].'</td>
                                            <td>'.$alumno["ApellidoP"]. " ". $alumno["ApellidoM"]." ".$alumno["Nombre"].'</td>';    

                                            foreach ($materias as $key => $materia) {
                                                    $calificacion = calificacionCtr::consultarCalificacionesPeriodosCtr($alumno["Id"], $materia["Id"], $url[1], $url[3],$url[5]);

                                                 
                                                    $sumatorias = calificacionCtr::sumatoriaPeriodosCtr($alumno["Id"], $materia["Id"]);
                                                    $promedio = calificacionCtr::sumatoriaFinalBasicaCtr($alumno["Id"]);


                                                    // $promedio1 = (Funciones::promedio(($promedio["suma"]/3)/count($materias)));

                                                
                                                    



                                                    if(!empty($calificacion["calificacion"])){
                                                  
                                                        echo '<td class="text-center">'.Funciones::promedio(($sumatorias["suma"]/3)).'</td>';
                                                    }else{
                                                        echo '<td class="text-center" style="background: #f7f7f7">0</td>';
                                                    }




                                                  
                                            }
                                              
                                            if(!empty($promedio)){
                                              echo '<td class="text-center font-weight-bold" style="background: #f7f7f7; font-wight: bold">'.Funciones::promedio(($promedio["suma"]/3)).'</td>';
                                            }else{
                                              echo '<td class="text-center " style="background: #f7f7f7; font-wight: bold">0</td>';
                                            }
                                              

                                              
                                              
                                              echo '<td>    
                                              <form method="POST" target="_blank">
                                              <button data-bs-toggle="tooltip" data-bs-placement="top" title="Evaluación final" type="submit" name="evaluacionPeriodo" class="btn btn-info btn-icon descargarAlumno">
                                                <i data-feather="download-cloud"></i>
                                               </button>
                                               <input type="hidden" name="cedulaId" value="'.$alumno["Id"].'">
                                               </form>
                                          
                                            </td>
                                         
                                            </tr>
                                            ';

                                          
                                    }

                                      $evualuacion = new formatosCtr();
                                      $evualuacion  -> formatoCtr();
                            
                            ?>

                    </tbody>
                  </table>
                  
                 
                  
                            </div>

                        </div>


  <?php } ?>


</div>