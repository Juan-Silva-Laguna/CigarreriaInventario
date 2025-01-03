$(document).ready(function(){
    read();
    let cant=0;
    
     let operacion="Consultar";
     $.post('../../controlador/producto.controlador.php', {operacion}, function (respuesta) {
        let datos = JSON.parse(respuesta);
        
        datos.forEach(dato => {
            if (dato.cantidadProducto != 0) {
                option = document.createElement("option");
                option.value = dato.nombreProducto;  
                option.setAttribute('data-index-number',dato.idProducto);
                document.getElementById('productos').append(option); 
            }
        });
    })

    function read(){   
        let operacion = 'Consultar'; 
        $('#tableProducto').dataTable().fnDestroy();
        $.post('../../controlador/producto.controlador.php', {operacion}, function (respuesta) {
            var table = null;     
            $.each(JSON.parse(respuesta), function(index, val) {
                let concat = '';
                let producto = val.nombreProducto;
                for (let i = 0; i < producto.length; i++) {concat += producto[i].replace(' ', '%');}
                table += '<tr class="editaProducto" id="'+concat+'-'+val.cantidadProducto+'-'+val.idProducto+'">';
                table += '<td>'+val.nombreProducto+'</td>';
                table += '<td>'+val.cantidadProducto+'</td>';
                table += '<td>'+val.precioProducto+'</td>';
                table += '<td>'+val.nombreCategoria+'</td>';
                table += '</tr>';
            });
            $('#tableProductoBody').html(table);
            $('#tableProducto').dataTable();
        })
        
    }

    function seleccion(selec) {
        let operacion='';
        switch (selec) {
            case 'hoy':             
                operacion = 'consultaHoy';
                break;
            case 'semana':           
            operacion = 'consultaSemana';
                break;
            case 'mes':
                operacion = 'consultaMes';
            break;
            case 'todo':
                operacion = 'todo';
            break;
        } 
        $.post('../../controlador/venta.controlador.php', {operacion}, function (respuesta) {
            var table = null;                 
            $.each(JSON.parse(respuesta), function(index, val) {
                table += '<tr>';
                table += '<td>'+val.nombreProducto+'</td>';
                table += '<td>'+val.fechaVenta+'</td>';
                table += '<td>'+val.cantidadVenta+'</td>';
                table += '<td>'+(val.cantidadVenta*val.precioProducto)+'</td>';
                table += '</tr>';
            });
            $('#tableBody').html(table);
            $('#table').dataTable();
        })

    }

    seleccion($('input:radio[name=consulta]:checked').val());
    
    $("input[name=consulta]").click(function () {    
        seleccion($('input:radio[name=consulta]:checked').val());                
    });


    $(document).on('click','.editaProducto', function () {
        window.scroll(0, 0);
        let elemento = $(this)[0];
        let ide = $(elemento).attr('id');
        let arreglo = ide.split('-');
        cant = arreglo[1];
        if (arreglo[1] != '0') {
            let concat='';
            for (let i = 0; i < arreglo[0].length; i++) {concat += arreglo[0][i].replace('%', ' ');}
            $('#producto').val(concat);
            $('#producto').attr('data-index-number',arreglo[2]);
        }
        else{
            $('#cantidad').val('');
            $('#producto').val('');
            alertify.error('Producto Agotado');
        }
    });

    $('#frmVender').submit(function (e) {
        e.preventDefault();
            let datos = {
                producto: $('#productos [value="' + $('#producto').val() + '"]').data('indexNumber'),
                cantidad: $('#cantidad').val(),
                operacion: 'Vendio'
            };

            $.post('../../controlador/venta.controlador.php', datos, function (respuesta) {
                if (respuesta == '1') {
                    alertify.success(`Se ${datos.operacion} el producto con exito!!`);
                    
                }else{
                    alertify.error(`Error: no se ${datos.operacion} el producto, revise la cantidad`);
                }
                read();
            })
        $('#cantidad').val('');
            $('#producto').val('');
     });
     
});