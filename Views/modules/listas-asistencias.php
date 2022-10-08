<div class="page-content">


    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
              <nav class="page-breadcrumb">
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo $_GET["licenciatura"]."?id_licenciatura=".$_GET["id_licenciatura"] ?>">Acciones</a></li>
            <li class="breadcrumb-item active" aria-current="page">LISTA DE ASISTENCIAS - <b><?php echo mb_strtoupper(str_replace("-"," ",$_GET["licenciatura"]))?></b></li>
              </ol>
             </nav>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
          <a type="button" href="<?php echo  'inscribir-alumno?licenciatura='.$_GET["licenciatura"]."&id_licenciatura=".$_GET["id_licenciatura"] ?>" class="btn btn-primary btn-icon-text me-2 mb-2 mb-md-0 "><i class="link-icon mr-2" data-feather="user-plus"></i> Inscribir alumno</a>
            <a type="button" href="<?php echo  'ver-alumnos?licenciatura='.$_GET["licenciatura"]."&id_licenciatura=".$_GET["id_licenciatura"] ?>" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0 "><i class="link-icon ml-2" data-feather="eye"></i> Ver alumnos</a>

          </div>
        </div>



				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">



                 <div class="card">
               <div class="card-body">

               <div class="row">
                
                 
                    <?php
                      $tabla = "cuatrimestres";
                      $id = $_GET["id_licenciatura"];
                      $cuatrimestres = materiasCtr::consultarCuatrimestresCtr($tabla, $id);

                        foreach ($cuatrimestres as $key => $cuatri) {
                          echo '
                          <div class="col-1 mb-3">
                          <form target="_blank"  method="POST">
                          <button type="submit" name="listaAsistencia" class="btn btn-secondary ">'.$cuatri["Cuatrimestre"].'</button>
                           <input type="hidden" name="idcarrera" value="'.$cuatri["Id_carrera"].'"> 
                           <input type="hidden" name="no_cuatrimestre" value="'.$cuatri["Cuatrimestre"].'"> 
                           </form>
                           </div>
                          ';
                        }
                        $cedula = new formatosCtr();
                        $cedula->formatoCtr();

                       
                    ?>
                     
                 
            </div>
                       
               
                <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped " id="materias">

                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Clave</th>
                        <th>Materia</th>
                        <th>Cuatrimestre</th>
                      </tr>
                    </thead>
                    <tbody>
                                 
                            <?php 
                             $id= $_GET["id_licenciatura"];
                             $tabla = "materias";
                            $materias = materiasCtr::consultarMateriasCtr($id, $tabla);
                                    foreach ($materias as $key => $value) {
                                        echo '
                                            <tr>
                                            <td>'.($key+1).'</td>
                                            <td>'.$value["Clave"].'</td>
                                            <td>'.$value["Nombre"].'</td>
                                            <td>'.$value["Cuatrimestre"].'</td>
                                                            
                                            </tr>
                                            ';
                                    }

                            
                            ?>

                    </tbody>
                  </table>
                  
                 
                  </div>
            </div>
					</div>
				</div>


                






			</div>




            
<!-- EDITAR ALUMNO MODAL -->


</div> 