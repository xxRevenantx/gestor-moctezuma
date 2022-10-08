<div class="page-content">


          <?php
          include 'Views/modules/componentes/breadcrum.php';
         ?>



				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">

                    
               <div class="row">
                
                 
                <?php
                  $tabla = "cedula";
                  $id_nivel = $url[1];
                  $id_grado = $url[3];
                  $grupo = $url[5];
                  $generacion = $url[2];

                 
                  $alumnos = alumnosCtr::consultarAlumnosNivelGradoGrupoGeneracionCtr($tabla, $id_nivel,  $id_grado, $grupo, $generacion);

                      echo '
                      <div class="mb-4 d-flex justify-content-end lign-items-end">
                      <form method="POST" target="_blank">
                      <button type="submit" name="filtroSalud" class="btn btn-outline-danger"> <i data-feather="download"></i> Descargar filtro de salud</button>
                      </form>
                      </div>



                      <div class="row mb-4">
                      <div class="col-6">
                      <label for=""><h6>Lista de asistencias</h6></label>
                      
                      <form method="POST" target="_blank">
                        <div class="row">
                        <div class="col-4">';

                        if($url[1] == 4){
                            echo ' <select class="form-select periodoLista js-example-basic-single" name="periodoLista" id="periodoLista">
                            <option value="1">PRIMER PARCIAL</option>
                            <option value="2">SEGUNDO PARCIAL</option> 
                            </select>';
                        }else{
                          echo ' <select class="form-select periodoLista js-example-basic-single" name="periodoLista" id="periodoLista">
                          <option value="1">PRIMER PERIODO</option>
                          <option value="2">SEGUNDO PERIODO</option>
                          <option value="3">TERCER PERIODO</option>
                          
                          </select>';
                        }
                     
                      
                      
                      echo '</div>

                      

                      <div class="col-4">
                      <button type="submit" name="listaAsistencia" class="btn btn-outline-primary"> <i data-feather="download"></i> Asistencias</button>
                      <input type="hidden" readonly name="idNivel" value="'.$url[1].'">
                      <input type="hidden" readonly value="'.$url[3].'">
                      </div>
                      </div>
                      </form>
                      </div>
                     
                      
                      
                      ';

                    // LISTA DE EVALUACIÓN SOLO PARA PRIMARIA
                      if($url[1] == 2){
                        echo '<div class="col-6">
                        <label for=""><h6>Lista de evaluación</h6></label>
                        
                        <form method="POST" target="_blank">
                          <div class="row">
                          <div class="col-4">
                        <select class="form-select evaluacionLista js-example-basic-single" name="evaluacionLista" id="evaluacionLista">
                        <option value="1">PRIMER PERIODO</option>
                        <option value="2">SEGUNDO PERIODO</option>
                        <option value="3">TERCER PERIODO</option>
                        
                        </select>
                        </div>
                        <div class="col-4">
                        <button type="submit" name="listaEvaluacion" class="btn btn-outline-primary"> <i data-feather="download"></i> Evaluación</button>
                        <input type="hidden" readonly name="idNivel" value="'.$url[1].'">
                        <input type="hidden" readonly value="'.$url[3].'">
                        </div>
                        </div>
                        </form>
  
                           
  
                            </div>
                            </div> ';
                      }else{

                        // LISTA VERTICAL
                        echo '<div class="col-6">
                        <label for=""><h6>Lista vertical</h6></label>
                        
                        <form method="POST" target="_blank">
                          <div class="row">
                          <div class="col-4">
                        <select class="form-select listaVertical js-example-basic-single" name="listaVertical" id="listaVertical">
                        <option value="1">PRIMER PERIODO</option>
                        <option value="2">SEGUNDO PERIODO</option>
                        <option value="3">TERCER PERIODO</option>
                        
                        </select>
                        </div>
                        <div class="col-4">
                        <button type="submit" name="btnlistaVertical" class="btn btn-outline-secondary"> <i data-feather="download"></i> Lista</button>
                        <input type="hidden" readonly name="idNivel" value="'.$url[1].'">
                        <input type="hidden" readonly value="'.$url[3].'">
                        </div>
                        </div>
                        </form>
  
                           
  
                            </div>
                            </div> ';
                      }

                     
                     
                   
                    $cedula = new formatosCtr();
                    $cedula->formatoCtr();

                   
                ?>
                 
             
        </div>

        <div class="row">
        <div class="col-6">
                      <label for=""><h6>Personazalidores</h6></label>
                      
                      <form method="POST" target="_blank">
                        <div class="row">
                        <div class="col-6">
                      <div class="col-4">
                      <button type="submit" name="personlizadores" class="btn btn-outline-primary mb-3 mt-3"> <i data-feather="download"></i> Personalizadores</button>
                      </div>
                      </div>
                      </form>

                      <?php
                         $cedula = new formatosCtr();
                         $cedula->formatoCtr();
                      ?>
                      </div>
        </div>
                   
                       
               
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
                        <th>CURP</th>
                        <th>Sexo</th>
                        <th>Grado</th>
                        <th>Nivel</th>
                        <th>Grupo</th>
                        <th>Generación</th>
                        <th>Fecha</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                                 
                            <?php 

                                    foreach ($alumnos as $key => $value) {
                                        echo '
                                            <tr eliminarAlumno="'.$value["Id"].'" >
                                            <td>'.($key+1).'</td>
                                            <td><img style="width:50px; height:50px" class="d-block m-auto" src="'.$rutaLocal.substr($value["Foto"],6).'" alt="'.$value["Nombre"].'"></td>
                                            <td>'.$value["Matricula"].'</td>
                                            <td>'.$value["Nombre"].'</td>                                         
                                            <td>'.$value["ApellidoP"].'</td>
                                            <td>'.$value["ApellidoM"].'</td>
                                            <td>'.$value["CURP"].'</td>
                                            <td>'.$value["Sexo"].'</td>
                                            <td>'.$value["id_grado"].'°</td>
                                            <td>'.$value["Nivel"].'</td>
                                            
                                            <td>'.$value["Grupo"].'</td>
                                            <td class="text-center">'.$value["Generacion"].'</td>
                                            <td class="text-center">'. $value["FechaCaptura"].'</td>
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




            
<!-- EDITAR ALUMNO MODAL -->



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