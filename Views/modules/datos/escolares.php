<div class="col-lg-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">DATOS ESCOLARES</h4>

                      <div class="mb-3">
                        <label for="NivelSolicitado" class="form-label">Nivel solicitado</label>

                        <?php
                         
                         if(isset($url[1])){
                            $id = $url[1];   
                            $nivel = nivelesCtr::consultarNivelesIdCtr($id);
                         }
                        
                         
                        if(isset($url[6])){
                            if($url[6] == "inscribir-alumno"){
                           
                                echo '<input type="text" class="form-control" readonly name="nivel" id="nivel" class="nivel" value="'.mb_strtoupper($nivel["nivel"]).'">
                                <input type="hidden" readonly value="'.$nivel["Id"].'" id="id_nivel" class="form-control id_nivel" name="id_nivel">
                                ';
                            }else{
                                if($url[6] == "ver-alumnos"){
                                    $ruta = null;
                                    $niveles = nivelesCtr::consultarNivelesCtr($ruta);
                                    echo ' <select class="form-select nivel" name="nivel" id="nivel">';
                                    foreach ($niveles as $key => $nivel) {
                                        echo '
                                        <option value="'.$nivel["nivelM"].'">'.$nivel["nivelM"].'</option>
                                     ';
                                    }
                                    echo ' </select>
                                    <input type="hidden" readonly  id="id_nivel" class="form-control id_nivel" name="id_nivel">
                                    ';
                                  
                            }
                        }
                        }else{
                            $ruta = null;
                            $niveles = nivelesCtr::consultarNivelesCtr($ruta);
                            echo ' <select class="form-select nivel" name="nivel" id="nivel">';
                            foreach ($niveles as $key => $nivel) {
                                echo '
                                <option value="'.$nivel["nivelM"].'">'.$nivel["nivelM"].'</option>
                             ';
                            }
                            echo ' </select>
                            <input type="hidden" readonly  id="id_nivel" class="form-control id_nivel" name="id_nivel">
                            ';
                        }
                      

                     ?>
          
                     </select>
                    </div>


                <div class="mb-3">
                        <label for="grado" class="form-label">Grado</label>

                        <?php
                        if(isset($url[6])){
                            if($url[6] == "ver-alumnos"){
                                echo '    
                                <select class="form-select grado"  name="grado" >
                                <option selected value="0">Selecciona el grado...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                              </select>
                                
                                ';
                            }else{
                                echo '<input type="text" class="form-control grado" value="'.$url[3].'" readonly name="grado" id="grado">';
                            }
                        }else{
                            echo '    
                            <select class="form-select grado" name="grado" >
                            <option selected value="0">Selecciona el grado...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                          </select>
                            
                            ';
                        }
                      
                        
                        ?>

                    
                </div>
                <div class="mb-3">
                        <label for="grupo" class="form-label">Grupo</label>
                        <?php

                        if(isset($url[6])){
                            if($url[6] == "ver-alumnos"){
                                echo '    
                                <select class="form-select grupo" name="grupo">
                                <option selected value="0">Selecciona el grupo...</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                              </select>
                                
                                ';
                            }else{
                                echo '    <input type="text" class="form-control grupo" readonly name="grupo" id="grupo" class="grupo" value="'.$url[5].'">';
                            }
                        }else{
                            echo '    
                            <select class="form-select grupo" name="grupo">
                            <option selected value="0">Selecciona el grupo...</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                          </select>
                            
                            ';
                        }
                       
                        
                        ?>
                </div>

                <div class="mb-3">

                 <?php

                 if(isset($url[2])){
                    if($url[2] != 4){ ?>
                  
                  <input type="hidden" class="form-control" readonly name="semestre" id="semestre" class="semestre" value="0">
              
              
                <?php }else {?>
                    <label for="semestre" class="form-label">Semestre</label>
                    <?php
                        if($url[6] == "ver-alumnos"){
                        echo '<select class="form-select semestre" name="semestre" id="semestre">';
                       }else{
                         echo '<select class="js-example-basic-single form-select semestre"  name="semestre" id="semestre">';
                       }
                       ?>
                        <option value="0" selected disabled>Selecciona el semestre...</option>
                        <?php

                        $tabla = "semestres_bachillerato";
                        $semestre = nivelesCtr::seleccionarSemestresCtr($tabla);
                    foreach ($semestre as $key => $value) {
                        echo '
                            <option value="'.$value["no_semestre"].'">'.$value["semestre"].'</option>
                        ';
                    }
                    ?>

                 <?php }
                 }else { ?>
                    
                    <input type="hidden" class="form-control" readonly name="semestre" id="semestre" class="semestre" value="0">
                 <?php } ?>

                 </div>
                <div class="mb-3">
                        <label for="generacion" class="form-label">Generación</label>


                        <?php

                        
                        $generacion = alumnosCtr::seleccionarGeneracionCtr();

                        if(isset($url[6])){
                            if($url[6] == "ver-alumnos"){

                                echo '
                                
                                <select class="form-select generacion" required name="generacion" id="generacion">
                                <option value="0" selected disabled>Selecciona la generación...</option>';
                                  foreach ($generacion as $key => $value) {
                                echo '
                                    <option value="'.$value["generacion"].'">'.$value["generacion"].'</option>
                                ';
                                  }
        
                               }else{
                                 echo '
                                 <input type="text" readonly value="'.$url[2].'" class="form-control generacion" name="generacion" id="generacion">';
                               }
                        }else{
                            echo '
                                
                                <select class="form-select generacion" required name="generacion" id="generacion">
                                <option value="0" selected disabled>Selecciona la generación...</option>';
                                  foreach ($generacion as $key => $value) {
                                echo '
                                    <option value="'.$value["generacion"].'">'.$value["generacion"].'</option>
                                ';
                                  }
                        }
                        
                       ?>

                     
                     </select>
                    </div>
                <div class="mb-3">
                        <label for="turno" class="form-label">Turno</label>

                        <?php
                        if(isset($url[6])){
                            if($url[6] == "ver-alumnos"){
                                echo '<select class="form-select turno" name="turno" id="turno">';
                               }else{
                                 echo '<select class="js-example-basic-single form-select turno" name="turno" id="turno">';
                               }
                        }else{
                            echo '<select class="form-select turno" name="turno" id="turno">';
                        }
                      
                       ?>
                        <option value="0" selected disabled>Selecciona el turno...</option>

                            <option value="MATUTINO">MATUTINO</option>
                            <option value="VESPERTINO">VESPERTINO</option>

                     </select>
                    </div>


                    <div class="mb-3">
                    <div class="form-group p-3" style="border: thin solid rgba(0,0,0,0.25); border-radius: 5px; position:relative; margin-top: 30px">
                <h6 style="padding: 0 5px ;position:absolute; top: -10px; left: 20px; background:#fff;"><b>REGISTRO DE DOCUMENTACIÓN</b></h6>

                <div class="row">
                    <div class="col-md-6 col-lg-6">
                    <div class="mt-4 col-md-12 col-lg-12">

                <div class="form-check">
                <input class="form-check-input inputCheck certBach" type="checkbox" id="certBach" name="certBach">
                <label class="form-check-label inputCheck" for="certBach">
                    CERTIFICADO
                </label>
                </div>
                </div>
                <div class="mt-4 col-md-12 col-lg-12">
                <div class="form-check">
                    <input class="form-check-input inputCheck actaNac" type="checkbox" id="actaNac" name="actaNac">
                    <label class="form-check-label inputCheck" for="actaNac">
                        ACTA DE NACIMIENTO
                    </label>
                    </div>
                </div>

                <div class="mt-4 col-md-12 col-lg-12">
                <div class="form-check ">
                    <input class="form-check-input inputCheck certM" type="checkbox" id="certM" name="certM">
                    <label class="form-check-label inputCheck" for="certM">
                        CERTIFICADO MÉDICO
                    </label>
                    </div>
                </div>

                <div class="mt-4 col-md-12 col-lg-12">
                <div class="form-check ">
                    <input class="form-check-input inputCheck fotosI" type="checkbox" name="fotosI" id="fotosI">
                    <label class="form-check-label inputCheck" for="fotosI">
                        FOTOS INFANTILES B/N
                    </label>
                    </div>
                </div>

                <div class="mt-4 col-md-12 col-lg-12">
                <div class="form-check ">
                    <input class="form-check-input inputCheck CURPcheck" type="checkbox" name="CURPcheck" id="CURPcheck">
                    <label class="form-check-label inputCheck" for="CURPcheck">
                        CURP
                    </label>
                    </div>
                </div>

                </div>

                    <div class="col-md-6 col-lg-6" style="overflow: hidden">
                        <h5>SUBIR FOTO</h5>

                        <hr>

                        <!-- <input type="text"  name="previsualizar" class="previsualizar"> -->
                        <?php

                        if(isset($url[6])){
                            if($url[6] == "ver-alumnos"){
                                echo '
                                <img src="" style="width:100px; display:block; margin:5px auto" class="form-control imagenPreview">
                                <input type="hidden" name="foto_preview" class="foto_preview">
                                ';                          
                                }
                        }else{
                            echo '
                            <img src="" style="width:100px; display:block; margin:5px auto" class="form-control imagenPreview">
                            <input type="hidden" name="foto_preview" class="foto_preview">
                            ';    
                        }
                        
                        ?>
                        <input type="file" id="myDropify" 
                        data-max-file-size-preview="1M" 
                        data-allowed-file-extensions="png jpg"
                        data-max-file-size="1M"
                        data-min-width="400"
                        data-max-height="2000"
                        name="foto"
                        class="foto"
                        />
                        <p class="help-block">Peso máximo 1mb en formato PNG O JPG <br> Imagen de 837px * 1004px</p>
                    </div>
                </div>

                <div class="row mt-4">
                    <label style="margin: 7px 10px 0 0" for="">OTROS: </label>
                    <input style="width: 100%" type="text" name="otros" class="form-control otros" placeholder="Detalla los documentos">
                </div>
            </div>



                    </div>

     </div>
                

        </div>
    </div>
