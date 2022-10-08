<div class="page-content">


    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
              <nav class="page-breadcrumb">
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo $_GET["licenciatura"]."?id_licenciatura=".$_GET["id_licenciatura"] ?>">Acciones</a></li>
            <li class="breadcrumb-item active" aria-current="page">CALIFICACIONES - <b><?php echo mb_strtoupper(str_replace("-"," ",$_GET["licenciatura"]))?></b></li>
              </ol>
             </nav>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
          <a type="button" href="<?php echo  'inscribir-alumno?licenciatura='.$_GET["licenciatura"]."&id_licenciatura=".$_GET["id_licenciatura"] ?>" class="btn btn-primary btn-icon-text me-2 mb-2 mb-md-0 "><i class="link-icon mr-2" data-feather="user-plus"></i> Inscribir alumno</a>
          </div>
      </div>


        <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">

        <?php
                            $tabla = "cuatrimestres";
                            $id = $_GET["id_licenciatura"];
                            $cuatrimestres = materiasCtr::consultarCuatrimestresCtr($tabla, $id);
                                foreach ($cuatrimestres as $key => $value) {
                                    echo '
                                    
                        <a class="cuatrimestreCalificaciones col-md-3 grid-margin stretch-card" href="calificacion?cuatrimestre='.$value["url"].'&no-cuatrimestre='.$value["no_cuatrimestre"].'&licenciatura='.$_GET["licenciatura"].'&id_licenciatura='.$_GET["id_licenciatura"].'" >
                          <div class="card cuatrimestreHover">
                            <div class="card-body">
                          
                              <div class="d-flex justify-content-start align-items-center">
                              <img style="width:40px; display:inline-block; margin-right: 20px" src="Views/images/calificacion.png" alt="calificacion">
                              <h6 class="card-title mb-0">'.$value["Cuatrimestre"].'</h6>
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


<!-- 
				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped " id="" style="font-size: 12px">

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
                                echo '  <th style="width:100px;">'.$value["Nombre"].'</th>';
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
                                                
                                                    $calificacion = calificacionCtr::consultarCalificacionesCtr($materia["Id"], $url[2],$value["Id"]);

                                                    if(!empty($calificacion["calificacion"])){
                                                        echo '<td>   <input value="'.$calificacion["calificacion"].'" type="text" class="form-control"></td>';
                                                    }else{
                                                        echo '<td>
                                                        
                                                        <form id="formCalificacion">
                                                        <input value="0" type="text" class="form-control">
                                                        </form>
                                                        
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


                                                
                                                <input type="hidden" value="'.$value["Id"].'" name="cedulaId">
                                          
                                            </td>
                                         
                                            </tr>
                                            ';

                                            $cedula = new formatosCtr();
                                            $cedula->formatoCtr();
                                          
                                    }
                            
                            ?>

                    </tbody>
                  </table>
                  
                 
                  </div>
            </div>
					</div>
				</div>


			</div> -->

</div> 