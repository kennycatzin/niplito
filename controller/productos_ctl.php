<?php
$tipo = $_POST["tipo"];
include("./../conexion.php");

if($tipo == 1){
    $descripcion = $_POST["descripcion"];
    $clave = $_POST["clave"];
    $unidad=$_POST["unidad"];
    $precio=$_POST["precio"];

    mysqli_query($conn,"insert into productos (IDMATERIAL, DESCRIPCION, UNIDADMEDIDA, PRECIO1) VALUES (
        '".$clave."',
        '".$descripcion."',
        '".$unidad."',
        ".$precio."
    )");
   header("location: ../views/productos.php");

}
if($tipo == 2){
    $descripcion = $_POST["descripcionE"];
    $clave = $_POST["claveE"];
    $unidad=$_POST["unidadE"];
    $precio=$_POST["precioE"];
    $id_producto=$_POST["id_producto"];

    $sentencia="update productos set IDMATERIAL =  '".$clave."',
    DESCRIPCION = '".$descripcion."',
    UNIDADMEDIDA = '".$unidad."',
    PRECIO1 = ".$precio."
    where id_producto = ".$id_producto;
   
    echo $sentencia;
    mysqli_query($conn, $sentencia);
    
    header("location: ../views/productos.php");

}
if($tipo == 3){
    if(isset($_POST["getProductoID"])){
        $sql = mysqli_query($conn, "SELECT * FROM productos where id_producto = ". $_POST["productoID"]); 
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
    $sentencia="delete from  productos where id_producto = ".$id_producto;
   
    mysqli_query($conn, $sentencia);
    
    header("location: ../views/productos.php");
}






?>