<?php

Funciones::swalMixin("top","success","Saliendo...");

session_destroy();
echo '<script>window.location = "'.$rutaLocal.'"</script>';
