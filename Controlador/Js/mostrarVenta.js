$(document).ready(function(){
    todo();

    function todo() {
        operacion = 'mostrarVentas';
        $('#table').dataTable().fnDestroy();
        $.post('../../controlador/venta.controlador.php', {operacion}, function (respuesta) {
            var table = null;     
            $.each(JSON.parse(respuesta), function(index, val) {
                table += '<tr>';
                table += '<td>'+val.nombreUsuario+'</td>';
                table += '<td>'+val.nombreProducto+'</td>';
                table += '<td>'+val.cantidadVenta+'</td>';
                table += '<td>'+(val.cantidadVenta*val.precioProducto)+'</td>';
                table += '<td>'+val.fechaVenta+'</td>';
                table += '</tr>';
            });
            $('#tableBody').html(table);
            $('#table').dataTable();
        })

    }


     $('#empleado').on('keyup', function () {
        mostrarFiltro();
    })

    $('#fecha').on('change', function () {
        mostrarFiltro();
    })


    function mostrarFiltro() {
        datos = {
            empleado: $('#empleado').val(),
            fecha: $('#fecha').val(),
            operacion: 'filtro'
        };
        $('#table').dataTable().fnDestroy();
        $.post('../../controlador/venta.controlador.php', datos, function (respuesta) {
            var table = null;                 
            $.each(JSON.parse(respuesta), function(index, val) {
                table += '<tr>';
                table += '<td>'+val.nombreUsuario+'</td>';
                table += '<td>'+val.nombreProducto+'</td>';
                table += '<td>'+val.cantidadVenta+'</td>';
                table += '<td>'+(val.cantidadVenta*val.precioProducto)+'</td>';
                table += '<td>'+val.fechaVenta+'</td>';
                table += '</tr>';
            });
            $('#tableBody').html(table);
            $('#table').dataTable();
        })
    }
});