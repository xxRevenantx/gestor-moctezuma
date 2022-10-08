<div class="page-content">


				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">

                    
         
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
                        <th>Sexo</th>
                        <th>Grado</th>
                        <th>Nivel</th>
                        <th>Grupo</th>
                        <th>Generación</th>
                        <th>Tutor</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                                 
                            <?php 
                                        $alumnos = alumnosCtr::consultarAlumnosChartCtr();
                                    foreach ($alumnos as $key => $value) {
                                        echo '
                                            <tr eliminarAlumno="'.$value["Id"].'" >
                                            <td>'.($key+1).'</td>
                                            <td><img style="width:50px; height:50px" class="d-block m-auto" src="'.$rutaLocal.substr($value["Foto"],6).'" alt="'.$value["Nombre"].'"></td>
                                            <td>'.$value["Matricula"].'</td>
                                            <td>'.$value["Nombre"].'</td>                                         
                                            <td>'.$value["ApellidoP"].'</td>
                                            <td>'.$value["ApellidoM"].'</td>
                                            <td>'.$value["Sexo"].'</td>
                                            <td>'.$value["id_grado"].'°</td>
                                            <td>'.$value["Nivel"].'</td>
                                            
                                            <td>'.$value["Grupo"].'</td>
                                            <td class="text-center">'.$value["Generacion"].'</td>
                                            <td class="text-center">'.$value["Tutor"].'</td>
                                            ';
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
                                                               
                                             <form method="POST" target="_blank">

                                             <button title="Editar alumno" data-bs-toggle="modal" data-bs-target="#editarAlumnoModal"  
                                             type="button" editarAlumno="'.$value["Id"].'" class="btn btn-primary btn-icon editarAlumno">
                                             <i data-feather="edit-2"></i>
                                             </button>


                                             <button data-bs-toggle="tooltip" data-bs-placement="top" title="Descargar información del alumno" type="submit" name="cedula" type="button" class="btn btn-info btn-icon descargarAlumno">
                                             <i data-feather="download-cloud"></i>
                                            </button>
                                             <input type="hidden" value="'.$value["Id"].'" name="cedulaId">
                                                
                                             <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Eliminar alumno" type="button" class="btn btn-danger btn-icon eliminarAlumno">
                                                 <i data-feather="trash-2"></i>
                                             </button>
                                             </form>
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


                






			</div>



            <!-- Modal -->
<div class="modal fade " id="editarAlumnoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Editar Alumno # <span class="noIdAlumno"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        
      <form id="formEditar" >                         
         <div class="row">
         <input type="hidden" value="" name="IdAlumno" class="IdAlumno">  
        <?php include "Views/modules/datos/generales.php" ?>
        <?php include "Views/modules/datos/contacto.php" ?>
        <?php include "Views/modules/datos/escolares.php" ?>
        <?php include "Views/modules/datos/otros.php" ?>
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cerrarAlumno" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary actualizarAlumno">Guardar cambios</button>
      </div>
      </form>
    </div>
  </div>
</div> 

            

<!-- page content -->
</div> 