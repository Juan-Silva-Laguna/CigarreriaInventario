<?php
session_start();
    if ($_SESSION['rol'] != 'Administrador') {
        header('Location: ../IniciarSesion.php');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../CSS/main.css">
	<link rel="stylesheet" href="../../CSS/dataTables.min.css">
	<!-- JavaScript -->
	<script src="../../JS/alertify.min.js"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="../../CSS/alertify.min.css"/>
	<!-- Default theme -->
	<link rel="stylesheet" href="../../CSS/themes/default.min.css"/>
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="../../CSS/themes/semantic.min.css"/>
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="../../CSS/themes/bootstrap.min.css"/>
</head>
<body>
	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-ct">
			<div class="full-box text-center text-titles dashboard-sideBar-title">
				<a href="index.php"><img src="../../IMG/logoEstanco.svg" style="width:60px; height:40px;padding:1px;"></a> Cigarrería Perez <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i> 
			</div><br><br>
			<a href="perfil.php" class="btn-sideBar-SubMenu" style="text-decoration:none;">
				<div class="full-box dashboard-sideBar-UserInfo" style="margin-top: 1px; position: relative;">
					<figure class="full-box" style="position: relative;">
						<img src="" id="fotoG" ><br>
						<figcaption class="text-center text-titles" id="colorusername"></figcaption>
						<input type="hidden" id="usuarioG" value="<?php echo $_SESSION['usuario']; ?>">
					</figure>
				</div>
			</a>
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					<a href="index.php">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Inicio
					</a>
				</li>
				<li>
					<a href="pedidos.php" class="btn-sideBar-SubMenu">
					<i class="zmdi zmdi-assignment-o"></i> Pedidos
					</a>
				</li>
				<li>
					<a href="ventas.php" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-shopping-cart"></i> Ventas
					</a>
				</li>
				<li>
					<a href="proveedor.php" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-store"></i> Proveedores
					</a>
				</li>
				<li>
					<a href="categoria.php" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-book"></i> Categorias
					</a>
				</li>
				<li>
					<a href="productos.php" class="btn-sideBar-SubMenu">
					<i class="zmdi zmdi-mall"></i> Productos
					</a>
				</li>
				<li>
					<a href="reporte.php" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-chart"></i> Reportes
					</a>
				</li>
				<li>
					<a href="empleados.php" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-accounts"></i> Empleados
					</a>
				</li>
				<li>
					<a href="mensajes.php" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-email"></i> Mensajes
					</a>
				</li>
				<br><br>
			</ul>			
		</div>
		<a href="#" id="btn_salir" class="btn-sideBar-SubMenu">
			<div class="btnSalirSession"  style="position: absolute; bottom: 0px; left: 0px;">
				<span>
					<i class="zmdi zmdi-power"></i> Salir
				</span>
			</div>
		</a>
	</section>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<nav class="full-box dashboard-Navbar">
			<ul class="full-box list-unstyled text-right">
				<li class="pull-left">
					<a href="#" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
				</li><!--Fecha y hora--> 
				<div class="fechahora"> 
					<!-- Fecha local -->
						<p id="diaSemana"></p> <p id="dia"></p><p>/</p><p id="mes"></p><p>/</p> <p id="year"></p>.
					<!-- Hora local -->
					<p id="horas"></p> <p>: </p> <p id="minutos"></p> <p>: </p> <p id="segundos"></p> <p id="ampm"></p>
				</div>
				<li>
					<a href="../../Manuales/manualAdministrador.pdf"  target="_blank" class="btn-modal-help">
						<i class="zmdi zmdi-help-outline"></i>
					</a>
				</li>
			</ul>
		</nav>
		
	