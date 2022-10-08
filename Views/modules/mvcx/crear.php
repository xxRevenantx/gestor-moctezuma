
<!-- Plantilla MVCX -->
<?php
if($_SESSION["rol"] != "Admin"){
  Funciones::regresarPagina("dashboard");
  return;
}
?>


<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">MVCX/</span> Crear Modelo-Vista-Controlador-Ajax</h4>

              <div class="row">
           
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                    </div>
                    <div class="card-body">
                      <form method="POST">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Crear MCVX</label>
                          <div class="col-sm-10">
                            <input type="text" required class="form-control" name="crearMVCX" id="basic-default-name" placeholder="MVCX" />
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Crear</button>
                          </div>
                        </div>
                                <?php
                                    $crearMCVX = new crearMcvx();
                                    $crearMCVX->crearMvcxCtr();
                                ?>

                      </form>
                    </div>
                  </div>
                </div>
              
              </div>
            </div>

           
          