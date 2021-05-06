<?php
@ob_start();
session_start();
include("./../conexion.php");
$hoy = getdate();

$arreglo=$_SESSION['carrito'];
$id_cliente=$_POST['miCliente'];

$total=0;
$encaId=0;
$razon= "";
$rfc = "";

$sql = mysqli_query($conn, "SELECT *
FROM documento
ORDER by IDCODIGO DESC
LIMIT 1");       

while($row = mysqli_fetch_array($sql)){
    $encaId=$row['IDCODIGO'];
}
$encaId=$encaId+1;

$sql = mysqli_query($conn, "SELECT *
FROM clientes WHERE IDCLIENTE = ". $id_cliente);       
while($row = mysqli_fetch_array($sql)){
    $razon=$row['RAZON_SOCIAL'];
    $rfc=$row['RFC'];
}

for($i=0; $i<count($arreglo); $i++){
   $total=$total+$arreglo[$i]['Precio'];
}
$iva = $total * 0.16;
$miTotal= $total + $iva;


mysqli_query($conn,"insert into documento (IDCLIENTE, RAZON_SOCIAL, RFC, SUBTOTAL, IVA, TOTAL) VALUES (
    '".$id_cliente."',
    '".$razon."',
    '".$rfc."',
    '".$total."',
    '".$iva."',
    ".$miTotal."
)");
$unidad = "";
$precio = "";

for($i=0; $i<count($arreglo); $i++){
    $sql = mysqli_query($conn, "SELECT * FROM productos WHERE id_producto = ". $arreglo[$i]['id']);       
        while($row = mysqli_fetch_array($sql)){
            $unidad=$row['UNIDADMEDIDA'];
            $precio=$row['PRECIO1'];
        }
        $sentencia = "insert into documentorenglon (IDDOCUMENTO, IDMATERIAL, UNIDAD_MEDIDA, CANTIDAD, PRECIO1) VALUES (
            ".$encaId.",
            ".$arreglo[$i]['id'].",
            '".$unidad."',
            '".$precio."',
            ".$precio."
        )";
    mysqli_query($conn, $sentencia);
 }

unset($_SESSION['carrito']);
header("Location:../views/compras.php?status=true");
echo'
<div class="alert alert-success">
  <a href="#" class="alert-link">Compra exitosa</a>
</div>';
?>