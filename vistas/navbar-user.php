    <nav id="navbar">
      <img src="../../../imgs/avatar.png" alt="Avatar" id="avatar">
      <h2>
        <?php 
        if (isset ($_GET['id_usuario'])){
          echo $currentUser['username'];
        }else {
          echo $_SESSION['user'];
        }?>
      </h2>
      <ul>
        <li><a class="nav-link" href="<?php echo $miperfil;?>">Mi perfil</a></li>
        <li><a class="nav-link" href="<?php echo $misdirecciones;?>">Mis direcciones</a></li>
        <li>
          <a class="nav-link" href="<?php echo $misproductos;?>"
            >Mis productos</a
          >
        </li>
        <li>
          <a class="nav-link" href="<?php echo $misventas;?>"
            >Mis ventas</a
          >
        </li>
        <li>
          <a class="nav-link" href="<?php echo $miscompras;?>"
            >Mis compras</a
          >
        </li>
      </ul>
    </nav>