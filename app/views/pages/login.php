<?php

include_once URL_APP . '/views/custom/header.php';

?>


<div class="container-center center">
<div class="login-container">
        <div class="login-form">
            <h2>Iniciar Sesión</h2>
            <form action ="<?php echo URL_PROJECT?>/home/login" method = "POST">
                <div class="input-group">
                    <label for="username">Usuario</label>
                    <input type="text" id="username" name="usuario" required>
                </div>
                <div class="input-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="contrasena" required>
                </div>
                <button type="submit" class="btn-login">Iniciar Sesión</button>
                <!-- <button type="button" class="btn-google">
                    <img src="google-icon.png" alt="Google Icon"> Iniciar con Google
                </button> -->
                <p class="register">¿No tienes cuenta? <a href="http://localhost/redsocial/home/register">Regístrate</a></p>
            </form>
            <!-- alerta de la contraseña o usuario incorrecto -->
            <?php if(isset($_SESSION['errorLogin'])):?>

                <div id="alert" class="alert alert-danger alert dismissible fade show mt-2 mb-2" role= "alert">
                    <?php echo $_SESSION['errorLogin'] ?>
                </div>
            
            <?php unset($_SESSION['errorLogin']); endif ?>  

            <!-- alerta del registro es completado -->
            <?php if(isset($_SESSION['LoginComplete'])):?>

                <div id="alert" class="alert alert-success alert dismissible fade show mt-2 mb-2" role= "alert">
                 <?php echo $_SESSION['LoginComplete'] ?>
                </div>

            <?php unset($_SESSION['LoginComplete']); endif ?>    
        </div>
    </div>
</div>


<?php

include_once URL_APP . '/views/custom/footer.php';
?>