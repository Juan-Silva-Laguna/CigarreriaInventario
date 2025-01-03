<?php include('head.php');?>
<div class="container menu"> 
		<div class="container-fluid">
				<div class="page-header">
					<h2 class="text-titles"><i class="zmdi zmdi-mall"></i> Productos</h2>
				</div>
            </div>
            <div class="row">
				<div class="col-md-3 col-sm-12 col-12" style="display: block;">
                <form id="frmVender" autocomplete="off">
               	    <input type="hidden"id="txtIdPlato" name="txtIdPlato">
                       <div class="form-group">   
                        <label for="labelProducto">Producto</label>
						<input type="text" class="form-control" name="producto" id="producto" list="productos"> 
						<datalist id="productos"></datalist>
                    </div>
                    <div class="form-group">   
                        <label for="cant">Cantidad</label>
						<input type="text" class="form-control" name="cantidad" id="cantidad"> 
                    </div>
                    <div class="form-group text-center">
                    <button class="btn" id="btnFormu" style="background-color: #ffc107;">Vender</button>
                    </div>
                </form>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <table class="table table-striped" id="tableProducto">
                            <thead>
                                <tr>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio Unitario</th>
                                <th scope="col">Categoria</th>
                                </tr>
                            </thead>
                            <tbody id="tableProductoBody">
                            </tbody>
                        </table>   
                         
                    </div>
                
                </div>
            
        </div>
        <br><br><br>
<?php include('footer.php'); ?>
<script src="../../Controlador/Js/venderProducto.js"></script>