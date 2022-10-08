<div class="page-content">

          <?php
          include 'Views/modules/componentes/breadcrum.php';
         ?>



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
                        <th>Tutor</th>
                        <th>Pago</th>
                        <th>Observaciones</th>
                        <th>Fecha</th>

                        
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
                                            <td>'.$value["ApellidoM"].'</td>';

                                            if(!empty($pago)){
                                                echo '<td>'.$pago["NombreTutor"].'</td>
                                                <td>'.$pago["Pago_inscripcion"].'</td>
                                                <td>'.$pago["Observaciones"].'</td>
                                                <td>'.$pago["Fecha_inscripcion"].'</td>';
                                            }else{
                                              echo '
                                              <td>PENDIENTE</td>
                                              <td>PENDIENTE</td>
                                              <td>PENDIENTE</td>
                                              <td>PENDIENTE</td>
                                              ';
                                            }
                                            


                                           
                                          
                                             $pagoInscripcion = pagosCtr::seleccionarPagoInscripcionCtr($value["Id"]);

                                            
                                            echo '<td>';       
                                             if(!empty($pagoInscripcion)){
                                              if($pagoInscripcion["Id_alumno"] == $value["Id"]){

                                                echo ' <button title="Pagar inscripción" type="button" class="btn btn-info btn-icon editarInscripcion"
                                                data-bs-toggle="modal" data-bs-target="#editarInscripcion"  
                                                attrPagoInscripcion = '.$value["Id"].'
                                                >
                                                    <i data-feather="edit"></i>
                                                </button>
                                                ';
                                              }       
                                             }else{
                                              echo ' <button title="Pagar inscripción" type="button" class="btn btn-primary btn-icon pagarInscripcion"
                                              data-bs-toggle="modal" data-bs-target="#pagarInscripcion"  
                                              attrPagoInscripcion = '.$value["Id"].'
                                              >
                                                  <i data-feather="dollar-sign"></i>
                                              </button>
                                              ';
                                            } 
                                                                           
                                               
                                           
                                            
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




<!-- PAGO DE INSCRIPCIÓN -->
<div class="modal fade " id="pagarInscripcion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Pago de inscripción - <b><span class="textInscripcion"></span></b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        
      <form id="formPagoInscripcion" >           
        <input class="pagoidInscripcion" name="pagoidInscripcion" type="hidden" readonly>              
        <input class="IdnivelPagoInscripcion" name="IdnivelPagoInscripcion" type="hidden" readonly>              
        <input class="IdgradoPagoInscripcion" name="IdgradoPagoInscripcion" type="hidden" readonly>              
        <input class="grupoPagoInscripcion" name="grupoPagoInscripcion" type="hidden" readonly>              
         <div class="row">

         <div class="mb-3">
                        <label for="nombreInscripcion" class="form-label">Alumno <small class="text-danger ">*Obligatorio</small></label></label>
                        <input id="nombreInscripcion" readonly class="form-control nombreInscripcion"  name="nombreInscripcion" type="text">
        </div>
         <div class="mb-3">
                        <label for="tutorInscripcion" class="form-label">Madre, Padre o Tutor <small class="text-danger ">*Obligatorio</small></label></label>
                        <input id="tutorInscripcion" class="form-control tutorInscripcion" placeholder="NOMBRE DEL TUTOR" name="tutorInscripcion" type="text">
        </div>
         <div class="mb-3">
                        <label for="pagoInscripcion" class="form-label">Pago de inscripción<small class="text-danger ">*Obligatorio</small></label></label>
                        <input id="pagoInscripcion" class="form-control pagoInscripcion"  name="pagoInscripcion" type="text"  placeholder="MONTO AUTORIZADO">
                       
        </div>
            <div class="mb-3">
                        <label for="observacionesInscripcion" class="form-label">Observaciones</label></label>
                      <textarea class="form-control" name="observacionesInscripcion" id="observacionesInscripcion" cols="30" rows="5"></textarea>
             </div>
            <div class="mb-3">
                      <b>Nota:</b> Revisa los datos antes de guardar los cambios
             </div>

      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cerrarInscripcion" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary EditarInscripcion">Guardar cambios</button>
      </div>
      </form>
    </div>
  </div>
</div> 






<!-- EDITAR PAGO DE INSCRIPCIÓN -->
<div class="modal fade " id="editarInscripcion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-white" id="exampleModalLabel">Editar inscripción - <span class="textInscripcionE"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        
      <form id="formPagoActualizarInscripcion" >           
        <!-- PARA CONSULTAR -->
        <input class="pagoidInscripcionE" name="pagoidInscripcionE" type="hidden" readonly>    

        <!-- PARA ACTUALIZAR -->
        <input class="pagoidInscripcionA" name="pagoidInscripcionA" type="hidden" readonly>                          
         <div class="row">

         <div class="mb-3">
                        <label for="nombreInscripcionE" class="form-label">Alumno <small class="text-danger ">*Obligatorio</small></label></label>
                        <input id="nombreInscripcionE" readonly class="form-control nombreInscripcionE"  name="nombreInscripcionE" type="text">
        </div>
         <div class="mb-3">
                        <label for="tutorInscripcionE" class="form-label">Madre, Padre o Tutor <small class="text-danger ">*Obligatorio</small></label></label>
                        <input id="tutorInscripcionE" class="form-control tutorInscripcionE" placeholder="NOMBRE DEL TUTOR" name="tutorInscripcionE" type="text">
        </div>
         <div class="mb-3">
                        <label for="pagoInscripcionE" class="form-label">Pago de inscripción<small class="text-danger ">*Obligatorio</small></label></label>
                        <input id="pagoInscripcionE" class="form-control pagoInscripcionE"  name="pagoInscripcionE" type="text"  placeholder="MONTO AUTORIZADO">
                       
        </div>
            <div class="mb-3">
                        <label for="observacionesInscripcionE" class="form-label">Observaciones</label></label>
                      <textarea class="form-control observacionesInscripcionE" name="observacionesInscripcionE" id="observacionesInscripcionE" cols="30" rows="5"></textarea>
             </div>
            <div class="mb-3">
                      <b>Nota:</b> Revisa los datos antes de guardar los cambios
             </div>

      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cerrarInscripcion" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary actualizarInscripcion">Guardar cambios</button>
      </div>
      </form>
    </div>
  </div>
</div> 


</div> 