<div class="page-content">

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">FORMULARIOS</h4>
    </div>
</div>
				<div class="row">

					<div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                        <div class="card-body">

								<h6 class="card-title" id="generacion">Generaciones</h6>

								<form id="agregarGeneracion">
									<div class="mb-3">
									<label for="" class="form-label">Generaciones</label>
										<div class="row">
											<div class="col-5">
											<?php $years = array("2015","2016","2017","2018","2019","2020","2021","2022","2023","2024","2025","2026","2027","2028","2029","2030","2031","2032") ?>
									
										<select class="form-control" id="generacion1" name="generacion1">
												<option value="">...</option>
												<?php foreach($years as $year) : ?>
													<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
												<?php endforeach; ?>
												</select>
											</div>
											<div class="col-2">A</div>
											<div class="col-5">
										<select class="form-control" id="generacion2" name="generacion2">
												<option value="">...</option>
												<?php foreach($years as $year) : ?>
													<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
												<?php endforeach; ?>
										</select>
											</div>
										</div>
										<div class="row mt-3">
											<div class="col-12">
											<select  name="nivelGeneracion" id="nivelGeneracion" class="nivelGeneracion form-select" >
											<option value="0" selected disabled>Selecciona el nivel...</option>
											<?php


																   $ruta = null;
																	$niveles = nivelesCtr::consultarNivelesCtr($ruta);
																	foreach ($niveles as $key => $value) {
																		echo '
																			<option value="'.$value["Id"].'">'.$value["nivel"].'</option>
																		';
																	}
																
															
													?>
												
												</select>
											</div>
										</div>
										<div class="row mt-3">
											<div class="col-12">
												<input type="hidden" id="generacionesConcat" name="generacionesConcat" class="form-control">
												<input type="hidden" id="nivelIdGeneracion" name="nivelIdGeneracion" class="form-control">
											</div>
										</div>

										<!-- <input type="date" class="form-control agregarGen1" name="agregarGen" id="agregarGen1" autocomplete="off" placeholder="Generaciones">
										<input type="date" class="form-control agregarGen2" name="agregarGen" id="agregarGen2" autocomplete="off" placeholder="Generaciones"> -->
									</div>
									<button type="submit" class="btn btn-primary me-2">Agregar</button>
								</form>

								<!-- TABLEE -->
								<div class="table-responsive mt-4">					
								<table class="table table-hover table-bordered table-striped mt-3 formularios">

								<thead>
								<tr>
									<th>#</th>
									<th>Generación</th>
									<th>Nivel</th>
									<th></th>
								</tr>
								</thead>
										<tbody>
										<?php
												$generaciones = formulariosCtr::consultarGeneracionesCtr();
												foreach ($generaciones as $key => $value) {
													$nivel= nivelesCtr::consultarNivelesIdCtr($value["id_nivel"]);

													echo '
													<tr>
													<td>'.($key+1).'</td>
													<td>'.$value["generacion"].'</td>
													<td>'. mb_strtoupper($nivel["nivel"]).'</td>
													<td>
													<button title="Editar generacion" data-bs-toggle="modal" data-bs-target="#editarGeneracionModal"  
													type="button" editarGeneracion="'.$value["Id"].'" class="btn btn-primary btn-icon editarGeneracion">
													<i data-feather="edit-2"></i>
													</button>
													   
													<button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Eliminar generacion" type="button" class="btn btn-danger btn-icon eliminarGeneracion">
														<i data-feather="trash-2"></i>
													</button>


													</td>
													</tr>
												';
												}
											
											?>			
	


										</tbody>
								</table>
								</div>
								<!-- FIN TABLE -->
                            </div>
                            </div>
                        </div>

						<!-- GRUPOS -->
						<div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                        <div class="card-body">

								<h6 class="card-title" id="grupo">Grupos</h6>

								<form id="agregarGrupos">
									<div class="mb-3">
									<label for="" class="form-label">Grupos</label>
										<div class="row mt-3">
											<div class="col-12 mb-3">
											<select  name="grupo" id="grupo" class="grupo form-select " >
											<option value="0" selected disabled>Selecciona el grupo...</option>
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="C">C</option>
											<option value="E">E</option>
											<option value="F">F</option>
											<option value="G">G</option>
	
												
											</select>
											</div>
											<div class="col-12 mb-3">
											<select  name="nivelGrupo" id="nivelGrupo" class="nivelGrupo form-select " >
											<option value="0" selected disabled>Selecciona el nivel...</option>
											<?php


																   $ruta = null;
																	$niveles = nivelesCtr::consultarNivelesCtr($ruta);
																	foreach ($niveles as $key => $value) {
																		echo '
																			<option value="'.$value["Id"].'">'.$value["nivel"].'</option>
																		';
																	}
																
															
													?>
												
												</select>
											</div>
											<div class="col-12 mb-3">
											<select  name="gradoGrupo" id="gradoGrupo" class="gradoGrupo form-select " >
											<option value="0" selected disabled>Selecciona el grado...</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
	
												
											</select>
											</div>
										</div>
									</div>
									<button type="submit" class="btn btn-primary me-2">Agregar</button>
								</form>

								<!-- TABLEE -->
								<div class="table-responsive mt-4">					
								<table class="table table-hover table-bordered table-striped mt-3 formularios">

								<thead>
								<tr>
									<th>#</th>
									<th>Grupo</th>
									<th>Nivel</th>
									<th>Grado</th>
									<th></th>
								</tr>
								</thead>
										<tbody>
										<?php
												$generaciones = formulariosCtr::consultarGruposCtr();
												foreach ($generaciones as $key => $value) {
													$nivel= nivelesCtr::consultarNivelesIdCtr($value["id_nivel"]);

													echo '
													<tr>
													<td>'.($key+1).'</td>
													<td>'.$value["grupo"].'</td>
													<td>'. mb_strtoupper($nivel["nivel"]).'</td>
													<td>'. mb_strtoupper($value["id_grado"]).'</td>
													<td>
													<button title="Editar grupo" data-bs-toggle="modal" data-bs-target="#editarGrupoModal"  
													type="button" editarGrupo="'.$value["Id"].'" class="btn btn-primary btn-icon editarGrupo">
													<i data-feather="edit-2"></i>
													</button>
													   
													<button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Eliminar grupo" type="button" class="btn btn-danger btn-icon eliminarGrupo">
														<i data-feather="trash-2"></i>
													</button>


													</td>
													</tr>
												';
												}
											
											?>			
	


										</tbody>
								</table>
								</div>
								<!-- FIN TABLE -->
                            </div>
                            </div>
                        </div>
						
						<!-- MUNICIPIOS -->
						<div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                        <div class="card-body">

								<h6 class="card-title">Municipio</h6>

								<form id="agregarMunicipio">
									<div class="mb-3">
										<label for="agregarMun" class="form-label">Municipio</label>
										<input type="text" class="form-control agregarMun" name="agregarMun" id="agregarMun" autocomplete="off" placeholder="Municipio">
									</div>
									<button type="submit" class="btn btn-primary me-2">Agregar</button>
								</form>

								<!-- TABLEE -->
								<div class="table-responsive mt-4">					
								<table class="table table-hover table-bordered table-striped mt-3 formularios">

								<thead>
								<tr>
									<th>#</th>
									<th>Municipios</th>
									<th></th>
								</tr>
								</thead>
										<tbody>
										<?php
												$municipios = formulariosCtr::consultarMunicipiosCtr();
												foreach ($municipios as $key => $value) {
													echo '
													<tr>
													<td>'.($key+1).'</td>
													<td>'.$value["nombre"].'</td>
													<td>
													<button title="Editar municipios" data-bs-toggle="modal" data-bs-target="#editarMunicipioModal"  
													type="button" editarMunicipio="'.$value["Id"].'" class="btn btn-primary btn-icon editarMunicipio">
													<i data-feather="edit-2"></i>
													</button>
													   
													<button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Eliminar municipio" type="button" class="btn btn-danger btn-icon eliminarMunicipio">
														<i data-feather="trash-2"></i>
													</button>


													</td>
													</tr>
												';
												}
											
											?>			


										</tbody>
								</table>
								</div>
								<!-- FIN TABLE -->
                            </div>
                            </div>
                        </div>
                                
        </div>



				<div class="row">
					<div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                        <div class="card-body">

								<h6 class="card-title">Localidades</h6>

								<form id="agregarLocalidades">
									<div class="mb-3">
										<label for="agregarLoc" class="form-label">Localidades</label>
										<input type="text" class="form-control" name="agregarLoc" id="agregarLoc" autocomplete="on" placeholder="Localidades">
									</div>
									<button type="submit" class="btn btn-primary me-2">Agregar</button>
								</form>

								<!-- TABLEE -->
								<div class="table-responsive mt-4">					
								<table class="table table-hover table-bordered table-striped mt-3 formularios">

								<thead>
								<tr>
									<th>#</th>
									<th>Localidades</th>
									<th></th>
								</tr>
								</thead>
										<tbody>
											<?php
												$localidades = formulariosCtr::consultarLocalidadesCtr();
												foreach ($localidades as $key => $value) {
													echo '
													<tr>
													<td>'.($key+1).'</td>
													<td>'.$value["nombre"].'</td>
													<td>
													<button title="Editar localidad" data-bs-toggle="modal" data-bs-target="#editarLocalidadModal"  
													type="button" editarLocalidad="'.$value["Id"].'" class="btn btn-primary btn-icon editarLocalidad">
													<i data-feather="edit-2"></i>
													</button>
													   
													<button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Eliminar Localidad" type="button" class="btn btn-danger btn-icon eliminarLocalidad">
														<i data-feather="trash-2"></i>
													</button>


													</td>
													</tr>
												';
												}
											
											?>			


										</tbody>
								</table>
								</div>
								<!-- FIN TABLE -->



                            </div>
                            </div>
                			  </div>

			


					<div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                        <div class="card-body">

								<h6 class="card-title">Estado</h6>

								<form id="agregarEstados">
									<div class="mb-3">
										<label for="agregarEst" class="form-label">Estado</label>
										<input type="text" class="form-control" name="agregarEst" id="agregarEst" autocomplete="off" placeholder="Estado">
									</div>
									<button type="submit" class="btn btn-primary me-2">Agregar</button>
								</form>

								<!-- TABLEE -->
								<div class="table-responsive mt-4">					
								<table class="table table-hover table-bordered table-striped mt-3 formularios">

								<thead>
								<tr>
									<th>#</th>
									<th>Estados</th>
									<th></th>
								</tr>
								</thead>
									<tbody>
									<?php
												$estados = formulariosCtr::consultarEstadosCtr();
												foreach ($estados as $key => $value) {
													echo '
													<tr>
													<td>'.($key+1).'</td>
													<td>'.$value["nombre"].'</td>
													<td>
													<button title="Editar estados" data-bs-toggle="modal" data-bs-target="#editarEstadoModal"  
													type="button" editarEstado="'.$value["Id"].'" class="btn btn-primary btn-icon editarEstado">
													<i data-feather="edit-2"></i>
													</button>
													   
													<button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Eliminar estado" type="button" class="btn btn-danger btn-icon eliminarEstado">
														<i data-feather="trash-2"></i>
													</button>


													</td>
													</tr>
												';
												}
											
											?>		


									</tbody>
								</table>
								</div>
								<!-- FIN TABLE -->
                            </div>
                            </div>
                        </div>
                                
        </div>




</div>