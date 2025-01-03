<?php include('head.php');?>
<div class="container menu"> 
		<div class="container-fluid">
				<div class="page-header">
					<h2 class="text-titles"><i class="zmdi zmdi-mall"></i> Productos</h2>
				</div>
            </div>
            <div class="form-group" id="modal" style="display: block;">
                <button class="btn" id="nuevo" style="background-color: #ffc107;" value="oculto">+</button>
            </div>
            <div class="row">
                <div class="col-md-3"  id="formulario" style="display: none;">
                    <form id="frmProducto" autocomplete="off">
                        <input type="hidden"id="idProducto" name="idProducto">
                        <div class="form-group">   
                            <label for="labelProveedor">Producto</label>
                            <input type="text" class="form-control" name="producto" id="producto">
                        </div>
                        <div class="form-group">   
                            <label for="labelProducto">Precio Unitario</label>
                            <input type="number" class="form-control" name="precio" id="precio"> 
                        </div>
                        <div class="form-group">   
                            <label for="labelProducto">Categoria</label>
                            <input type="text" class="form-control" name="categoria" id="categoria" list="categ"> 
                            <datalist id="categ"></datalist>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn" id="btnFormu" style="background-color: #ffc107;">Crear Producto</button>
                        </div>  
                    </form>
                </div>
                <div id="divTabla" class="col-md-11">
                    <div class="form-group">
                        <table class="table table-striped" id="tableProducto">
                            <thead>
                                <tr>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio Unitario</th>
                                <th scope="col">Categoria</th>
                                <th></th>
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
<script src="../../Controlador/Js/producto.js"></script>