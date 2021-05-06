<?php
$tipo = $_POST["tipo"];
include("./../conexion.php");

if($tipo == 1){
    $razon = $_POST["razon"];
    $rfc = $_POST["rfc"];
   

    mysqli_query($conn,"insert into clientes (RAZON_SOCIAL, RFC) VALUES (
        '".$razon."',
        '".$rfc."'
    )");
   header("location: ../views/clientes.php");

}
if($tipo == 2){
    $razon = $_POST["razonE"];
    $rfc = $_POST["rfcE"];
    $id_cliente=$_POST["id_cliente"];

    $sentencia="update clientes set RAZON_SOCIAL =  '".$razon."',
    RFC = '".$rfc."'
    where IDCLIENTE = ".$id_cliente;
    echo $sentencia;
   
    mysqli_query($conn, $sentencia);
    
    // header("location: ../views/clientes.php");

}
if($tipo == 3){
    if(isset($_POST["getClienteID"])){
        $sql = mysqli_query($conn, "SELECT * FROM clientes where IDCLIENTE = ". $_POST["clienteID"]); 
        $data = mysqli_fetch_assoc($sql);
            if(mysqli_num_rows($sql) == 0){
                echo 'Sin datos';
            }else{
               
                echo  json_encode($data);
            }
    }
}
if($tipo == 4){
    $id_producto=$_POST["eliminar"];
    $sentencia="delete from  clientes where IDCLIENTE = ".$id_producto;
   
    mysqli_query($conn, $sentencia);
    
    header("location: ../views/productos.php");
}






?>