<?php 
// Menú Administradores
if (isset($_SESSION['tipo_usuario']) && ($_SESSION['tipo_usuario']) == 0) {
    echo '
    <nav id="navBar">
        <div id="navBar-left">
            <img src="'. $imgLogo .'" alt="Logo WallaMerch" id="navbar-logo" />
        </div>
        <div id="navBar-right">
            <ul id="navBarList">
                <li class="menu">
                    <a id="home" href="'. $urlHome .'">Inicio</a>
                </li>
                <li class="menu"><a id="AdminPanel" href="'. $urlAdminPanel .'">Admin Panel</a></li>
                <li class="menu"><a id="myProfile" href="'. $urlProfile .'">Mi Perfil</a></li>
                <li class="menu">
                    <a id="log-out" href="'. $urlSignout .'">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>
    ';

// Menú Usuarios
} elseif (isset($_SESSION['tipo_usuario']) && ($_SESSION['tipo_usuario'])  == 1){
    echo '
    <nav id="navBar">
        <div id="navBar-left">
            <img src='. $imgLogo .' alt="Logo WallaMerch" id="navbar-logo" />
        </div>
        <div id="navBar-right">
            <ul id="navBarList">
                <li class="menu">
                    <a id="home" href="'. $urlHome .'">Inicio</a>
                </li>
                <li class="menu"><a id="myProfile" href="'. $urlProfile .'">Mi Perfil</a></li>
                <li class="menu">
                    <a id="log-out" href="'. $urlSignout .'">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>
    ';

// Menú sin sesión iniciada
} else {
    echo '
    <nav id="navBar">
        <div id="navBar-left">
            <img src='. $imgLogo .' alt="Logo WallaMerch" id="navbar-logo">
        </div>
        <div id="navBar-right">
            <ul id="navBarList">
                <li class="menu"> 
                    <a id="home" href="'. $urlHome .'">Inicio</a>
                </li>
                <li class="menu"><a id="log-in" href="'. $urlLogin .'">Iniciar Sesión</a></li>
                <li class="menu"><a id="sign-up"href="'. $urlSignUp .'">Crear Cuenta</a></li>
            </ul>
        </div>
        
    </nav>
    ';
}