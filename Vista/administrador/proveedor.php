<?php include('head.php');?>
<div class="container menu"> 
		<div class="container-fluid">
				<div class="page-header">
					<h2 class="text-titles"><i class="zmdi zmdi-store"></i> Proveedores</h2>
				</div>
			</div>
            <div class="form-group" id="modal" style="display: block;">
                <button class="btn" id="nuevo" style="background-color: #ffc107;" value="oculto">+</button>
            </div>
            <div class="row">
                <div class="col-md-3"  id="formulario" style="display: none;">
                    <form id="frmProveedor" autocomplete="off">
                        <input type="hidden"id="idProveedor" name="idProveedor">
                        <div class="form-group">   
                            <label for="nom">Nombre Completo</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                        <div class="form-group">   
                            <label for="labelProducto">Categoria</label>
                            <input type="text" class="form-control" name="categoria" id="categoria" list="categ"> 
                            <datalist id="categ"></datalist>
                        </div>
                        <div class="form-group">
                            <label for="labelCategoriaPlato">Numero Celular</label>
                            <input type="number" class="form-control" name="numero" id="numero">
                        </div>
                        <div class="form-group">
                            <label for="labelCategoriaPlato">Correo</label>
                            <input type="email" class="form-control" name="correo" id="correo">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn" id="btnFormu" style="background-color: #ffc107;">Crear Proveedor</button>
                        </div>
                    </form>
                </div>
                <div id="divTabla" class="col-md-11">
                    <div class="form-group">
                        <table class="table table-striped" id="tableProveedor">
                            <thead>
                                <tr>
                                <th scope="col">Categoria</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Correo</th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody id="tableProveedorBody"></tbody>                        
                        </table>    
                    </div>
                </div>
            </div>
    <br><br><br><br>
<?php include('footer.php'); ?>
<script src="../../Controlador/Js/proveedor.js"></script>