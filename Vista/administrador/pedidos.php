<?php include('head.php');?>
<div class="container menu"> 
		<div class="container-fluid">
				<div class="page-header">
					<h2 class="text-titles"><i class="zmdi zmdi-assignment-o"></i> Pedidos</h2>
				</div>
			</div>
            <div class="form-group">
                <div class="col-md-2 col-sm-12 col-12" id="modal">
                  <button class="btn" id="nuevo" style="background-color: #ffc107;" value="oculto">+</button>
                </div>
                <div class="col-md-8 text-right">
					<div class="form-group">   
                        <label for="label1">Pedidos Realizados</label>
						<input type="radio" name="consulta" id="consulta1" value="pedidos" style="margin-right: 55px;" checked>
						<label for="label2">Productos Agotados</label>
						<input type="radio" name="consulta" id="consulta2" value="productos" style="margin-right: 55px;">
						<label for="label3">Proveedores</label>
						<input type="radio" name="consulta" id="consulta3" value="proveedores">
                    </div>
				</div>	
            </div>
            <div class="row">
				<div class="col-md-3 col-sm-12 col-12" id="formulario" style="display: none;">
                <form id="frmPedido" autocomplete="off">
               	    <input type="hidden"id="idPedido" name="idPedido">
                    <div class="form-group">   
                        <label for="labelProveedor">Proveedor</label>
						<input type="text" class="form-control" name="proveedor" id="proveedor" list="proveedores"> 
						<datalist id="proveedores"></datalist>
                    </div>
                    <div class="form-group">   
                        <label for="labelProducto">Producto</label>
						<input type="text" class="form-control" name="producto" id="producto" list="productos"> 
						<datalist id="productos"></datalist>
                    </div>
                    <div class="form-group">
                        <label for="labelCantidad">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" id="cantidad">
                    </div>
                    <div class="form-group">
                        <label for="labeltotal">Precio Total del Pedido</label>
                        <input type="number" class="form-control" name="total" id="total">
                    </div>
                    <div class="form-group text-center">
                    <button type="submit" class="btn" id="btnFormu" style="background-color: #ffc107;">Realizar Pedido</button>
                    </div>
                </form>
                </div>
                
                <div id="divTabla" class="col-md-11">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                            <th scope="col" id="col1"></th>
                            <th scope="col" id="col2"></th>
                            <th scope="col" id="col3"></th>
                            <th scope="col" id="col4"></th>
                            </tr>
                        </thead>
                        <tbody id="tableBody"></tbody>
                    </table>    
                </div>
            </div>
        </div>
    <br><br><br><br>
<?php include('footer.php'); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2.3.2/dist/email.min.js"></script>
<script src="../../Controlador/Js/pedido.js"></script>