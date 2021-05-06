<?php
include("util/util_public.php");

head();

?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row display-tr">
                <h3>Ingreso al sistema</h3>
            </div>
        </div>
        
        <div class="card-body justify-content-center">
            <div class="row text-center">
                <div class="card bg-white rounded border mt-3 text-center">
                    <?php if (!empty($msg)) { ?>
                        <p class="text-warning text-center"><?php echo $msg ?></p>
                    <?php } ?>
                    <div class="card-body">
                        <form id="login" method="post" action="login.php">
                            <div class="form-group">
                                <label class="required" for="userid">Usuario</label>
                                <input class="form-control" type="text" name="usuario" id="usuario" autofocus>
                            </div>
                            <div class="form-group">
                                <!-- <div class="forgot"><a href="#">Olvidé mi contraseña</a></div> -->
                                <label class="required" for="password">Contraseña</label>
                                <input class="form-control" type="password" name="password" id="password" maxlength="14">
                                <input name="pass" id="pass" type="hidden" value="">
                            </div>
                            <div class="form-group text-center">
                                <div class="g-recaptcha" data-sitekey="6LdrfKMUAAAAAERFZK7tgnajC8MHU3vGhClSBj_B" data-callback="recaptcha_callback" data-expired-callback="recaptcha_expired" id="captcha"></div>
                            </div>
                            <div class="text-center mt-3">
                                <!-- <button type="submit" class="btn btn-primary" id="ok" disabled>Iniciar sesión</button> -->
                                <a href="views/productos.php" class="btn btn-primary">Ingresar</a>
                            </div>
                            <!-- <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary" id="ok">Iniciar sesión</button>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
footer();
?>