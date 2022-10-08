<div class="row">
       <div class="col-sm-3">
                                <div class="mb-3">
                                <label class="form-label">Día</label>
                                <select class="js-example-basic-single form-select dia" name= "dia" data-width="100%">
                                <?php
                                $dias = horariosCtr::consultarHorarioDiasCtr(); 
                                    foreach ($dias as $key => $dia) {
                                        echo '
                                        <option value="'.$dia["Id"].'">'.$dia["dia"].'</option>
                                        ';
                                    }
                                  
                                ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                <label class="form-label">Horas</label>

                                <select class="js-example-basic-single form-select horaHorario" name= "horaHorario">
                                <?php
                                $nivel = $url[1];
                                $grado = $url[3];
                                $grupo = $url[5];
                                $horas = horariosCtr::consultarHorasCtr($nivel, $grado, $grupo);
                                foreach ($horas as $key => $value) {
                                    echo '
                                    <option value="'.$value["Id"].'">'.$value["horas"].'</option>
                                    ';
                                }
                                  
                                ?>
                                    </select>
                                  
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-3">
                                <div class="mb-3">
                                <label class="form-label">Materia</label>
                                <select class="js-example-basic-single form-select materiaHorario" name="materiaHorario" data-width="100%">
                                <?php
                                $nivel = $url[1];
                                $grado = $url[3];
                                $materias = materiasCtr::consultarMateriasCtr($nivel, $grado);
                             
                                    foreach ($materias as $key => $value) {
                                        echo '
                                        <option value="'.mb_strtoupper($value["Id"]).'">'.mb_strtoupper($value["Nombre"]).'</option>
                                        ';
                                    }
                                  
                                  
                                ?>
                                
                                    </select>
                                </div>
                            </div>
                  
                            <div class="col-sm-3">
                                <div class="mb-3">
                                <label class="form-label">Profesor</label>
                                <input class="form-control profesorHorario" name="profesorHorario" readonly type="text">
                                <input class="form-control profesorHorarioId" name="profesorHorarioId" readonly type="hidden">
                                
                                </div>
                            </div>

             </div>
