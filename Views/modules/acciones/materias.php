<div class="page-content">

          <?php
          include 'Views/modules/componentes/breadcrum.php';
           ?>




				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">

                    <form id="agregarMateriaForm">

                    <div class="col-12">
									<div class="mb-3">
            
										<label for="agregarMateria" class="form-label">Agregar materia</label>
										<input type="text" class="form-control agregarMateria mb-2" name="agregarMateria" id="agregarMateria" autocomplete="off" placeholder="Materia">
                  

                 
                  </div>
                  </div>

                  <div class="col-12">
                    <div class="mb-3">

                    <label for="profesorMateria" class="form-label">Selecciona el profesor</label>  
                    <select class="js-example-basic-single form-select profesorMateria mt-4" name="profesorMateria">
                 
                    <option value="0" selected>Selecciona el profesor...</option>
                        <?php    $profesores = profesoresCtr::consultarProfesorCtr();
                          foreach ($profesores as $key => $profesor) { 
                         
                            echo '<option value="'.$profesor["Id"].'">'.$profesor["Titulo"]." ".$profesor["Nombre"]." ".$profesor["PrimerApellido"]." ".$profesor["SegundoApellido"].'</option>';
                            
                            }
                            ?>      
                                            
                                          
                      </select>

										<input type="text" readonly class="form-control urlMateria mt-3" name="urlMateria" id="urlMateria">
										<input type="hidden" value="<?php echo $url[1]?>" readonly class="form-control nivelMateria mt-3" name="nivelMateria" id="nivelMateria">
										<input type="hidden" value="<?php echo $url[3]?>" readonly class="form-control gradoMateria mt-3" name="gradoMateria" id="gradoMateria">
								
								
                       
               
                    </div>
                    </div>
                  	<button type="submit" class="btn btn-warning me-2 mt-3">Agregar</button>
                  </form>


                <div class="table-responsive mt-4">
                <table class="table table-hover table-bordered table-striped">

                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Materia</th>
                        <th>Profesor</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="row_position">
                                 
                            <?php 
                             $nivel= $url[1];
                             $grado= $url[3];
                            $materias = materiasCtr::consultarMateriasCtr($nivel, $grado);
                           
                                    foreach ($materias as $key => $value) {
                                      $profesor = profesoresCtr::editarProfesorCtr($value["Id_profesor"]);
                                      
                                      if($value["Nombre"] == "RE" || $value["Nombre"] == "C" || $value["Nombre"] == "E" || $value["Nombre"] == "S" || $value["Nombre"] == "O"){
                                      }else{
                                        echo '
                                        <tr eliminarMateria="'.$value["Id"].'">
                                        <td>'.($key+1).'</td>
                                        <td>'.$value["Nombre"].'</td>
                                        <td>'.$profesor["Nombre"]." ".$profesor["PrimerApellido"]." ".$profesor["SegundoApellido"].'</td>
                                        
                                        <td>
                                        <button title="Editar materia" data-bs-toggle="modal" data-bs-target="#editarMateriaModal"  
                                        type="button" editarMateria="'.$value["Id"].'" class="btn btn-primary btn-icon editarMateria">
                                        <i data-feather="edit-2"></i>
                                        </button>
                                           
                                        <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Eliminar materia" type="button" class="btn btn-danger btn-icon eliminarMateria">
                                            <i data-feather="trash-2"></i>
                                        </button>
                                        </td>              
                                        </tr>
                                        ';
                                      }
                                     
                                    }
                            
                            ?>

                    </tbody>
                  </table>
                  
                 
                  </div>
            </div>
					</div>
				</div>
			</div>




<!-- Modal Editar Profesor-->
<div class="modal fade " id="editarMateriaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Editar Materia - <b><span class="noIdMateria"></span></b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        
      <form id="formEditarMateria" >         
      <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                <label for="agregarMateriaE" class="form-label">Editar materia</label>
										      <input type="text" class="form-control agregarMateriaE mb-2" name="agregarMateriaE" id="agregarMateriaE" autocomplete="off" placeholder="Materia">
                          <input type="hidden" readonly class="form-control urlMateriaE mt-3" name="urlMateriaE" id="urlMateriaE">
                          <input type="hidden" readonly class="form-control nivelMateriaE mt-3" name="nivelMateriaE" id="nivelMateriaE">
									        <input type="hidden" readonly class="form-control gradoMateriaE mt-3" name="gradoMateriaE" id="gradoMateriaE">
									        <input type="hidden" readonly class="form-control idMateriaE mt-3" name="idMateriaE" id="idMateriaE">
                           
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="mb-3">
                                <label for="profesorMateriaE" class="form-label">Selecciona el profesor</label>
                                <select class=" form-select profesorMateriaE" id="profesorMateriaE" name="profesorMateriaE">
                              <option value="" selected>Selecciona el profesor...</option>
                                <?php    $profesores = profesoresCtr::consultarProfesorCtr();
                                  foreach ($profesores as $key => $profesor) { 
                                
                                    echo '<option value="'.$profesor["Id"].'">'.$profesor["Titulo"]." ".$profesor["Nombre"]." ".$profesor["PrimerApellido"]." ".$profesor["SegundoApellido"].'</option>';
                                    
                                    }
                                    ?>      
                                            
                                          
                             </select>



                                </div>
                            </div>
                            </div>
        
        
                            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary cerrarMateria" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary actualizarMateria">Guardar cambios</button>
                      </div>
      </form>

    </div>
  </div>
</div> 




</div> 