$( document ).ready( function() {
    $(document).on('click', '.ediProducto', async function(){
        var element= $(this)[0];
        productoID= $(element).attr("edicion");
        $('#id_producto').val(productoID);
        console.log(productoID);

       await $.post("../controller/productos_ctl.php",{"getProductoID":"",productoID, "tipo": 3},function(data){

            data = JSON.parse(data);
            console.log(data);
            console.log(data.DESCRIPCION);

            $('#descripcionE').val(data.DESCRIPCION);
            $('#precioE').val(data.PRECIO1);
            $('#claveE').val(data.IDMATERIAL);
            $('#unidadE').val(data.UNIDADMEDIDA);


            // texto_indicador = data.data[0].texto_indicador;
            // color = data.data[0].color;
          
    
        });
    });
});