<nav class="sidebar">
      <div class="sidebar-header">
      
        <div class="sidebar-brand" style="width: 150px">

            <img style="width: 100%; " src="<?php echo $rutaLocal?>Views/images/logo.png" alt="">
            
        </div>

      
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Principal</li>
          <li class="nav-item">
            <a href="<?php echo $rutaLocal?>dashboard" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $rutaLocal?>mis-datos" class="nav-link">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Mis datos</span>
            </a>
          </li>

          <?php
            if($_SESSION["rol"] == "Admin"){
          ?>

          <li class="nav-item nav-category">Alumnos</li>
          <li class="nav-item">
          <a href="<?php echo $rutaLocal?>alumnos" class="nav-link">
              <i class="link-icon" data-feather="eye"></i>
              <span class="link-title">Alumnos</span>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?php echo $rutaLocal?>niveles" class="nav-link">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">Niveles</span>
            </a>
          </li>
          <!-- NIVELES -->
          <li class="nav-item nav-category">Niveles</li>

          <?php 
          $ruta = null;
          $niveles = nivelesCtr::consultarNivelesCtr($ruta); 
          foreach ($niveles as $key => $value) {
            echo '

            <li class="nav-item">
            <a href="'.$rutaLocal.$value["ruta"]."/".$value["Id"].'" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="'.$value["nivel"].'"> 
                <i class="link-icon" data-feather="award"></i>
                <span class="link-title">'.$value["nivel"].'</span>
              </a>
            </li>
            ';
          }
          
          ?>
          

          <li class="nav-item nav-category">Formularios</li>
          <li class="nav-item">
          <a href="<?php echo $rutaLocal?>formularios" class="nav-link">
              <i class="link-icon" data-feather="inbox"></i>
              <span class="link-title">Formularios</span>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?php echo $rutaLocal?>profesores" class="nav-link">
              <i class="link-icon" data-feather="table"></i>
              <span class="link-title">Profesores</span>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?php echo $rutaLocal?>horarios-individuales" class="nav-link">
              <i class="link-icon" data-feather="table"></i>
              <span class="link-title">Horarios individuales</span>
            </a>
          </li>

          <!-- <li class="nav-item">
          <a href="horarios" class="nav-link">
              <i class="link-icon" data-feather="table"></i>
              <span class="link-title">Horarios</span>
            </a>
          </li> -->

          <?php } ?>


        </ul>
      </div>
    </nav>