
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
              <h3>Catálogo de productos</h3>
            </div>
                <form class="d-flex col-md-8 col-md-offset-2">
                  <a href="login.php" class="btn btn-primary" type="submit" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle"></i>   Agregar producto</a>
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
              <th scope="col">IDMATERIAL</th>
              <th scope="col">DESCRIPCION</th>
              <th scope="col">UNIDAD</th>
              <th scope="col">PRECIO</th>
              <th scope="col">OPCIONES</th>
            </tr>
          </thead>
          <tbody>
          <?php  
                            $sql = mysqli_query($conn, "SELECT * FROM productos");   
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
                                      <td>'.$row['UNIDADMEDIDA'].'</td>
                                      <td>'.$row['PRECIO1'].'</td>
                                      <td class="row justify-content-around">
                                        <button class="btn btn-primary ediProducto" edicion="'.$row['id_producto'].'" data-toggle="modal" data-target="#editarProducto"><i class="fas fa-edit"></i></button>
                                        <form id="dele" method="post" action="../controller/productos_ctl.php">
                                          <input type="hidden" name="tipo" value="4">
                                          <input type="hidden" name="eliminar" value="'.$row['id_producto'].'">
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
        <h5 class="modal-title" id="exampleModalLabel">Nuevo producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="registro" method="post" action="../controller/productos_ctl.php">
        <div class="modal-body">
        <input type="hidden" name="tipo" value="1">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Clave del material</label>
                    <input type="number" class="form-control" id="clave" placeholder="00001" name="clave">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" placeholder="Ingrese la descripción" name="descripcion">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Precio</label>
                    <input type="number" class="form-control" id="precio" placeholder="0.00" name="precio" step="any">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Unidad de medida</label>
                    <select class="form-control" id="unidad" name="unidad">
                      <option value="0">Seleccione una unidad</option>
                      <option value="pieza">Pieza</option>
                      <option value="caja">Caja</option>
                      <option value="kilo">Kilo</option>
                    </select>
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
        <h5 class="modal-title" id="exampleModalLabel">Editar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  id="registro" method="post" action="../controller/productos_ctl.php">
        <div class="modal-body">
                  <input type="hidden" name="tipo" value="2">
                  <input type="hidden" id="id_producto" name="id_producto" value="">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Clave del material</label>
                    <input type="number" class="form-control" id="claveE" placeholder="00001" name="claveE">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Descripción</label>
                    <input type="text" class="form-control" id="descripcionE" placeholder="Ingrese la descripción" name="descripcionE">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Precio</label>
                    <input type="number" class="form-control" id="precioE" placeholder="0.00" name="precioE" step="any">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Unidad de medida</label>
                    <select class="form-control" id="unidadE" name="unidadE">
                      <option value="0">Seleccione una unidad</option>
                      <option value="pieza">Pieza</option>
                      <option value="caja">Caja</option>
                      <option value="kilo">Kilo</option>
                    </select>
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