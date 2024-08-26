 <?php
include_once URL_APP . '/views/custom/header.php';


?>

<div class="container-center center">
    <div class="register-container">
        <div class="register-form">
            <h2>Registrarse</h2>
            <form action ="<?php echo URL_PROJECT?>/home/register" method = "POST" >
                <div class="input-group">
                    <label for="username">Usuario</label>
                    <input type="text" id="username" name="usuario" required>
                </div>
                <div class="input-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="correo" required>
                </div>
                <div class="input-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="contrasena" required>
                </div>
                <div class="input-group">
                    <label for="confirm-password">Confirmar Contraseña</label>
                    <input type="password" id="confirm-password" name="confirm-password" required>
                </div>
                <button type="submit" class="btn-registro">Registrarse</button>
                <!-- <button type="button" class="btn-google">
                    <img src="google-icon.png" alt="Google Icon"> Registrarse con Google
                </button> -->
                <p class="login">¿Ya tienes una cuenta? <a href="http://localhost/redsocial/home/login">Inicia sesión</a></p>
            </form>
            <?php if(isset($_SESSION['usuarioError'])):?>

                <div id="alert" class="alert alert-danger alert dismissible fade show mt-2 mb-2" role= "alert">
                    <?php echo $_SESSION['usuarioError'] ?>
                </div>

            <?php unset($_SESSION['usuarioError']); endif ?>
                
            </div>
    </div>
</div>



<?php
    include_once URL_APP . '/views/custom/footer.php';

?>