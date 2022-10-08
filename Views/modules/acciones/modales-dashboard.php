
<!-- ALUMNOS ACTIVOS -->
<div class="modal fade" id="modalActivos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alumnos Activos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">

      <table class="table table-hover table-bordered table-responsive " id="table1">
<thead>
  <tr>
    <th>#</th>
    <th>Nombre</th>
    <th>Apellido Paterno</th>
    <th>Apellido Materno</th>
    <th>Nivel</th>
    <th>Status</th>
    <th>Fecha</th>
    </tr>


        </thead>
        <tbody>

        <?php
          $status = "ACTIVO";
          $activos = alumnosCtr::seleccionarStatusAlumnoCtr($status);
          foreach ($activos as $key => $value) {?>
            <tr>
              <td><?php echo ($key+1)?></td>
              <td><?php echo $value["Nombre"]?></td>
              <td><?php echo $value["ApellidoP"]?></td>
              <td><?php echo $value["ApellidoM"]?></td>
              <td><?php echo $value["Nivel"]?></td>
              <td>
              <span class="badge bg-success"><?php echo $value["Status"]?></span>
            </td>
              <td><?php echo $value["FechaCaptura"]?></td>
            </tr>        


          <?php }?>


        </tbody>
        </table>


     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
  </div>

  <!-- ALUMNOS SUSPENDIDOS -->
  <div class="modal fade" id="modalSuspendidos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alumnos Suspendidos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
      <table class="table table-hover table-bordered table-responsive " id="table1">
<thead>
  <tr>
    <th>#</th>
    <th>Matricula</th>
    <th>Nombre</th>
    <th>Apellido Paterno</th>
    <th>Apellido Materno</th>
    </tr>


        </thead>
        <tbody>

        <?php
          $status = "SUSPENDIDO";
          $suspendido = alumnosCtr::seleccionarStatusAlumnoCtr($status);
          foreach ($suspendido as $key => $value) {?>
            <tr>
              <td><?php echo ($key+1)?></td>
              <td><?php echo $value["ApellidoP"]?></td>
              <td><?php echo $value["ApellidoM"]?></td>
              <td><?php echo $value["Nombre"]?></td>
              <td><?php echo $value["FechaCaptura"]?></td>
            </tr>        


          <?php }?>


        </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
  </div>



  <!-- ALUMNOS BAJAS -->

  <div class="modal fade" id="modalBajas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alumnos dados de Baja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
      <table class="table table-hover table-bordered table-responsive " id="table1">

<thead>
  <tr>
    <th>#</th>
    <th>Nombre</th>
    <th>Apellido Paterno</th>
    <th>Apellido Materno</th>
    <th>Nivel</th>
    <th>Status</th>
    <th>Fecha</th>
    </tr>


        </thead>
        <tbody>

        <?php
          $status = "BAJA";
          $baja = alumnosCtr::seleccionarStatusAlumnoCtr($status);
          foreach ($baja as $key => $value) {?>
            <tr>
              <td><?php echo ($key+1)?></td>
              <td><?php echo $value["Nombre"]?></td>
              <td><?php echo $value["ApellidoP"]?></td>
              <td><?php echo $value["ApellidoM"]?></td>
              <td><?php echo $value["Nivel"]?></td>
              <td>
              <span class="badge bg-danger"><?php echo $value["Status"]?></span>
            </td>
              <td><?php echo $value["FechaCaptura"]?></td>
            </tr>        


          <?php }?>


        </tbody>
        </table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
  </div>