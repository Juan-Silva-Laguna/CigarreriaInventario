<?php include('head.php');?>
        <div class="container menu" > 
		    <div class="container-fluid">
				<div class="page-header">
					<h2 class="text-titles"><i class="zmdi zmdi-chart"></i> Reportes</h2>
				</div>
			</div>
            <div class="row">
                    <div class="col-md-2 text-center">
                        <button class="btn" id="exportar" style="background-color: #ffc107;">Exportar</button>
                    </div>                    
                    <div class="col-md-10" id="reporte" style="box-shadow: 0 0 3px 0 #000, 0 0 3px 0 #000; width: 612px; height:792px; overflow: scroll; padding-left: 20px;padding-right: 20px;">
                        <b id="fecha"></b>
                        <br><br>
                        <p>La Cigarreria Perez a realizado una inversion de $<b id="totPedido"></b>:</p>
                        <br>
                        <table class="table table-striped" id="tablePedido">
                            <thead>
                                <tr>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantiad</th>
                                <th scope="col">Fecha Pedido</th>
                                <th scope="col">Inversion</th>
                                </tr>
                            </thead>
                            <tbody id="tablePedidoBody"></tbody>
                        </table>
                        <br>
                        <p>Actualmente se ha realizado un total de $<b id="totVentas"></b> en la venta de los siguientes productos</p>
                        <br>
                        <table class="table table-striped" id="tableVenta">
                            <thead>
                                <tr>
                                <th scope="col">Responsable</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Total venta</th>                                
                                </tr>
                            </thead>
                            <tbody id="tableVentaBody"></tbody>
                        </table>  
                        
                        <br>
                        <p>Aun falta por vender el valor de $<b id="totProducto"></b> los cuales son los siguientes productos:</p>
                        <br>
                        <table class="table table-striped" id="tableProducto">
                            <thead>
                                <tr>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantiad</th>
                                <th scope="col">Precio unitario</th>
                                <th scope="col">Producto</th>
                                </tr>
                            </thead>
                            <tbody id="tableProductoBody"> </tbody>
                        </table>  
                    </div>
            </div>
        </div>
    <br><br><br><br>
<?php include('footer.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="../../Controlador/Js/reporte.js"></script>