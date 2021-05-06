
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
              <h3>Reporte de ventas por producto</h3>
            </div>
                <form class="d-flex col-md-8 col-md-offset-2">
                  <a href="" class="btn btn-success" onclick="exportTableToExcel('rptPr')"><i class="fas fa-download"></i>   Descargar</a>
                </form>
            </div>
            <div>
        </div>
        </div>
        <div class="card-body">
        <table id="rptPr" class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">IDMATERIAL</th>
              <th scope="col">DESCRIPCION</th>
              <th scope="col">TOTAL PIEZAS</th>
              <th scope="col">SUBTOTAL</th>
            </tr>
          </thead>
          <tbody>
          <?php  
                    $sentencia = "select dr.IDMATERIAL, p.DESCRIPCION, count(dr.IDMATERIAL) as tipo, sum(dr.PRECIO1) as total
                    from documentorenglon dr  inner join productos p on p.id_producto = dr.IDMATERIAL
                    group by dr.IDMATERIAL";

                            $sql = mysqli_query($conn, $sentencia);   
                            if(mysqli_num_rows($sql) == 0){
                                echo '<tr><td colspan="8">No hay datos.</td></tr>';
                            }else{
                                $no = 1;
                                while($row = mysqli_fetch_assoc($sql)){
                                    echo '
                                    <tr>
                                      <th scope="row">'.$no.'</th>
                                      <td>'.$row['IDMATERIAL'].'</td>
                                      <td>'.$row['DESCRIPCION'].'</td>
                                      <td>'.$row['tipo'].'</td>
                                      <td>'.$row['total'].'</td>
                                    </tr>
                                    ';
                                    $no++;
                                }
                            }
        
        ?>
          </tbody>
        </table>
        </div>
    </div>
 </div>

<?php
  footer();
?>