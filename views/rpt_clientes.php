
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
              <h3>Reporte de ventas por cliente</h3>
            </div>
                <form class="d-flex col-md-8 col-md-offset-2">
                  <a href="" class="btn btn-success" onclick="exportTableToExcel('rptCl')" ><i class="fas fa-download"></i>   Descargar</a>
                </form>
            </div>
            <div>
        </div>
        </div>
        <div class="card-body">
        <table id="rptCl" class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">IDCLIENTE</th>
              <th scope="col">RFC</th>
              <th scope="col"> RAZON SOCIAL</th>
              <th scope="col">SUBTOTAL</th>
              <th scope="col">IVA</th>
              <th scope="col">TOTAL</th>
            </tr>
          </thead>
          <tbody>
          <?php  
                    $sentencia = "select  d.IDCLIENTE, d.RAZON_SOCIAL, d.RFC, sum(d.SUBTOTAL) as subtotal , sum(d.IVA)  as iva, sum(d.TOTAL) as total
                    from documento d  inner join clientes c on c.IDCLIENTE = d.IDCLIENTE
                    group by d.IDCLIENTE;";

                            $sql = mysqli_query($conn, $sentencia);   
                            if(mysqli_num_rows($sql) == 0){
                                echo '<tr><td colspan="8">No hay datos.</td></tr>';
                            }else{
                                $no = 1;
                                while($row = mysqli_fetch_assoc($sql)){
                                    echo '
                                    <tr>
                                      <th scope="row">'.$no.'</th>
                                      <td>'.$row['IDCLIENTE'].'</td>
                                      <td>'.$row['RFC'].'</td>
                                      <td>'.$row['RAZON_SOCIAL'].'</td>
                                      <td>'.$row['iva'].'</td>
                                      <td>'.$row['subtotal'].'</td>
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