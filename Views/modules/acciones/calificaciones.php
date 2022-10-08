<div class="page-content">
    

          <?php
          include 'Views/modules/componentes/breadcrum.php';
         ?>
       

      <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">

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
                              <h6 class="card-title mb-0"><?php echo  $value["nombre_grado"] ?></h6>
                          </div>

                      </div>
                  </div>
              </a>

              <?php 
              }else{ ?>
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

              <?php }}?>



              </div>
            </div>
        </div> 






      <div class="row">
					<div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                    <h6 class="card-title">CALIFICACIONES</h6>

                    <?php
                             $tabla="periodos";
                             $periodos = nivelesCtr::consultarPeriodosCtr($tabla);
                                foreach ($periodos as $key => $value) {
                                  if($value["Id"] == $url[6]){
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
                        $nivel = $url[1]; 
                        $grado = $url[3];
                        $materias = materiasCtr::consultarMateriasCalificacionesCtr($nivel, $grado);
                    ?>

                    <div class="col-12 col-xl-12  stretch-card mt-4">
                            <div class="row flex-grow-1">

                            <?php
                             foreach ($materias as $key => $value) {
                              $id_nivel= $url[1];
                              $id_grado = $url[3];
                              $grupo = $url[4];
                              $calificacion = calificacionCtr::consultarCalificacionesCtr($value["Id"], $id_nivel, $id_grado, $grupo, null);
                               $profesor = profesoresCtr::consultarProfesorIdCtr($value["Id_profesor"]);
                                echo '<div class="col-md-4 col-12">';
                                if(empty($calificacion["id_materia"]) && empty($calificacion["id_alumno"])){
                                  echo '
                                  <a type="button" class="cuatrimestreCalificaciones grid-margin stretch-card materiaCalificacion" 
                                  materiaCalificacionId="'.$value["Id"].'"  
                                  materiaCalificacionNombre="'.$value["Nombre"].'"  
                                  materiaCalificacionProfesor="'.$profesor["Id"].'"  

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
                                  <a  href="'.$rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/".$url[6]."/".$value["Id"].'"  class="cuatrimestreCalificaciones grid-margin stretch-card materiaCalificacionEditar" 
                                  idMateriaCalificacionEditar="'.$calificacion["id_materia"].'"  
                                  idAlumnoCalificacionEditar="'.$calificacion["id_alumno"].'"  
                                  materiaCalificacionNombreEditar="'.$value["Nombre"].'"  ">
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
                             $nivel = $url[1]; 
                             $grado = $url[3];
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
                            $tabla = "cedula";
                            $id_nivel= $url[1];
                            $id_grado = $url[3];
                            $grupo = $url[4];
                            $generacion = $url[2];
                            $status = "ACTIVO";
                             $cedula = alumnosCtr:: consultarAlumnosNivelGradoGrupoGeneracionStatusCtr($tabla, $id_nivel,  $id_grado, $grupo, $generacion, $status);
                                    foreach ($cedula as $key => $value) {


                                        echo '
                                            <tr>
                                    
                                            <td>'.($key+1).'</td>
                                            <td>'.$value["Matricula"].'</td>
                                            <td>'.$value["ApellidoP"]. " ". $value["ApellidoM"]." ".$value["Nombre"].'</td>';    

                                            foreach ($materias as $key => $materia) {
                                                    $id_nivel= $url[1];
                                                    $id_grado = $url[3];
                                                    $grupo = $url[4];
                                                    $calificacion = calificacionCtr::consultarCalificacionesCtr($materia["Id"], $id_nivel, $id_grado, $grupo, $value["Id"]);

                                                    $sumatorias = calificacionCtr::sumatoriaCuatrimestreCtr($value["Id"]);
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
                                              <button data-bs-toggle="tooltip" data-bs-placement="top" title="Descargar evaluación cuatrimestral" type="submit" name="evaluacionCuatrimestral" class="btn btn-info btn-icon descargarAlumno">
                                                <i data-feather="download-cloud"></i>
                                               </button>
                                               <input type="hidden" name="cedulaId" value="'.$value["Id"].'">
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
        <input type="text" name="idMateriaCalificacion" class="idMateriaCalificacion">                  
        <input type="text" name="idProfesorCalificacion" class="idProfesorCalificacion">                  
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
                  $id_nivel= $url[1];
                  $id_grado = $url[3];
                  $grupo = $url[4];
                  $generacion = $url[2];
                  $status = "ACTIVO";
                   $cedula = alumnosCtr:: consultarAlumnosNivelGradoGrupoGeneracionStatusCtr($tabla, $id_nivel,  $id_grado, $grupo, $generacion, $status);
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
        <button type="submit" class="btn btn-primary actualizarCalificacion">Guardar calificación</button>
      </div>
                <?php
                  $calificacion = new calificacionCtr();
                  $calificacion -> insertarCalificacionesCtr();
                ?>
      </form>
    </div>
  </div>
</div> 
 




</div>