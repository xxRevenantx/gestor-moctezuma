<div class="page-content">
<div class="row">
					<div class="col-md-12 stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Mis datos académicos</h6>

                                <?php 
                               
                                $datos = alumnosCtr::consultarAlumnoIdCtr(); 
                                date_default_timezone_set("America/Mexico_City");
                                setlocale(LC_TIME, 'es_MX.UTF-8', 'spanish');

                                $fecha = strftime("%d de %B de %Y %H:%M");


                                // Obtener fecha persolizada
                                $fechaNa = $datos["FechaNacimiento"];
                                $nuevaFecha = date("d-m-Y", strtotime($fechaNa));
                                $fechaPersonlizada = utf8_encode(strftime("%A, %d de %B de %Y", strtotime($nuevaFecha)));
                                ?>

                                <hr>
										<div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">CURP</label>
													<input type="text" value="<?php echo mb_strtoupper($datos["CURP"]) ?>" readonly class="form-control">
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Matrícula</label>
													<input type="text" value="<?php echo mb_strtoupper($datos["Matricula"]) ?>" readonly class="form-control">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
										<div class="row">
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">Primer Apellido</label>
													<input type="text" value="<?php echo mb_strtoupper($datos["ApellidoP"]) ?>" readonly class="form-control">
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">Segundo Apellido</label>
													<input type="text" value="<?php echo mb_strtoupper($datos["ApellidoM"]) ?>" readonly class="form-control">
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">Nombre(s)</label>
													<input type="text" value="<?php echo mb_strtoupper($datos["Nombre"]) ?>" readonly class="form-control">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
										<div class="row">
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">Fecha de Nacimiento</label>
													<input type="text" value="<?php echo $fechaPersonlizada?>" readonly class="form-control">
												</div>
											</div><!-- Col -->
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">Entidad de Nacimiento</label>
													<input type="text" value="<?php echo mb_strtoupper($datos["Estado"]) ?>" readonly class="form-control">
												</div>
											</div><!-- Col -->
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">Correo electrónico</label>
													<input type="email" value="<?php echo $datos["Email"] ?>" readonly class="form-control">
												</div>
											</div><!-- Col -->
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">Sexo</label>
													<input type="text" value="<?php echo mb_strtoupper($datos["Sexo"]) ?>" readonly class="form-control">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->


									
							</div>
						</div>
					</div>
				</div>

                <div class="row mt-4 ">
                    <div class="col-12">
                <div class="alert alert-primary" role="alert">
                    <h4 class="text-center text-500"><b>Aviso de privacidad simplificado del CUM</b></h4><br>
                    <p class="text-center"> Los datos personales que se recaban serán utilizados para la identificación, validación, creación de perfil y asignación de matrícula para el seguimiento académico en el CUM.
</p>
                </div>
                </div>

                </div>
</div>