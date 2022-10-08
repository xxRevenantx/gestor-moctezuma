<div class="page-content">

<?php
          include 'Views/modules/componentes/breadcrum.php';
?>






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