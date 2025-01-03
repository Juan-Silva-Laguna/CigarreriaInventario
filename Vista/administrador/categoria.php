<?php include('head.php');?>
<div class="container menu"> 
		<div class="container-fluid">
				<div class="page-header">
					<h2 class="text-titles"><i class="zmdi zmdi-book"></i> Categorias</h2>
				</div>
            </div>
            <div class="form-group" id="modal" style="display: block;">
                <button class="btn" id="nuevo" style="background-color: #ffc107;" value="oculto">+</button>
            </div>
            <div class="row">
				<div class="col-md-3 col-sm-12 col-12" id="formulario" style="display: none;">
                    <form id="frmCategoria" autocomplete="off">
                        <input type="hidden"id="idCategoria" name="idCategoria">
                        <div class="form-group">   
                            <label for="labelProveedor">Categoria</label>
                            <input type="text" class="form-control" name="nombreCategoria" id="nombreCategoria"> 
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn" id="btnFormu" style="background-color: #ffc107;"></button>
                        </div>
                    </form>
                </div>
                <div id="divTabla" class="col-md-11">
				<div class="form-group">
                    <table class="table table-striped" id="tableCategoria">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Categoria</th>
                                <th></th>
                                </tr>
                        </thead>
                        <tbody id="tableCategoriaBody">
                        </tbody>                        
                    </table>    
                    <br><br><br><br>
                </div>
            </div>
        </div>
            
<?php include('footer.php'); ?>
<script src="../../Controlador/Js/categoria.js"></script>