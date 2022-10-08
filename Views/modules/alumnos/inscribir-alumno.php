<div class="page-content">

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
          <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5] ?>">...Atrás</a></li>
                <li class="breadcrumb-item active" aria-current="page">INSCRIBIR ALUMNO - <b><?php echo mb_strtoupper(str_replace("-"," ",$url[5]))?></b></li>
            </ol>
            <p class="text-muted mb-3">Llena todos los campos con la información proporcionada por el alumno</p>
        </nav>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
      
            <a type="button" href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/"."ver-alumnos" ?>" class="btn btn-primary btn-icon-text me-2 mb-2 mb-md-0 "><i class="link-icon mr-2" data-feather="eye"></i> Ver alumnos</a>


            <!-- <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
              <i class="btn-icon-prepend" data-feather="printer"></i>
              Print
            </button>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
              <i class="btn-icon-prepend" data-feather="download-cloud"></i>
              Download Report
            </button> -->
          </div>
        </div>






<form id="formInscripcion">
<div class="row">


    <!-- DATOS GENERALES -->
    <?php include "Views/modules/datos/generales.php" ?>

    <!-- DATOS DE CONTACTO -->
    <?php include "Views/modules/datos/contacto.php" ?>

    <!-- CONTROL ESCOLAR -->
    <?php include "Views/modules/datos/escolares.php" ?>


 

</div>

   <!-- OTRA FILA -->
   <?php include "Views/modules/datos/otros.php" ?>

<input class="btn btn-primary w-25 m-auto d-block" type="submit" value="Enviar">
</form>

</div>