<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
					<?php
					
					  date_default_timezone_set("America/Mexico_City");
					  setlocale(LC_TIME, 'spanish');
					  $fecha = strftime("%d de %B de %Y %H:%M");

					  echo "<p class='mt-3 d-none d-lg-block text-uppercase'>".$fecha."</p>";
					?>
			
					<ul class="navbar-nav">
					<li class="nav-item ">
					
							<a class="nav-link" href="<?php echo $rutaLocal."/".$url[0]."/".$url[1]."/".$url[2]."/".$url[3]."/".$url[4] ?>" role="button">
					
								<i data-feather="dollar-sign" class="mr-3"></i>
								<div class="indicator ml-2">
									<div class="circle">
									<span style="font-size:9px" class="ml-4 badge bg-primary">0</span>
									</div>
								</div>
							</a>
							
					</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php 
									if($_SESSION["rol"] == "Admin"){
										echo $_SESSION["nombre"];
									}else{
										echo "HOLA, <b>".$_SESSION["nombre"]."</b>";
									}
							
								 ?>
								<img class="wd-30 ht-30 rounded-circle" src="<?php echo $rutaLocal."Views/images/logo-moctezuma.jpg"?>" alt="<?php echo $_SESSION["nombre"] ?>">
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
								<div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
									<div class="mb-3">
										<img class="wd-80 ht-80 rounded-circle" src="<?php echo $rutaLocal."Views/images/logo-moctezuma.jpg" ?>" alt="<?php echo $_SESSION["nombre"] ?>">
									</div>
									<div class="text-center">
										<p class="tx-16 fw-bolder"><?php echo $_SESSION["rol"]?></p>
										<!-- <p class="tx-12 text-muted">amiahburton@gmail.com</p> -->
									</div>
								</div>
                <ul class="list-unstyled p-1">
                  <li class="dropdown-item py-2">
                    <a href="mis-datos" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="user"></i>
                      <span>Mis datos</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="<?php echo $rutaLocal?>logout" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="log-out"></i>
                      <span>Salir</span>
                    </a>
                  </li>
                </ul>
							</div>
						</li>
					</ul>
				</div>
			</nav>


