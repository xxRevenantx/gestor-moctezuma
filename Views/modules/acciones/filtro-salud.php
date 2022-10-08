<div class="page-content">


    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
              <nav class="page-breadcrumb">
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4] ?>">...Atrás</a></li>
              <li class="breadcrumb-item active" aria-current="page"><b>FILTRO DE SALUD - <?php echo $url[3]."° DE ".mb_strtoupper(str_replace("-"," ",$url[0])). " - GRUPO " ."'".$url[4]."'"?></b></li>
              </ol>
             </nav>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
          <a type="button" href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/inscribir-alumno" ?>" class="btn btn-primary btn-icon-text me-2 mb-2 mb-md-0 "><i class="link-icon mr-2" data-feather="eye"></i> Inscribir alumno</a>
          </div>
        </div>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">

                      
                    <?php
                    
                    $tabla = "cedula";
                    $id_nivel = $url[1];
                    $id_grado = $url[3];
                    $grupo = $url[4];
                   
                    $alumnos = alumnosCtr::consultarAlumnosNivelGradoGrupoCtr($tabla, $id_nivel,  $id_grado, $grupo);
                  

                    ?>   
               
                <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped " id="table1">

                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Matricula</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nivel</th>
                        <th>Grado</th>
                        <th>Grupo</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                                 
                            <?php 

                                    foreach ($alumnos as $key => $value) {
                                      $pago = pagosCtr::seleccionarPagoInscripcionCtr($value["Id"]);
                                        echo '
                                            <tr eliminarAlumno="'.$value["Id"].'" >
                                            <td>'.($key+1).'</td>
                                            <td><img style="width:50px; height:50px" class="d-block m-auto" src="'.$rutaLocal.substr($value["Foto"],6).'" alt="'.$value["Nombre"].'"></td>
                                            <td>'.$value["Matricula"].'</td>
                                            <td>'.$value["Nombre"].'</td>                                         
                                            <td>'.$value["ApellidoP"].'</td>
                                            <td>'.$value["ApellidoM"].'</td>
                                            <td>'.$value["Nivel"].'</td>
                                            <td>'.$value["id_grado"].'</td>
                                            <td>'.$value["Grupo"].'</td>';

                                            switch ($value["Status"]) {
                                                case 'ACTIVO':
                                                   echo '<td><span class="badge bg-success">ACTIVO</span></td>';
                                                    break;
                                                    case 'BAJA':
                                                       echo '<td><span class="badge bg-danger">BAJA</span></td>';
                                                   break;
                                                case 'SUSPENDIDO':
                                                   echo '<td><span class="badge bg-warning">SUSPENDIDO</span></td>';
                                                    break;
                                                case 'BAJA TEMPORAL':
                                                   echo '<td><span class="badge bg-dark">BAJA TEMPORAL</span></td>';
                                                    break;
                                                    case 'PENDIENTE':
                                                       echo '<td><span class="badge bg-primary">PENDIENTE</span></td>';
                                                   break;
                                                
                                                default:
                                                    # code...
                                                    break;
                                            }
                                           echo '<td>
                                                <form target="_blank" method="POST">
                                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="filtro de Salud" type="submit" name="filtroSalud" class="btn btn-outline-danger btn-icon">
                                                 <img src="'.$rutaLocal.'Views/images/filtro.png">
                                              </button>
                                                </form>
                                            </td>
                                            ';                                         
                                           echo ' </td>
                                            </tr>';

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

			</div>

</div> 