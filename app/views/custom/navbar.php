<nav class="navbar">
        <div class="navbar-container">
            <a href="#" class="navbar-item"><i class="fas fa-home"></i> Inicio</a>
            <a href="#" class="navbar-item"><i class="fas fa-envelope"></i> Mensajes</a>
            <a href="#" class="navbar-item"><i class="fas fa-user-friends"></i> Amigos</a>
            <a href="#" class="navbar-item"><i class="fas fa-bell"></i> Notificaciones</a>
            <div class="navbar-item search-container">
                <input type="text" class="search-input" placeholder="Buscar...">
                <button class="search-button">Buscar</button>
            </div>
            <div class="navbar-item dropdown">
                <img src="<?php echo 'URL_PROJECT' . '/' . $datos['perfil']->fotoPerfil?>" alt="Foto de Usuario" class="user-img">
                <span class="user-name">Nombre Usuario</span>
                <div class="dropdown-content">
                    <a href="#">Ver Perfil</a>
                    <a href="<?php echo URL_PROJECT?>/home/logout   ">Cerrar Sesión</a>
                </div>
            </div>
        </div>
</nav>
