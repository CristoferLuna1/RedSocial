<?php

include_once URL_APP . '/views/custom/header.php';



?>

<div class="profile-container">
        <h2>Completar Perfil</h2>
        <form id="profile-form" action="<?php echo URL_PROJECT?>/home/insertarRegistrosPerfil" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <input type="hidden" name="id_user" value="<?php echo $_SESSION['logueado']?>">
            <div class="profile-picture" onclick="document.getElementById('profile-pic').click();">
                <img id="profile-img" src="default-profile.png" alt="Profile Picture">
                <input name="imagen" type="file" id="profile-pic" accept=".jpg,.png,.gif,.bmp,.pif" required>
                <span class="profile-icon"><i class="fas fa-user"></i></span>
            </div>
            <div class="input-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="input-group">
                <label for="genero">Género:</label>
                <input type="text" id="genero" name="genero" required>
            </div>
            <div class="input-group">
                <label for="fecha-nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha-nacimiento" name="fechanacimiento" required>
            </div>
            <?php if(isset($_SESSION['usuarioError'])):?>

                <div id="alert" class="alert alert-danger alert dismissible fade show mt-2 mb-2" role= "alert">
                    <?php echo $_SESSION['usuarioError'] ?>
                </div>

            <?php unset($_SESSION['usuarioError']); endif ?>
            <button type="submit" class="btn-register">Registrar Datos</button>
            <a href="<?php echo URL_PROJECT?>/home/logout">Cerrar Sesion</a>
        </form>
    </div>





<?php

include_once URL_APP . '/views/custom/footer.php';
?>