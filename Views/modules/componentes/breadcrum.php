<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
         
<nav class="page-breadcrumb">
            <ol class="breadcrumb">

            <?php if($url[1] == 4) {?>
                  <li class="breadcrumb-item"><a href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/".$url[6]."/".$url[7] ?>">...Atrás</a></li>
            <?php } else { ?>

                  <li class="breadcrumb-item"><a href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5] ?>">...Atrás</a></li>
            <?php } ?>

           


            <li class="breadcrumb-item active" aria-current="page"><b><?php echo mb_strtoupper(str_replace("-"," ",$url[6]))." ".$url[3]."° DE ".mb_strtoupper(str_replace("-"," ",$url[0])). " - GRUPO " ."'".$url[5]."'"?></b></li>
            </ol>
            <p class="text-muted mb-3">Llena todos los campos con la información proporcionada por el alumno</p>
</nav>

<div class="d-flex align-items-center flex-wrap text-nowrap">
          <a type="button" href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/inscribir-alumno" ?>" class="btn btn-primary btn-icon-text me-2 mb-2 mb-md-0 "><i class="link-icon mr-2" data-feather="users"></i> Inscribir alumno</a>
          <a type="button" href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/ver-alumnos" ?>" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0 "><i class="link-icon mr-2" data-feather="eye"></i> Ver alumnos</a>
</div>

      </div>