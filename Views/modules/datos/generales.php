<div class="col-lg-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">DATOS GENERALES</h4>
               
             
                    <div class="mb-3">
                      

                        <?php

                            if(isset($url[1])){
                                $tabla = "cedula";
                                $grupo = $url[5];
                                $nivel = $url[1];
                                $grado = $url[3];
                                $noProgresivo = alumnosCtr::consultarAlumnosProgresivoCtr($nivel, $tabla, $grupo, $grado);
                            }
                        
                       

                                if(isset($url[5])){

                                if($url[5] != "ver-alumnos"){
                                    if(empty($noProgresivo["NoProgresivo"])){
                                        echo '
                                        <label for="No" class="form-label">No. progresivo</label>
                                        <input id="NoProgresivo" class="form-control NoProgresivo" name="NoProgresivo" value="1" readonly type="text"> ';                                
                                    }else{
                                        echo '
                                        <label for="No" class="form-label">No.</label>
                                        <input id="NoProgresivo" class="form-control NoProgresivo" value="'.($noProgresivo["NoProgresivo"]+1).'" name="NoProgresivo" readonly type="text"> ';          
                                    }
                                  
                                }else{
                                    echo ' 
                                    
                                    <label for="No" class="form-label">No. progresivo</label>
                                    <input id="NoProgresivo" class="form-control NoProgresivo" name="NoProgresivo" readonly type="text"> 

                                    <label for="matriculaA" class="form-label">Matricula</label>
                                    <input id="matriculaA" class="form-control matriculaA" name="matriculaA" readonly type="text"> 
                                    
                                    ';  
                                }
                            }else{
                                echo ' 
                                    
                                <label for="No" class="form-label">No. progresivo</label>
                                <input id="NoProgresivo" class="form-control NoProgresivo" name="NoProgresivo" readonly type="text"> 

                                <label for="matriculaA" class="form-label">Matricula</label>
                                <input id="matriculaA" class="form-control matriculaA" name="matriculaA" readonly type="text"> 
                                
                                ';  
                            }
                               

                           



                        ?>
                      

                    </div>
                    <div class="mb-3 contenedorCURP">
                        <label for="CURP" class="form-label">CURP <small class="text-danger ">*Obligatorio</small></label>
                        <img class="load" src="<?php $rutaLocal?>Views/images/loader.svg" alt="load">
                        <input id="CURP" class="form-control CURP" required name="CURP" type="text">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre(s) <small class="text-danger ">*Obligatorio</small></label></label>
                        <input id="nombre" class="form-control nombre" required name="nombre" type="text">
                    </div>
                    <div class="mb-3">
                        <label for="apellidoP" class="form-label">Apellido Paterno <small class="text-danger ">*Obligatorio</small></label></label>
                        <input id="apellidoP" class="form-control apellidoP" required name="apellidoP" type="text">
                    </div>

                    <div class="mb-3">
                        <label for="apellidoM" class="form-label">Apellido Materno <small class="text-danger ">*Obligatorio</small></label></label>
                        <input id="apellidoM" class="form-control apellidoM" required name="apellidoM" type="text">
                    </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Fecha de Nacimiento</label>
								<div class="input-group date">
									<input type="date" class="form-control fechaN" id="fechaN" name="fechaN">
                              <!-- <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span> -->
							</div>
					</div>

                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input id="edad" class="form-control edad" name="edad" type="text">
                    </div>
						
                      <div class="mb-3">
                        <label class="form-label">Sexo</label>
                        <div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input masculino" value="MASCULINO" name="sexo" id="masculino">
                            <label class="form-check-label" for="masculino">
                            Masculino
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input femenino" value="FEMENINO" name="sexo" id="femenino">
                            <label class="form-check-label" for="femenino">
                            Femenino
                            </label>
                        </div>
                      
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="civil" class="form-label">Estado Civil</label>

                        <?php
                        if(isset($url[6])){
                            if($url[6] == "ver-alumnos"){
                                echo '<select class="form-select civil" name="civil" id="civil">';
                               }else{
                                echo '<select class="js-example-basic-single form-select civil" name="civil" id="civil">';
                              }
                            }else{
                                echo '<select class="form-select civil" name="civil" id="civil">';
                              }
                       
                       ?>
                     
                        <option value="0" selected disabled>Selecciona el estado civil...</option>
                    <?php
                    $estado_civil = alumnosCtr::seleccionarEstadoCivilCtr();
                    foreach ($estado_civil as $key => $value) {
                        echo '
                            <option value="'.$value["nombre"].'">'.$value["nombre"].'</option>
                        ';
                    }
                    ?>
          
                     </select>
                    </div>

                    <div class="mb-3">
                        <label for="lugarNac" class="form-label">Lugar de Nacimiento</label>

                        <?php
                        if(isset($url[6])){
                            if($url[6] == "ver-alumnos"){
                                echo '<select class="form-select lugarNac" name="lugarNac" id="lugarNac">';
                               }else{
                                 echo '<select class="js-example-basic-single form-select lugarNac" name="lugarNac" id="lugarNac">';
                               }
                        }else{
                            echo '<select class="form-select lugarNac" name="lugarNac" id="lugarNac">';
                          }
                        


                       ?>
                      
                        <option value="0" selected disabled>Selecciona el lugar de Nacimiento...</option>
                    <?php
                    $lugar_nacimiento = alumnosCtr::seleccionarLocalidadesCtr();
                    foreach ($lugar_nacimiento as $key => $value) {
                        echo '
                            <option value="'.$value["nombre"].'">'.$value["nombre"].'</option>
                        ';
                    }
                    ?>
          
                     </select>
                    </div>


                    <div class="mb-3">
                        <label for="estadoNac" class="form-label">Estado</label>

                        <?php
                         if(isset($url[6])){
                            if($url[6] == "ver-alumnos"){
                                echo '<select class="form-select estadoNac" name="estadoNac" id="estadoNac">';
                               }else{
                                 echo '<select class="js-example-basic-single form-select estadoNac" name="estadoNac" id="estadoNac">';
                               }
                        }else{
                            echo '<select class="form-select estadoNac" name="estadoNac" id="estadoNac">';
                          }
                        
                       ?>
                        


                        <option value="0" selected disabled>Selecciona el Estado de Nacimiento...</option>
                    <?php
                    $estado_nacimiento = alumnosCtr::seleccionarEstadosCtr();
                    foreach ($estado_nacimiento as $key => $value) {
                        echo '
                            <option value="'.$value["nombre"].'">'.$value["nombre"].'</option>
                        ';
                    }
                    ?>
          
                     </select>
                    </div>
     </div>
                
        </div>
    </div>