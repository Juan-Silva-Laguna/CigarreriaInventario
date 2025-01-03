<!DOCTYPE html>
<html lang="es">
<head>
	<title>Ingresar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/main.css">
	<script src="../JS/jquery-3.4.1.js"></script>
</head>
<body class="cover" style="background-image: url(../IMG/fondo.gif);">
	<section class="ashboard-contentPage">
		<nav class="full-box dashboard-Navbar" style="height: 70px;">
			<ul class="full-box list-unstyled text-right">
				<div class="full-box text-center text-titles dashboard-sideBar-title" style="height: 70px;">
					<img src="../IMG/logoEstanco.svg" style="width:70px; height:70px;padding:1px;"> Cigarrería Perez 
				</div>
			</ul>
		</nav>
	</section>
	<form class="full-box logInForm" autocomplete="off" id="formulario">
		<p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
		<div id="mensajes"></div>
		<div id="grupo">
			<p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>
			<div class="form-group label-floating">
			<label class="control-label" for="UserEmail">E-mail</label>
			<input class="form-control" id="UserEmail" name="UserEmail" type="email" style="color: #fff;">
			<p class="help-block">Escribe tú E-mail</p>
			</div>
			<div class="form-group label-floating">
			<label class="control-label" for="UserPass">Contraseña</label>
			<input class="form-control" id="UserPass" name="UserPass" type="password" style="color: #fff;">
			<p class="help-block">Escribe tú contraseña</p>
			</div>
			<div class="form-group label-floating">
				<label class="control-label" for="rol">Escoge tu rol</label>
				<input class="form-control" type="text" id="UserRol" name="UserRol" list="rol" style="color: #fff;">
				<datalist id="rol">
					<option value="Empleado"></option>
					<option value="Administrador"></option>
				</datalist>
			</div>
			<div class="form-group text-center">
				<input type="submit" value="Iniciar sesión" class="btncolor" id="btn_iniciar">
				<br>
				<input type="checkbox" name="olvido" id="olvido"> <label class="control-label" for="olvido"> Olvide mi contraseña</label>
			</div>
			
		</div>
	</form>
	<div class="copyright"><p>Copyright <span style="color:#ffc107;">2020 &copy;</span>, Todos los derechos reservados. Cigarrería Perez.</p></div>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2.3.2/dist/email.min.js"></script>
	<script src="../Controlador/Js/login.js"></script>
</body>
</html>