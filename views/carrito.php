<?php
@ob_start();
session_start();
include("./../conexion.php");


if(isset($_SESSION['carrito'])) {
   $arreglo=$_SESSION['carrito'];
   $encontro=false;
   $numero=false;
       if(isset($_GET["id"])){
        $nombre="";
        $precio=0;
        $img="";
        $variable= $_GET["id"];
        $sql2 = mysqli_query($conn, "SELECT * FROM productos where id_producto =".$_GET['id']);       

        if(mysqli_num_rows($sql2) == 0){
          echo '<tr><td colspan="8">No hay datos.</td></tr>';
      }else{
          $no = 1;
          while($row = mysqli_fetch_assoc($sql2)){
             $nombre=$row['DESCRIPCION'];
             $precio=$row['PRECIO1'];             
          }
          $datosNuevos=array('id'=>$variable,
          'Nombre'=>$nombre,
          'Precio'=>$precio,
          'Cantidad'=>1);
        }
        array_push($arreglo, $datosNuevos);
        $_SESSION['carrito']=$arreglo;
      }
}else {
    if(isset($_GET["id"])){
        $nombre="";
        $precio=0;
        $img="";

        $variable= ($_GET["id"]);
        $sql = mysqli_query($conn, "SELECT * FROM productos where id_producto = $variable");       


        if(mysqli_num_rows($sql) == 0){
            echo '<tr><td colspan="8">No hay datos.</td></tr>';
        }else{
            $no = 1;
            while($row = mysqli_fetch_array($sql)){
               $nombre=$row['DESCRIPCION'];
               $precio=$row['PRECIO1'];
            }
            $arreglo[]=array('id'=>$variable,
            'Nombre'=>$nombre,
            'Precio'=>$precio,
            'Cantidad'=>1);

            $_SESSION['carrito']=$arreglo;
        }
        mysqli_close($conn);
    }
    
}
include("./../util/util.php");
include("./../conexion.php");
head();
?>


<div class="container">


<form enctype="multipart/form-data">
        <div class="row">
        <div class="col">
            <div class="form-group">
                    <label for="exampleFormControlSelect1">Listado de clientes</label>
                    <select class="form-control" id="cliente" name="cliente">
                      <option value="0">Seleccione un cliente</option>
                      <?php  
                            $sql = mysqli_query($conn, "SELECT * FROM clientes");   
                            if(mysqli_num_rows($sql) == 0){
                                echo '<tr><td colspan="8">No hay datos.</td></tr>';
                            }else{
                                $no = 1;
                                while($row = mysqli_fetch_assoc($sql)){
                                    echo '
                                    <option value="'.$row['IDCLIENTE'].'">'.$row['RAZON_SOCIAL'].'</option>
                                    ';
                                    $no++;
                                }
                            }
        
        ?>
                    </select>

            </div>
        </div>
                   

                   
        </div>
      <table class="table table-bordered" id="tbl_posts">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Descripcion</th>
            <th>Precio</th>         
            <th>Cantidad</th>
          </tr>
        </thead>
        <tbody id="tbl_posts_body">  
        <?php

        if(isset($_SESSION['carrito'])) {
            $datos=$_SESSION['carrito'];
            $total=0;
            for($i=0; $i<count($datos); $i++){?>
                <tr>
                <td><span class="sn"></span><?php echo $i ?></td>
                <td ><?php echo $datos[$i]['Nombre'] ?></td>
                <td ><?php echo $datos[$i]['Precio'] ?></td>
                <td ><?php echo $datos[$i]['Cantidad'] ?></td>
               
                </tr>
                <?php
                $total=$total+ $datos[$i]['Precio'];
                }?>
                <td>$</td>
                <td colspan="2">Total de la compra: <span class="text-danger"> <?php echo $total ?></span></td>
                <?php
               // session_destroy();
        }else {
            echo '<tr><td colspan="8">No hay datos.</td></tr>';
        }

?>
        </tbody>
      </table>
    </div> 
  </form>
  <div class="container">
  <form method="post" action="./../controller/comprar_ctl.php">
                    <input type="hidden" id="miCliente" name="miCliente" value="10">
                    <button type="submit" class="btn btn-success btn-block mt-4"><i class="fas fa-plus-circle"></i>Comprar</button>
                  </form>
  </div>



 </div>

<?php
  footer();
?>