
<?php
include("./../conexion.php");
include("./../util/util.php");
head();

?>


<div class="container">

<h1>Ventas</h1>

<form enctype="multipart/form-data">
      <table class="table table-bordered" id="tbl_posts">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>IDCLIENTE</th>
            <th>RAZON SOCIAL</th>         
            <th>SUBTOTAL</th>
            <th>IVA</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody id="tbl_posts_body">  
        <?php
$sql = mysqli_query($conn, "SELECT * FROM documento");
            
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
        <td>'.$row['SUBTOTAL'].'</td>
        <td>'.$row['IVA'].'</td>
        <td>'.$row['TOTAL'].'</td>
        ';
        $no++;
    }
}

        ?>
        </tbody>
      </table>
    </div> 
  </form>
</div>
  

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>