<div class="page-content">
    
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
              <nav class="page-breadcrumb">
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo "calificaciones?licenciatura=".$_GET["licenciatura"]."&id_licenciatura=".$_GET["id_licenciatura"] ?>">Cuatrimestres</a></li>
            <li class="breadcrumb-item active" aria-current="page">MATERIAS DEL - <b><?php echo mb_strtoupper(str_replace("-"," ",$_GET["cuatrimestre"]))." DE LA ". mb_strtoupper(str_replace("-"," ",$_GET["licenciatura"]))?></b></li>
              </ol>
             </nav>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
          <a type="button" href="<?php echo  'inscribir-alumno?licenciatura='.$_GET["licenciatura"]."&id_licenciatura=".$_GET["id_licenciatura"] ?>" class="btn btn-primary btn-icon-text me-2 mb-2 mb-md-0 "><i class="link-icon mr-2" data-feather="user-plus"></i> Inscribir alumno</a>
          </div>
      </div>



      <div class="row">
					<div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">

                    
               <div class="row">
                
                    <?php 
                        $id_licenciatura = $_GET["id_licenciatura"];
                        $tabla = "materias";
                        $cuatrimestre = $_GET["no-cuatrimestre"];
                        $materias = materiasCtr::consultarMateriasCuatriIdCtr($tabla, $id_licenciatura, $cuatrimestre);
                    ?>

                    <div class="col-12 col-xl-12 stretch-card">
                            <div class="row flex-grow-1">

                            <?php
                             foreach ($materias as $key => $value) {
                                echo '
                                    <a type="button"  data-bs-toggle="modal" data-bs-target="#calificacionAlumno"  class="cuatrimestreCalificaciones col-md-3 grid-margin stretch-card" href="materias?cuatrimestre='.$value["url"].'&licenciatura='.$_GET["licenciatura"].'&id_licenciatura='.$_GET["id_licenciatura"].'" >
                                    <div class="card cuatrimestreHover shadow-sm">
                                        <div class="card-body">
                                      
                                        <div class="d-flex justify-content-start align-items-center">
                                        <img style="width:40px; display:inline-block; margin-right: 20px" src="Views/images/user-materia.png" alt="user-materias">
                                            <h6 class="card-title mb-0">'.$value["Nombre"].'</h6>
                                        </div>
                                                                        
                                       
                                        </div>
                                    </div>
                                    </a>
                 

                                 ';
                            }
                            
                            ?>


                  </div>
                        </div>


                        <div class="col-12 col-xl-12 stretch-card"  style="overflow-x: auto">
                            <div class="row flew-grow-1">
                            <div class="table-responsive card">
                <table class="table table-hover table-bordered table-responsive " id="table1" style="font-size: 12px;">

                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Matricula</th>
                        <th>Nombre</th>
                        <?php
                            $tabla = "materias";
                            $id_licenciatura = $_GET["id_licenciatura"];
                            $no_cuatrimestre = 1;
                            $materias = materiasCtr::consultarMateriasCuatriIdCtr($tabla, $id_licenciatura, $no_cuatrimestre);

                            foreach ($materias as $key => $value) {
                                echo '  <th>'.$value["Nombre"].'</th>';
                            }
                        ?>



                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                                 
                            <?php 
                             $tabla = "cedula";
                             $id= $_GET["id_licenciatura"];
                             $generacion = $url[2];
                            $cedula = alumnosCtr::consultarAlumnosCtr($id, $tabla, $generacion);
                                    foreach ($cedula as $key => $value) {
                                        echo '
                                            <tr>
                                    
                                            <td>'.($key+1).'</td>
                                            <td>'.$value["Matricula"].'</td>
                                            <td>'.$value["Nombre"]." ".$value["ApellidoP"]. " ". $value["ApellidoM"].'</td>';    

                                            foreach ($materias as $key => $materia) {
                                                
                                                    $calificacion = calificacionCtr::consultarCalificacionesCtr($materia["Id"], $value["Id"]);

                                                    if(!empty($calificacion["calificacion"])){
                                                        echo '<td>   <input value="'.$calificacion["calificacion"].'" type="text" class="form-control"></td>';
                                                    }else{
                                                        echo '<td>
                                                        
                                                        </td>';
                                                    }




                                                  
                                            }
                                                                             
                                              echo '<td>           
                                              <button class="btn btn-secondary btn-icon guardarCalificacion" data-bs-toggle="tooltip" data-bs-placement="top" title="Guardar calificacion" name="cedula" type="button" >
                                              <i data-feather="save"></i>
                                             </button>

                                                <button  
                                                type="button"  class="btn btn-primary btn-icon">
                                                <i data-feather="edit-2"></i>
                                                </button>
                                          
                                            </td>
                                         
                                            </tr>
                                            ';

                                          
                                    }
                            
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

<!-- Modal -->
<div class="modal fade " id="calificacionAlumno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Materia <span class="noIdAlumno"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        
      <form id="formCalificacion">                         
         <div class="row">
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cerrarCalificacion" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary actualizarCalificacion">Guardar cambios</button>
      </div>
      </form>
    </div>
  </div>
</div> 




</div>