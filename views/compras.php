
<?php
include("./../conexion.php");
include("./../util/util.php");
head();

    
    // $productos = getProductos();
    // $registros = mysqli_fetch_fields($productos); 
    // print_r($registros);
    // $object= (object)$registros;
?>

<div class="container">
<?php
  if(isset($_GET["status"])){
    if($_GET["status"]==true){
      echo'<div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
      <strong>Registro exitoso!</strong> Se ha realizado la compra
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
  }
?>

<div class="card">
        <div class="card-header">
            <div class="row display-tr">
                <div>
                <h3>Listado de productos</h3>
                </div>        
            </div>
        </div>
        <div class="card-body">
       

        </div>
        <div class="row">
        <?php
            $sql = mysqli_query($conn, "SELECT * FROM productos");   
            if(mysqli_num_rows($sql) == 0){
                echo '<tr><td colspan="8">No hay datos.</td></tr>';
            }else{
                $no = 1;
                while($row = mysqli_fetch_assoc($sql)){
                    echo '
                    <div class="col-3">
                        <div class="card">
                            <img src="./../assets/img/producto.png" width="50px" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">Nombre: '.$row['DESCRIPCION'].'</h5>
                            <p class="card-text">Precio: $'.$row['PRECIO1'].'.00</p>
                            <div class="well clearfix">
                            <a href="./carrito.php?id='.$row['id_producto'].'" class="btn btn-success btn-block" data-added="0"><i class="glyphicon glyphicon-plus"></i>Agregar</a>
                            </div>
                            </div>
                        </div>
                  </div>';
                    $no++;
                }
            }
?>  
        </div>
       
        </div>
    </div>
 </div>


<?php
  footer();
?>