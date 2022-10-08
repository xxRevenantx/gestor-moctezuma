<div class="row">

<div class="col-12 grid-margin stretch-card">
    
     <div class="card">
         <div class="card-body">

         <div class="row">


             <div class="col-1 mt-4">
             <div>
             <input class="form-check-input beca" type="checkbox" name="beca" id="beca">
                 <label class="form-check-label" for="beca">
                    BECA
                 </label>
               </div>
             </div>


             <div class="col-2">
             <label for="monto" class="form-label">Monto</label>
             <input class="form-control monto" id="monto" name="monto" placeholder="MONTO AUTORIZADO" />
             </div>


             <div class="col-5">
                  <label for="observaciones" class="form-label">Observaciones</label>
                 <input type="text" name="observaciones" id="observaciones" placeholder="OBSERVACIONES" class="form-control observaciones">
             </div>

             <div class="col-2">
             <div class="mb-3">
                     <label for="status" class="form-label">Status</label>
                     <?php

                        if(isset($url[6])){
                          if($url[6] == "ver-alumnos"){
                            echo '<select required class="form-select status" name="status" id="status">';
                           }else{
                             echo '<select required class="status-select form-select status" name="status" id="status">';
                           }
                        }else{
                          echo '<select required class="form-select status" name="status" id="status">';
                        }
                        
                       ?>
                     <option selected disabled>Selecciona el status...</option>
                     <option value="ACTIVO">ACTIVO</option>
                     <option value="BAJA">BAJA</option>
                     <option value="SUSPENDIDO">SUSPENDIDO</option>
                     <option value="BAJA TEMPORAL">BAJA TEMPORAL</option>
                     <option value="PENDIENTE">PENDIENTE</option>
                  </select>
                 </div>
             </div>

             <div class="col-2">
             <div class="mb-3">
                     <label for="status" class="form-label">Rol</label>
                     <?php
                        if(isset($url[6])){
                          if($url[6] == "ver-alumnos"){
                            echo '<select required class="form-select rol" name="rol" id="rol">';
                           }else{
                             echo '<select required class="rol-select form-select rol" name="rol" id="rol">';
                           }
                        }else{
                          echo '<select required class="form-select rol" name="rol" id="rol">';
                        }
                       
                       ?>
                     <option selected disabled>Selecciona el rol...</option>
                     <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                     <option value="ESTUDIANTE">ESTUDIANTE</option>
                  </select>
                 </div>
             </div>

        
          </div>

          </div>

     </div>
         </div>
</div>