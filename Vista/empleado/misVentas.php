<?php include('head.php');?>
<div class="container menu"> 
		<div class="container-fluid">
				<div class="page-header">
					<h2 class="text-titles"><i class="zmdi zmdi-shopping-cart"></i> Mis Ventas</h2>
				</div>
			</div>
            <div class="row">
				
                <div class="col-md-12">
					<div class="form-group">   
                        <label for="labelPrecioPlato">Ventas de hoy</label>
						<input type="radio" name="consulta" id="consulta1" value="hoy" style="margin-right: 20px;" checked>
						<label for="labelPrecioPlato">Ventas de la semana</label>
						<input type="radio" name="consulta" id="consulta2" value="semana" style="margin-right: 20px;">
						<label for="labelPrecioPlato">Ventas de el mes</label>
						<input type="radio" name="consulta" id="consulta3" value="mes" style="margin-right: 20px;">
                        <label for="labelPrecioPlato">Todas mis Ventas</label>
						<input type="radio" name="consulta" id="consulta4" value="todo">
                    </div>
					
				<div class="form-group">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Total Venta</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                        </tbody>
                        
                    </table>    
                </div>
                </div>
            <br>
        </div>
    </form>
    <br><br>
<?php include('footer.php'); ?>
<script src="../../Controlador/Js/venderProducto.js"></script>