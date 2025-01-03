$(document).ready(function(){
    let operacion = 'reporte';   

    var f = new Date();
    var fecha = "Reporte del "+f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();
    $('#fecha').html(fecha);
    tablas();
        function tablas() {            
            $.post('../../controlador/venta.controlador.php', {operacion:'mostrarVentas'}, function (respuesta) {
                var table = null;      
                let totVenta=0;           
                $.each(JSON.parse(respuesta), function(index, val) {
                    table += '<tr>';
                    table += '<th>'+val.nombreUsuario+'</th>';
                    table += '<th>'+val.nombreProducto+'</th>';
                    table += '<td>'+val.cantidadVenta+'</td>';
                    table += '<th>'+val.fechaVenta+'</th>';
                    table += '<td> $'+(new Intl.NumberFormat().format(val.cantidadVenta*val.precioProducto))+'</td>';
                    table += '</tr>';
                    totVenta += val.cantidadVenta*val.precioProducto;
                    
                });        
                $('#tableVentaBody').html(table);
                $('#totVentas').html(new Intl.NumberFormat().format(totVenta));
            })


            $.post('../../controlador/pedido.controlador.php', {operacion:'reporte'}, function (respuesta) {
                var table = null;      
                let totPedido=0;           
                $.each(JSON.parse(respuesta), function(index, val) {
                    table += '<tr>';
                    table += '<th>'+val.nombreProducto+'</th>';
                    table += '<td>'+val.cantidadPedido+'</td>';
                    table += '<th>'+val.fechaPedido+'</th>';
                    table += '<th> $'+(new Intl.NumberFormat().format(val.totalPedido))+'</th>';
                    table += '</tr>';
                    totPedido += parseInt(val.totalPedido);
                });            
                
                $('#tablePedidoBody').html(table);
                $('#totPedido').html(new Intl.NumberFormat().format(totPedido));

            })

            $.post('../../controlador/producto.controlador.php', {operacion:'reporte'}, function (respuesta) {
                var table = null;      
                let totProducto=0;           
                $.each(JSON.parse(respuesta), function(index, val) {
                    table += '<tr>';
                    table += '<th>'+val.nombreProducto+'</th>';
                    table += '<td>'+val.cantidadProducto+'</td>';
                    table += '<th>'+val.precioProducto+'</th>';
                    table += '<td> $'+(new Intl.NumberFormat().format(val.cantidadProducto*val.precioProducto))+'</td>';
                    table += '</tr>';
                    totProducto += val.cantidadProducto*val.precioProducto;
                    
                });        
                $('#tableProductoBody').html(table);
                $('#totProducto').html(new Intl.NumberFormat().format(totProducto));
            })
        }

        $('#exportar').on('click', function () {
            alertify.confirm("Al exportar el reporte se borraran las ventas realizadas y la inversiones que a realizado en los distintos pedidos, quedando este documento como la unica constancia de las ventas e inversiones que a realizado en este tiepo. ¿Seguro de exportaar el reporte?", function (e) 
            {
                if (e) 
                {
                    let pdf = new jsPDF('p', 'pt', 'letter');
                    source = $('#reporte')[0];

                    specialElementHandlers = {
                        '#bypassme': function (element, renderer) {
                            return true
                        }
                    };
                    margins = {
                        top: 80,
                        bottom: 60,
                        left: 40,
                        width: 522
                    };

                    pdf.fromHTML(
                        source, 
                        margins.left, // x coord
                        margins.top, { // y coord
                            'width': margins.width, 
                            'elementHandlers': specialElementHandlers
                        },

                        function (dispose) {
                            pdf.save(fecha+'.pdf');
                        }, margins
                    );
                        
                    $.post('../../controlador/reporte.vaciar.php') 
                    tablas();
                    alertify.success("Se exporto el reporte con exito!!");
                }
            })
        })
});