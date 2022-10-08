<div class="page-content">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title bg-primary p-3 text-white">Editar alumno # <b><?php echo $_GET["id"]; ?></b></h4>
   
<form id="formEditar">          
         <div class="row">
         <input type="text" name="idEditar" value="<?php echo $_GET["id"]; ?>">
        <?php include "Views/modules/datos/generales.php" ?>
        <?php include "Views/modules/datos/contacto.php" ?>
        <?php include "Views/modules/datos/escolares.php" ?>
        <?php include "Views/modules/datos/otros.php" ?>
      </div>

      <div class="row">
          <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
</form>
    </div>
    </div>
</div>