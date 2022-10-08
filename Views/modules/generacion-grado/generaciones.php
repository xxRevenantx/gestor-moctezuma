

        <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">

        <?php

                            $generaciones = generacionesCtr::consultarGeneracionesNivelesCtr($url[1]);

                            if(!empty($generaciones)){
                              foreach ($generaciones as $key => $value) {
                                echo '
                                           
                               <a class="nivelesCard col-md-3 grid-margin stretch-card" href="'.$rutaLocal.$url[0]."/".$url[1]."/".$value["generacion"].'/1" >
                            
                                 <div class="card nivelesCardHover">
                                   <div class="card-body">
                                 
                                     <div class="d-flex justify-content-start align-items-center">
                                     <img style="width:40px; display:inline-block; margin-right: 20px" src="'.$rutaLocal.'Views/images/generacion.png" alt="generacion">
                                     <h6 class="card-title mb-0">'.$value["generacion"].'</h6>
                                     </div>
                                                                   
                                     
                                   </div>
                                 </div>
                                 </a>
                                            ';
                                       }
                            }else{
                              echo '<div class="alert alert-danger" role="alert">
                              <i data-feather="alert-circle"></i> NO EXISTEN GENERACIONES PARA '. mb_strtoupper($url[0]) .' <a class="btn btn-primary ml-3" href="'.$rutaLocal.'formularios#generacion">Agregar nueva generación</a>
                            </div>';
                            }
                              
            ?>


              </div>
            </div>
        </div> 

