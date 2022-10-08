<div class="col-lg-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">DATOS DE CONTACTO</h4>
               
                    <div class="mb-3">
                        <label for="calle" class="form-label">Calle</label>
                        <input id="calle" class="form-control calle" name="calle" type="text">
                    </div>
                    <div class="mb-3">
                        <label for="noExt" class="form-label">No. exterior</label>
                        <input id="noExt" class="form-control noExt" name="noExt" type="text">
                    </div>
                    <div class="mb-3">
                        <label for="noInt" class="form-label">No. Interior</label>
                        <input id="noInt" class="form-control noInt" name="noInt" type="text">
                    </div>
                    <div class="mb-3">
                        <label for="colonia" class="form-label">Colonia</label>
                        <input id="colonia" class="form-control colonia" name="colonia" type="text">
                    </div>

                    <div class="mb-3">
                        <label for="CP" class="form-label">Código Postal</label>
                        <input id="CP" class="form-control CP" name="CP" type="text">
                    </div>
                

                    <div class="mb-3">
                        <label for="municipio" class="form-label">Municipio</label>

                        <?php 
                       if(isset($url[5])){
                        if($url[5] == "ver-alumnos"){
                            echo "<select class='form-select municipio' name='municipio' id='municipio'>";
                        } else{
                            echo "<select class='js-example-basic-single form-select municipio' name='municipio' id='municipio'>";
                        }
                       }else{
                        echo "<select class='form-select municipio' name='municipio' id='municipio'>";
                    }
                      
                        ?>
                       
                        <option value="0" selected disabled>Selecciona el municipio...</option>
                    <?php
                    $municipio = alumnosCtr::seleccionarMunicipiosCtr();
                    foreach ($municipio as $key => $value) {
                        echo '
                            <option value="'.$value["nombre"].'">'.$value["nombre"].'</option>
                        ';
                    }
                    ?>
          
                     </select>
                    </div>

                    <div class="mb-3">
                        <label for="localidad" class="form-label">Ciudad/Localidad</label>

                        <?php 
                       
                       
                       if(isset($url[5])){
                        if($url[5] == "ver-alumnos"){
                            echo '<select class="form-select localidad" name="localidad" id="localidad">';
                           }else{
                             echo '<select class="js-example-basic-single form-select localidad" name="localidad" id="localidad">';
                           }
                       
                       }else{
                        echo '<select class="form-select localidad" name="localidad" id="localidad">';
                      }
                        
                       ?>
                        <option value="0" selected disabled>Selecciona la localidad...</option>
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
                        <label for="estado" class="form-label">Estado</label>

                        <?php

                        if(isset($url[5])){
                            if($url[5] == "ver-alumnos"){

                                echo '<select class="form-select estado" name="estado" id="estado" data-width="100%">';
                               }else{
                                 echo '<select class="js-example-basic-single form-select estado" name="estado" id="estado" data-width="100%">';
                               }
                        }else{
                            echo '<select class="form-select estado" name="estado" id="estado" data-width="100%">';
                        }
                        
                       ?>
              


                        <option value="0" selected disabled>Selecciona el estado...</option>
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

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input id="telefono" class="form-control telefono" data-inputmask-alias="999-9999999" name="telefono">
                    </div>
                    <div class="mb-3">
                        <label for="movil" class="form-label">Móvil</label>
                        <input id="movil" class="form-control movil" data-inputmask-alias="999-9999999" name="movil">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control email" name="email"  data-inputmask="'alias': 'email'"/>
                    </div>
                    <div class="mb-3">
                        <label for="tutor" class="form-label">Tutor</label>
                        <input id="tutor" class="form-control tutor" name="tutor" type="text">
                    </div>







     </div>
                

        </div>
    </div>
