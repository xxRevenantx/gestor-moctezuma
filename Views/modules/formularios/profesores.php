<div class="page-content">
<div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">ASIGNAR PROFESORES</h6>


                    <form id="formagregarProfesores">
                        <div class="row">

                            <div class="col-sm-2">
                                <div class="mb-3">
                                    <label class="form-label">Título</label>
                                
                                    <select  class="js-example-basic-single form-control tituloProfesor" name="tituloProfesor"  id="tituloProfesor">
                                        <option value="DR.">DOCTOR</option>
                                        <option value="DRA.">DOCTORA</option>
                                        <option value="ING.">INGENIERO (A)</option>
                                        <option value="LIC.">LICENCIADO (A)</option>
                                        <option value="MTRO.">MAESTRO</option>
                                        <option value="MTRA.">MAESTRA</option>
                                        <option value="PROFRA.">PROFESORA</option>
                                        <option value="PROFR.">PROFESOR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Nombre (s)</label>
                                    <input type="text" class="form-control nombreProfesor" name="nombreProfesor"  id="nombreProfesor" placeholder="Nombre (s)">
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-2">
                                <div class="mb-3">
                                    <label class="form-label">Primer apellido</label>
                                    <input type="text" class="form-control primerApellidoProfesor" name="primerApellidoProfesor"  id="primerApellidoProfesor" placeholder="Primer apellido">
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="mb-3">
                                    <label class="form-label">Segundo apellido</label>
                                    <input type="text" class="form-control segundoApellidoProfesor" name="segundoApellidoProfesor"  id="segundoApellidoProfesor" placeholder="Segundo apellido">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">CURP</label>
                                    <input type="text" class="form-control CURPprofesor" name="CURPprofesor"  id="CURPprofesor" placeholder="CURP">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Teléfono</label>
                                    <input type="text" class="form-control telefonoProfesor" name="telefonoProfesor"  id="telefonoProfesor" placeholder="Teléfono">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Nivel</label>
                                    <select class="form-select js-example-basic-single nivelProfesor" name="nivelProfesor"  id="nivelProfesor"  aria-label="Default select example">
                                        <option selected value="">Selecciona un nivel</option>
                                        <option value="1">PREESCOLAR</option>
                                        <option value="2">PRIMARIA</option>
                                        <option value="3">SECUNDARIA</option>
                                        <option value="4">BACHILLERATO</option>
                                    </select>
                                </div>
                            </div>

                        
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Perfil</label>
                                    <input type="text" class="form-control perfilProfesor" name="perfilProfesor"  placeholder="Perfil">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary submit">Crear profesor</button>
                            </div>
                            
                        
                          
                    </form>
                   

                    <!-- TABLAA -->
                    <div class="table-responsive mt-5">
                        <table class="table table-hover table-bordered table-striped " id="profesores">

                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Folio</th>
                                    <th>Título</th>
                                    <th>Nombre (s)</th>
                                    <th>Primer Apellido</th>
                                    <th>Segundo Apellido</th>
                                    <th>CURP</th>
                                    <th>Telefono</th>
                                    <th>Nivel</th>
                                    <th>Perfil</th>
                                    <th>Status</th>
                                    <th>Fecha de creación</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $profesores = profesoresCtr::consultarProfesorCtr();
                                    foreach ($profesores as $key => $profesor) {

                                        $nivel = nivelesCtr::consultarNivelesIdCtr($profesor["Nivel"]);


                                        echo '<tr idProfesor="'.$profesor["Id"].'">
                                        <td>'.($key+1).'</td>
                                        <td>'.($profesor["Id"]).'</td>
                                        <td>'.($profesor["Titulo"]).'</td>
                                        <td>'.$profesor["Nombre"].'</td>
                                        <td>'.$profesor["PrimerApellido"].'</td>
                                        <td>'.$profesor["SegundoApellido"].'</td>
                                        <td>'.$profesor["CURP"].'</td>
                                        <td>'.$profesor["Telefono"].'</td>
                                        <td>'.$nivel["nivelM"].'</td>
                                        <td>'.$profesor["Perfil"].'</td>
                                        <td>';

                                        if($profesor["Status"] == "ACTIVO"){
                                            echo '<span class="badge bg-success">'.$profesor["Status"].'</span>';
                                        }else{
                                            echo '<span class="badge bg-danger">'.$profesor["Status"].'</span>';
                                        }

                                        echo '</td>
                                        <td>'.$profesor["Fecha"].'</td>
                                        <td>           
                                                <button data-bs-toggle="modal" data-bs-target="#editarProfesorModal" editarProfesor="'.$profesor["Id"].'"  type="button" class="btn btn-primary btn-icon editarProfesor">
                                                <i data-feather="edit-2"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-icon eliminarProfesor">
                                                    <i data-feather="trash-2"></i>
                                                </button>
                                            </td>
                                      
                                        </tr>';
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
<div class="modal fade " id="editarProfesorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Editar Profesor # <span class="noIdProfesor"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        
      <form id="formEditarProfesor" >         
      <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Titulo</label>
                                    <select  class="form-control tituloProfesorE" name="tituloProfesorE"  id="tituloProfesorE">
                                        <option value="DR.">DOCTOR</option>
                                        <option value="DRA.">DOCTORA</option>
                                        <option value="ING.">INGENIERO (A)</option>
                                        <option value="LIC.">LICENCIADO (A)</option>
                                        <option value="MTRO.">MAESTRO</option>
                                        <option value="MTRA.">MAESTRA</option>
                                        <option value="PROFRA.">PROFESORA</option>
                                        <option value="PROFR.">PROFESOR</option>
                                    </select>


                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Nombre (s)</label>
                                    <input type="text" class="form-control nombreProfesorE" name="nombreProfesorE"  id="nombreProfesorE" placeholder="Nombre (s)">
                                    <input type="hidden" class="form-control idProfesorE" name="idProfesorE"  id="idProfesorE">
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Primer apellido</label>
                                    <input type="text" class="form-control primerApellidoProfesorE" name="primerApellidoProfesorE"  id="primerApellidoProfesorE" placeholder="Primer apellido">
                                </div>
                            </div>
                      

                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Segundo apellido</label>
                                    <input type="text" class="form-control segundoApellidoProfesorE" name="segundoApellidoProfesorE"  id="segundoApellidoProfesorE" placeholder="Segundo apellido">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">CURP</label>
                                    <input type="text" class="form-control CURPprofesorE" name="CURPprofesorE"  id="CURPprofesorE" placeholder="CURP">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Teléfono</label>
                                    <input type="text" class="form-control telefonoProfesorE" name="telefonoProfesorE"  id="telefonoProfesorE" placeholder="Teléfono">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Nivel</label>
                                    <select class="form-select form-control nivelProfesorE" name="nivelProfesorE"  id="nivelProfesorE"  aria-label="Default select example">
                                        <option selected value="">Selecciona un nivel</option>
                                        <option value="1">PREESCOLAR</option>
                                        <option value="2">PRIMARIA</option>
                                        <option value="3">SECUNDARIA</option>
                                        <option value="4">BACHILLERATO</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Perfil</label>
                                    <input type="text" class="form-control perfilProfesorE" id="perfilProfesorE" name="perfilProfesorE"  placeholder="Perfil">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                        <select name="statusProfesorE" id="statusProfesorE" class="form-control statusProfesorE">
                                            <option value="ACTIVO">ACTIVO</option>
                                            <option value="INACTIVO">INACTIVO</option>
                                        </select>
                                </div>
                            </div>
                            </div>
        
        
                            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary cerrarProfesor" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary actualizarProfesor">Guardar cambios</button>
                      </div>
      </form>

    </div>
  </div>
</div> 


 </div>