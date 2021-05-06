
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
              <h3>Catálogo de clientes</h3>
            </div>
                <form class="d-flex col-md-8 col-md-offset-2">
                  <a href="login.php" class="btn btn-primary" type="submit" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle"></i>   Agregar cliente</a>
                </form>
            </div>
            <div>
        </div>
        </div>
        <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">IDCLIENTE</th>
              <th scope="col">RAZON_SOCIAL</th>
              <th scope="col">RFC</th>
              <th scope="col">OPCIONES</th>
            </tr>
          </thead>
          <tbody>
          <?php  
                            $sql = mysqli_query($conn, "SELECT * FROM clientes");   
                            if(mysqli_num_rows($sql) == 0){
                                echo '<tr><td colspan="8">No hay datos.</td></tr>';
                            }else{
                                $no = 1;
                                while($row = mysqli_fetch_assoc($sql)){
                                    echo '
                                    <tr>
                                      <th scope="row">'.$no.'</th>
                                      <td>'.$row['IDCLIENTE'].'</td>
                                      <td>'.$row['RAZON_SOCIAL'].'</td>
                                      <td>'.$row['RFC'].'</td>
                                      <td class="row justify-content-around">
                                        <button class="btn btn-primary ediCliente" edicion="'.$row['IDCLIENTE'].'" data-toggle="modal" data-target="#editarProducto"><i class="fas fa-edit"></i></button>
                                        <form id="dele" method="post" action="../controller/clientes_ctl.php">
                                          <input type="hidden" name="tipo" value="4">
                                          <input type="hidden" name="eliminar" value="'.$row['IDCLIENTE'].'">
                                          <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                      </td>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="registro" method="post" action="../controller/clientes_ctl.php">
        <div class="modal-body">
        <input type="hidden" name="tipo" value="1">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Razón social</label>
                    <input type="text" class="form-control" id="razon" placeholder="Ingrese la razón" name="razon">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">RFC</label>
                    <input type="text" class="form-control" id="rfc" placeholder="Ingrese el RFC" name="rfc">
                  </div>
                  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="editarProducto" tabindex="-1" aria-labelledby="editar" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  id="registro" method="post" action="../controller/clientes_ctl.php">
        <div class="modal-body">
                  <input type="hidden" name="tipo" value="2">
                  <input type="hidden" id="id_cliente" name="id_cliente" value="">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Razón social</label>
                    <input type="text" class="form-control" id="razonE" placeholder="Ingrese la razon" name="razonE">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">RFC</label>
                    <input type="text" class="form-control" id="rfcE" placeholder="Ingrese el RFC" name="rfcE">
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
  footer();
?>