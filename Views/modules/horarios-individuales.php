<div class="page-content">


    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
              <nav class="page-breadcrumb">
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4] ?>">...Atrás</a></li>
              <li class="breadcrumb-item active" aria-current="page">HORARIOS INDIVIDUALES</li>
              </ol>
             </nav>
          </div>

          <div class="d-flex align-items-center flex-wrap text-nowrap">
          <a type="button" href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/inscribir-alumno" ?>" class="btn btn-primary btn-icon-text me-2 mb-2 mb-md-0 "><i class="link-icon mr-2" data-feather="users"></i> Inscribir alumno</a>
          <a type="button" href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/ver-alumnos" ?>" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0 "><i class="link-icon mr-2" data-feather="eye"></i> Ver alumnos</a>
        </div>
        </div>



				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                <div class="table-responsive mt-4">
                <table class="table table-hover table-bordered table-striped">

                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Profesor</th>
                        <th>Horario</th>
                        
                      </tr>
                    </thead>
                    <tbody class="row_position">
                                 
                            <?php 
                             $tabla = "horarios";
                            $horarios = horariosCtr::consultarHorariosIndividualesCtr($tabla);
                           
                                    foreach ($horarios as $key => $value) {
                                      $profesor = profesoresCtr::editarProfesorCtr($value["profesor"]);
                                      
                                        echo '
                                        <tr>
                                        <td>'.($key+1).'</td>              
                                        <td>'.$profesor["Nombre"]." ".$profesor["PrimerApellido"]." ".$profesor["SegundoApellido"].'</td>              
                                        <td>
                                        <form method="POST" target="_blank">
                                            <button type="submit" class="btn btn-primary" name="horarioIndividual">Horario</button>
                                            <input value="'.$value["profesor"].'" type="hidden" class="form-control" name="horarioIndividualId" />
                                        </form>
                                        </td>              
                                        </tr>
                                        ';
                                     
                                    }

                                    $formatos = new formatosCtr();
                                    $formatos -> formatoCtr();
                            
                            ?>

                    </tbody>
                  </table>
                  
                 
                  </div>
            </div>
					</div>
				</div>
			</div>





</div> 