<?php include('head.php');?>
<div class="container menu"> 
		<div class="container-fluid">
				<div class="page-header">
					<h2 class="text-titles"><i class="zmdi zmdi-accounts"></i> Empleados</h2>
				</div>
			</div>
            <div class="form-group" id="modal" style="display: block;">
                <button class="btn" id="nuevo" style="background-color: #ffc107;" value="oculto">+</button>
            </div>
            <div class="row">
				<div class="col-md-3 col-sm-12 col-12" id="formulario" style="display: none;">
                    <form id="frmProducto" autocomplete="off">
                        <div class="form-group">   
                            <label for="labelIden">Numero de identificación</label>
                            <input type="number" class="form-control" name="identificacion" id="identificacion">
                        </div>
                        <div class="form-group">   
                            <label for="labelNombre">Nombre Completo</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                        <div class="form-group">   
                            <label for="labelNumero">Numero Celular</label>
                            <input type="number" class="form-control" name="numero" id="numero">
                        </div>
                        <div class="form-group">
                            <label for="labelCorreo">Correo</label>
                            <input type="email" class="form-control" name="correo" id="correo">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn" id="btnFormu" style="background-color: #ffc107;">Crear Empleado</button>
                        </div>
                    </form>
                </div>
                <div id="divTabla" class="col-md-11">
                    <div class="form-group">
                        <table class="table table-striped" id="tableEmpleado">
                            <thead>
                                <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Celular</th>
                                <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="tableEmpleadoBody"></tbody>                            
                        </table>    
                        
                    </div>
                </div>
            </div>
            <br><br><br><br>
<?php include('footer.php'); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2.3.2/dist/email.min.js"></script>
<script src="../../Controlador/Js/empleado.js"></script>