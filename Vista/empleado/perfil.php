<?php include('head.php');?> 
<div class="container menu"> 
		<div class="container-fluid">
				<div class="page-header">
					<h2 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Perfil</h2>
				</div>
			</div>
            <div class="row">
				<div class="col-md-5 col-sm-12 col-12 text-center">
					<img src="" width="330px" height="380px" id="foto">
                    <br><br>
                    <label for="archivoImage" style="border-radius: 10px 40px 40px 10px;background-color: #106BA0;cursor: pointer;padding: 11px 30px !important;text-align: center;">Cambiar Foto:</label>
		<input type="file" name="archivoImage" id="archivoImage" max="1" accept=".jpg,.jpeg,.png" style="opacity: 0;position: absolute;">
                </div>
				<div class="col-md-7 col-sm-12 col-12">
                    <div class="form-group">   
                        <label for="identificacion">Numero de identificación</label>
						<input type="number" class="form-control" name="identificacion" id="identificacion" disabled>
                    </div>
                    <div class="form-group">   
                        <label for="nombre">Nombre Completo</label>
						<input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="form-group">   
                        <label for="numer">Numero Celular</label>
						<input type="number" class="form-control" name="numero" id="numero">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="email" class="form-control" name="correo" id="correo">
					</div>
					<div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group text-center">
                    <button class="btn" id="btnFormu" style="background-color: #ffc107;">Actualizar</button>
                    </div>
                </div>
            <br>
        </div><br><br><br>
<?php include('footer.php'); ?>
<script src="../../Controlador/Js/perfil.js"></script>