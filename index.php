<?php
include("util/util_public.php");

head();

?>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="./assets/img/banner2.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./assets/img/banner1.jpg" alt="Second slide">
    </div>
   
  </div>
</div>
<div class="container">
<?php
  if(isset($_GET["status"])){
    if($_GET["status"]==true){
      echo'<div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
      <strong>Mensaje enviado!</strong> Se ha enviado un correo a la dirección
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
  }
?>
</div>
<div class="col-12 row mt-4">
<div class="col-6">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.6336862352223!2d-89.62506718506842!3d20.96722088603173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f56715334a60779%3A0x770c2989366a0b5f!2sCatedral%20de%20San%20Ildefonso!5e0!3m2!1ses!2smx!4v1577842734691!5m2!1ses!2smx" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</div> 
<div class="col-6 ">
<form id="contact-form" method="post" action="contact.php" role="form">

    <div class="messages"></div>

    <div class="controls">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Nombre *</label>
                    <input id="form_name" type="text" name="nombre" class="form-control" required="required" data-error="El nombre es requerido">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_email">Email *</label>
                    <input id="form_email" type="email" name="email" class="form-control" required="required" data-error="El email es requerido">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
           
        </div>
       
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form_message">Mensaje *</label>
                    <textarea id="form_message" name="mensaje" class="form-control" rows="4" required="required" data-error="El mensaje es necesario"></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-success btn-send" value="Enviar mensaje">
            </div>
        </div>
        
    </div>

</form>
</div> 


</div>

  

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>