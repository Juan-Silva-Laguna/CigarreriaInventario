<?php include('head.php');?>
<div class="container menu"> 
		<div class="container-fluid">
				<div class="page-header">
					<h2 class="text-titles"><i class="zmdi zmdi-assignment-o"></i> Pedidos</h2>
				</div>
			</div>
            <div class="form-group">
				<input type="radio" name="consulta" id="consulta1" hidden="true" value="pedidos" style="margin-right: 55px;" checked>       
            </div>
            <div class="row">
                <div class="col-md-11">
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
<script src="../../Controlador/Js/pedido.js"></script>