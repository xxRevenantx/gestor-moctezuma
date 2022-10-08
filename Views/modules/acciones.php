
<div class="page-content">
<nav class="page-breadcrumb">
    <ol class="breadcrumb">

        <?php
            if($url[1] == 4){
        ?>
            <li class="breadcrumb-item"><a href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/".$url[6]?>">..Atras</a></li>

        <?php }else { ?>
        
            <li class="breadcrumb-item"><a href="<?php echo $rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]?>">..Atras</a></li>

        
        <?php } ?>
    


        <li class="breadcrumb-item active" aria-current="page"><b><?php echo $url[3]."° DE ".mb_strtoupper(str_replace("-"," ",$url[0])). " - GRUPO " ."'".$url[5]."'"?></b></li>
    </ol>
</nav>



<div class="row">
<?php
    $tabla = "acciones";
    $get = null;
    $submenu = submenuCtr::consultarSubmenuCtr($tabla, $get);

    foreach ($submenu as $key => $sub) {


      // if($sub["url"] != "calificacion-materia"){
       echo ' 
       <div class="col-md-3 col-12 mt-3">
       <div class="card">
           <img src="'.$rutaLocal.$sub["icon"].'" class="card-img-top d-block m-auto mt-3 w-50" alt="'.$sub["titulo"].'">
           <div class="card-body">';

       

           if($url[1] == 4 )
           {
            echo '  <a href="'.$rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/".$url[6]."/".$url[7]."/".$sub["url"].'" class="btn btn-'.$sub["bg"].' d-block m-auto">'.$sub["titulo"].'</a>';
           }else{
            
            if($sub["url"] == "calificaciones"){
            echo '  <a href="'.$rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/".$sub["url"].'/1" class="btn btn-'.$sub["bg"].' d-block m-auto">'.$sub["titulo"].'</a>';
           }else{
            echo '  <a href="'.$rutaLocal.$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4]."/".$url[5]."/".$sub["url"].'" class="btn btn-'.$sub["bg"].' d-block m-auto">'.$sub["titulo"].'</a>';
           }
           }

         

           echo '</div>
           </div>

       </div>

        ';
          // }
    }
?>

</div>
</div>

