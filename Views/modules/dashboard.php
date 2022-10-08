<div class="page-content">

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Bienvenido a tu Dashboard</h4>
    <?php 
    echo "Tu dirección IP es: {$_SERVER['REMOTE_ADDR']}";
    ?>
  </div>
</div>

<?php

  $id = null;
  $tabla = null;
  $generacion = null;
 $cedula = alumnosCtr::consultarAlumnosCtr($id, $tabla, $generacion);



$activos = 0;
$suspendidos = 0;
$bajas  = 0;
  foreach ($cedula as $key => $value) {
          switch ($value["Status"] ) {
            case 'ACTIVO':
              $activos++;
              break;
            case 'SUSPENDIDO':
              $suspendidos++;
              break;
            case 'BAJA':
              $bajas++;
              break;
            
            default:
              # code...
              break;
          }
  }
 
?>

<div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow-1">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">ACTIVOS</h6>
              <div class="dropdown mb-2">
                <button class="btn p-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                  <button  class="dropdown-item d-flex align-items-center"  data-bs-toggle="modal" data-bs-target="#modalActivos">
                    <i data-feather="eye" class="icon-sm me-2"></i>
                     <span class="">Ver</span></button>


                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2"><?php echo ($activos) ?></h3>
                <div class="d-flex align-items-baseline">
                  <p class="text-success">
                    <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                  </p>
                </div>
              </div>
              <div class="col-6 col-md-12 col-xl-5">
              <img class="imgEstadistica" src="<?php echo $rutaLocal."Views/images/activos.png"?>" alt="activos">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">SUSPENDIDOS</h6>
              <div class="dropdown mb-2">
                <button class="btn p-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                <button  class="dropdown-item d-flex align-items-center"  data-bs-toggle="modal" data-bs-target="#modalSuspendidos">
                    <i data-feather="eye" class="icon-sm me-2"></i>
                     <span class="">Ver</span></button>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2"><?php echo $suspendidos ?></h3>
                <div class="d-flex align-items-baseline">
                  <p class="text-danger">
                    <i data-feather="minus" class="icon-sm mb-1"></i>
                  </p>
                </div>
                
              </div>
              <div class="col-6 col-md-12 col-xl-5">
              <img class="imgEstadistica" src="<?php echo $rutaLocal."Views/images/suspendido.png"?>" alt="suspendido">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">BAJAS</h6>
              <div class="dropdown mb-2">
                <button class="btn p-0" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                <button  class="dropdown-item d-flex align-items-center"  data-bs-toggle="modal" data-bs-target="#modalBajas">
                    <i data-feather="eye" class="icon-sm me-2"></i>
                     <span class="">Ver</span></button>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2"><?php echo $bajas ?></h3>
                <div class="d-flex align-items-baseline">
                  <p class="text-danger">
                    <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                  </p>
                </div>
              </div>
              <div class="col-6 col-md-12 col-xl-5">
              <img class="imgEstadistica" src="<?php echo $rutaLocal."Views/images/baja.png"?>" alt="baja">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 



<div class="row"></div>
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow-1">

    <?php
      $estadistica = dashboardCtr::consultarDashboardCtr();
      $inscripcion = dashboardCtr::consultarPagoInscripcionesCtr();
      $colegiatura = dashboardCtr::consultarPagoColegiaturasCtr();
      $recibos = dashboardCtr::consultarRecibosCtr();

      $pagoInscripcion = $inscripcion["inscripcion"];
      $pagoColegiatura = $colegiatura["colegiatura"];

      $reciboInscripcion = 0;
      $reciboColegiatura = 0;

      foreach ($recibos as $key => $value) {
            if($value["Concepto"] == "INSCRIPCION"){
              $reciboInscripcion++;
            }else{
              $reciboColegiatura++;
            }
      }


      $totales = array($pagoInscripcion, $pagoColegiatura, $reciboInscripcion, $reciboColegiatura);


      foreach ($estadistica as $key => $value) {
    ?>

      <div class="col-md-4 grid-margin stretch-card" style="overflow: hidden">
        <div class="card">
          <div class="card-body ">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0"><?php echo $value["Nombre"] ?></h6>
              <div class="dropdown mb-2">
                <button class="btn p-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                  <button  class="dropdown-item d-flex align-items-center"  data-bs-toggle="modal" data-bs-target="">
                    <i data-feather="eye" class="icon-sm me-2"></i>
                     <span class="">Ver</span></button>


                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">

              <?php
                if($value["url"] != "recibos-inscripciones" && $value["url"] != "recibos-colegiaturas"){
                  echo '  <h3 class="mb-2">$'.number_format($totales[$key]).'</h3>';
                }else{
                  echo '  <h3 class="mb-2">'.$totales[$key].'</h3>';
                }
              ?>
              


              </div>
              <div class="col-6 col-md-12 col-xl-5">
                <img class="imgEstadistica" src="<?php echo $value["icon"]?>" alt="">
              </div>


            </div>
          </div>
        </div>
      </div>

      
<?php
      }
  ?>
     
    </div>
  </div>




      <!-- //CHARTS -->
      <div class="row">
          <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">GRÁFICAS DEL CENTRO UNIVERSITARIO MOCTEZUMA</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                <canvas id="chartjsBar" width="300" height="100"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->

      
            <!-- /.card -->

          </div>
  
          <!-- /.col (RIGHT) -->
        </div>

        <?php require "acciones/modales-dashboard.php" ?>

    </div>


<!-- MODALES -->



