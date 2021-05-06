$( document ).ready( function() {
    $(document).on('click', '.ediCliente', async function(){
        var element= $(this)[0];
        clienteID= $(element).attr("edicion");
        $('#id_cliente').val(clienteID);
        console.log(clienteID);

       await $.post("../controller/clientes_ctl.php",{"getClienteID":"",clienteID, "tipo": 3},function(data){

            data = JSON.parse(data);
            $('#razonE').val(data.RAZON_SOCIAL);
            $('#rfcE').val(data.RFC);



            // texto_indicador = data.data[0].texto_indicador;
            // color = data.data[0].color;
          
    
        });
    });
});